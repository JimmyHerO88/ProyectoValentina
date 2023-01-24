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

    if(!empty($_POST["busqueda"])){
      $filtro = $_POST["busqueda"];
    }else{
      $filtro = date("Y-m-d"); 
    }

    $sql = "SELECT `idnomina`,`fecha`,`nombre`,`dias`,`t_extra`,`ventas`,`t_perdido`,`a_cuenta`,`abono`,`t_general`, `idabononomina`
    FROM nomina INNER JOIN empleado ON nomina.idempleado = empleado.idempleado
    WHERE fecha = '".$filtro."' 
    ORDER BY nombre ";
              $sentencia = $pdo->prepare($sql);
              $sentencia->execute();
              $nomina = $sentencia->fetchAll();  

    $logo = $_SESSION['sucursal'];

    $sql2 = "SELECT * FROM sucursal WHERE razon_social = '".$logo."'";
              $sentencia2 = $pdo->prepare($sql2);
              $sentencia2->execute();
              $logo_sucursal = $sentencia2->fetch();

    $sql3 = "SELECT SUM(t_extra) FROM nomina WHERE fecha = '".$filtro."' ";
    $sentencia3 = $pdo->prepare($sql3);
    $sentencia3->execute();
    $extra = $sentencia3->fetch(); 
    $t_extra = $extra[0];

    $sql4 = "SELECT SUM(ventas) FROM nomina WHERE fecha = '".$filtro."' ";
    $sentencia4 = $pdo->prepare($sql4);
    $sentencia4->execute();
    $ventas = $sentencia4->fetch(); 
    $t_ventas = $ventas[0];

    $sql5 = "SELECT SUM(t_perdido) FROM nomina WHERE fecha = '".$filtro."' ";
    $sentencia5 = $pdo->prepare($sql5);
    $sentencia5->execute();
    $perdido = $sentencia5->fetch(); 
    $t_perdido = $perdido[0];

    $sql7 = "SELECT SUM(abono) FROM nomina WHERE fecha = '".$filtro."' ";
    $sentencia7 = $pdo->prepare($sql7);
    $sentencia7->execute();
    $abono = $sentencia7->fetch(); 
    $t_abono = $abono[0];

    $sql8 = "SELECT SUM(a_cuenta) FROM nomina WHERE fecha = '".$filtro."' ";
    $sentencia8 = $pdo->prepare($sql8);
    $sentencia8->execute();
    $a_cuenta = $sentencia8->fetch(); 
    $t_a_cuenta = $a_cuenta[0];

    $sql9 = "SELECT SUM(t_general) FROM nomina WHERE fecha = '".$filtro."' ";
    $sentencia9 = $pdo->prepare($sql9);
    $sentencia9->execute();
    $t_general = $sentencia9->fetch(); 
    $t_t_general = $t_general[0]; 
          

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
                    <button type="button" class="btn btn-success m-1" style="width: 130px" onclick="imprimeNomina()">Imprimir</button>
                  </div>
                </div>
              </div><!-- /.box -->
              <div class="col-12 text-center pb-3" id="search">
                <form action="nomina_general.php" method="post"  class="search-form">
                  <input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="<?php echo date("Y-m-d")?>"  name="busqueda" type="date">
                  <input type="submit" value="consultar" >
                </form>
              </div>
              <section style="background-color: #fff" class="nomina">
                <div class="col-12" id="nomina">
                  <div class="p-3 text-center">
                    <div>
                      <p class="p-3"><strong>Primero Dios</strong></p>
                      <img src="../vistas/img/plantilla/logo-valentina.png" alt="">
                    </div>
                  </div> 
                  <h3><strong>Nómina General del día <?php echo $filtro;?></strong></h3>     
                </div> 
                <div class="col-lg-12">
                              <table class="justify-content-center table table-striped table-sm text-center" >
                                <thead>
                                  <tr>
                                    <th style="font-size: 18px;" scope="col">Nombre</th>
                                    <th style="font-size: 18px;" scope="col">Días</th>
                                    <th style="font-size: 18px;" scope="col">T_Extra</th>
                                    <th style="font-size: 18px;" scope="col">Ventas</th>
                                    <th style="font-size: 18px;" scope="col">T_perdido</th>
                                    <th style="font-size: 18px;" scope="col">Abonos</th>
                                    <th style="font-size: 18px;" scope="col">Adelantos</th>
                                    <th style="font-size: 18px;" scope="col">Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($nomina as $nomina_ind): ?>
                                    <tr>
                                      <td style="font-size: 18px; text-align: left;"><?php echo $nomina_ind['nombre'];?></td>
                                      <td style="font-size: 18px;"><?php echo $nomina_ind['dias'];?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($nomina_ind['t_extra'],2);?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($nomina_ind['ventas'],2);?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($nomina_ind['t_perdido'],2);?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($nomina_ind['abono'],2);?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($nomina_ind['a_cuenta'],2);?></td>
                                      <td style="font-size: 18px; ">$ <?php echo number_format($nomina_ind['t_general'],2);?></td>
                                    </tr>
                                  <?php endforeach?>
                                </tbody>
                                <tfoot>
                                  <th style="font-size: 18px;"></th>
                                  <th style="font-size: 18px;">Totales</th>
                                  <th style="font-size: 18px;">$ <?php echo number_format($t_extra,2);?></th>
                                  <th style="font-size: 18px;">$ <?php echo number_format($t_ventas,2);?></th>
                                  <th style="font-size: 18px;">$ <?php echo number_format($t_perdido,2);?></th>
                                  <th style="font-size: 18px;">$ <?php echo number_format($t_abono,2);?></th>
                                  <th style="font-size: 18px;">$ <?php echo number_format($t_a_cuenta,2);?></th>
                                  <th style="font-size: 18px;">$ <?php echo number_format($t_t_general,2);?></th>
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