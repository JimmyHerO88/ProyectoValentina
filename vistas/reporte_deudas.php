<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if(!isset($_SESSION["nombre"])){

  header("Location: login.html");

}else{

  require 'header.php';
  require "../config/Conexion.php";

  if ($_SESSION['nomina']==1){

    $sql = "SELECT e.idempleado, e.nombre, e.sueldo_dia, coalesce(p.prestamo, 00000.00) prestamo, coalesce(a.abono, 00000.00) abono, coalesce(p.prestamo, 00000.00) - coalesce(a.abono, 00000.00) debe FROM empleado e LEFT OUTER JOIN (SELECT idempleado, SUM(coalesce(importe, 00000.00)) prestamo FROM prestamo GROUP BY 1) p on e.idempleado=p.idempleado LEFT OUTER JOIN (SELECT idempleado, SUM(coalesce(importe, 00000.00)) abono FROM abono GROUP BY 1) a on e.idempleado=a.idempleado ORDER BY e.nombre";
              $sentencia = $pdo->prepare($sql);
              $sentencia->execute();
              $deudas = $sentencia->fetchAll();  

    $sql2 = "SELECT SUM(importe) FROM prestamo";
    $sentencia2 = $pdo->prepare($sql2);
    $sentencia2->execute();
    $prestamos = $sentencia2->fetch(); 
    $totalPrestamos = $prestamos[0];     

    $sql3 = "SELECT SUM(importe) FROM abono";
    $sentencia3 = $pdo->prepare($sql3);
    $sentencia3->execute();
    $abonos = $sentencia3->fetch(); 
    $totalAbonos = $abonos[0];     

    $Debe = $totalPrestamos - $totalAbonos;


?>
<!--Contenido-->
<style type="text/css" media="print">
  @page { size: landscape; }
</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" id="content-wrapper">        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- Left navbar links -->   
                <div class="pt-1 text-center" id="botones">
                  <div>                
                    <button type="button" class="btn btn-success m-1" style="width: 130px" onclick="imprimeDeudas()">Imprimir</button>
                  </div>
                </div>
              </div><!-- /.box -->
              <section style="background-color: #fff" class="nomina">
                <div class="col-12" id="nomina">
                  <div class="p-3 text-center">
                    <div>
                      <p class="p-3"><strong>Primero Dios</strong></p>
                      <img src="../vistas/img/plantilla/logo-valentina.png" alt="">
                    </div>
                  </div> 
                  <h3><strong>Reporte General de Adeudos del Personal al día <?php echo date("Y-m-d")?></strong></h3>     
                </div> 
                <div class="col-lg-12">
                              <table class="justify-content-center table table-striped table-sm text-center" >
                                <thead>
                                  <tr>
                                    <th style="font-size: 18px;" scope="col">Nombre</th>
                                    <th style="font-size: 18px;" scope="col">Préstamos</th>
                                    <th style="font-size: 18px;" scope="col">Abonos</th>
                                    <th style="font-size: 18px;" scope="col">Debe</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($deudas as $debe): ?>
                                    <tr>
                                      <td style="font-size: 18px; text-align: left;"><?php echo $debe['nombre'];?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($debe['prestamo'],2);?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($debe['abono'],2);?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($debe['debe'],2);?></td>
                                    </tr>
                                  <?php endforeach?>
                                </tbody>
                                <tfoot>
                                    <th style="font-size: 18px; text-align: right;" scope="col">Totales</th>
                                    <th style="font-size: 18px;" scope="col">$ <?php echo number_format($totalPrestamos,2);?></th>
                                    <th style="font-size: 18px;" scope="col">$ <?php echo number_format($totalAbonos,2);?></th>
                                    <th style="font-size: 18px;" scope="col">$ <?php echo number_format($Debe,2);?></th>
                                </tfoot>
                              </table>
                          </div>
              </section>  
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>

<?php

}else{

  require 'noacceso.php';
  
}

//require 'footer.php';

?>

<script type="text/javascript" src="scripts/modal/nomina_general.js"></script>

<?php
}
ob_end_flush();

?>