<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if(!isset($_SESSION["nombre"])){

  header("Location: login.html");

}else{

  require 'header.php';
  require "../config/Conexion.php";

  if ($_SESSION['corte_caja']==1){

    if(!empty($_POST["busqueda"])){

      $filtro = $_POST["busqueda"];

    }else{

      $filtro = date("Y-m-d"); 

    }

    $sql11 = "SELECT * FROM registro_notas WHERE concepto = 'NOTAS FORÁNEAS' AND fecha = '".$filtro."'";
            $sentencia11 = $pdo->prepare($sql11);
            $sentencia11->execute();
            $n_foraneas = $sentencia11->fetchAll();

    $sql20 = "SELECT * FROM registro_notas WHERE concepto = 'NOTAS REMISIÓN' AND fecha = '".$filtro."'";
            $sentencia20 = $pdo->prepare($sql20);
            $sentencia20->execute();
            $n_remision = $sentencia20->fetchAll();

    $sql30 = "SELECT * FROM registro_notas WHERE concepto = 'NOTAS PEDIDOS' AND fecha = '".$filtro."'";
            $sentencia30 = $pdo->prepare($sql30);
            $sentencia30->execute();
            $n_pedidos = $sentencia30->fetchAll(); 

    $sql40 = "SELECT * FROM registro_notas WHERE concepto = 'TICKETS FISCALES' AND fecha = '".$filtro."'";
            $sentencia40 = $pdo->prepare($sql40);
            $sentencia40->execute();
            $tc_fiscales = $sentencia40->fetchAll(); 

    $sql50 = "SELECT * FROM registro_notas WHERE concepto = 'TICKETS REMISONES' AND fecha = '".$filtro."'";
            $sentencia50 = $pdo->prepare($sql50);
            $sentencia50->execute();
            $tc_remisiones = $sentencia50->fetchAll();  

    $sql60 = "SELECT SUM(total) FROM registro_notas WHERE concepto = 'NOTAS FORÁNEAS' AND fecha = '".$filtro."'";
            $sentencia60 = $pdo->prepare($sql60);
            $sentencia60->execute();
            $total_foraneas = $sentencia60->fetch(); 
            $t_foraneas = $total_foraneas[0];
            if(empty($total_foraneas[0])){
              $t_foraneas = 0;
            }else{
              $t_foraneas = $total_foraneas[0];
            }

    $sql70 = "SELECT SUM(total) FROM registro_notas WHERE concepto = 'NOTAS REMISIÓN' AND fecha = '".$filtro."'";
            $sentencia70 = $pdo->prepare($sql70);
            $sentencia70->execute();
            $total_remisiones = $sentencia70->fetch(); 
            $t_remisiones = $total_remisiones[0];
            if(empty($total_remisiones[0])){
              $t_remisiones = 0;
            }else{
              $t_remisiones = $total_remisiones[0];
            }

    $sql80 = "SELECT SUM(total) FROM registro_notas WHERE concepto = 'NOTAS PEDIDOS' AND fecha = '".$filtro."'";
            $sentencia80 = $pdo->prepare($sql80);
            $sentencia80->execute();
            $total_pedidos = $sentencia80->fetch(); 
            $t_pedidos = $total_pedidos[0];
            if(empty($total_pedidos[0])){
              $t_pedidos = 0;
            }else{
              $t_pedidos = $total_pedidos[0];
            }
            

    $sql90 = "SELECT SUM(total) FROM registro_notas WHERE concepto = 'TICKETS FISCALES' AND fecha = '".$filtro."'";
            $sentencia90 = $pdo->prepare($sql90);
            $sentencia90->execute();
            $total_TCF = $sentencia90->fetch(); 
            $tickets_f = $total_TCF[0];
            if(empty($total_TCF[0])){
              $tickets_f = 0;
            }else{
              $tickets_f = $total_TCF[0];
            }

    $sql100 = "SELECT SUM(total) FROM registro_notas WHERE concepto = 'TICKETS REMISONES' AND fecha = '".$filtro."'";
            $sentencia100 = $pdo->prepare($sql100);
            $sentencia100->execute();
            $total_TCR = $sentencia100->fetch(); 
            $tickets_r = $total_TCR[0];
            if(empty($total_TCR[0])){
              $tickets_r = 0;
            }else{
              $tickets_r = $total_TCR[0];
            }

    $sql110 = "SELECT SUM(importe) FROM liquidaciones WHERE fecha = '".$filtro."'";
              $sentencia110 = $pdo->prepare($sql110);
              $sentencia110->execute();
              $total_liq = $sentencia110->fetch(); 
              $t_liquidaciones = $total_liq[0];
              if(empty($total_liq[0])){
                $t_liquidaciones = 0;
              }else{
                $t_liquidaciones = $total_liq[0];
              }

    $sql120 = "SELECT SUM(total) FROM registro_notas WHERE fecha = '".$filtro."'";
            $sentencia120 = $pdo->prepare($sql120);
            $sentencia120->execute();
            $total_venta = $sentencia120->fetch(); 
            $total_notas = $total_venta[0];
            if(empty($total_venta[0])){
              $total_notas = 0;
            }else{
              $total_notas = $total_venta[0];
            }

    $sql130 = "SELECT SUM(importe) FROM gasto WHERE fecha = '".$filtro."'";
              $sentencia130 = $pdo->prepare($sql130);
              $sentencia130->execute();
              $total_gastos_P = $sentencia130->fetch(); 
              $t_gastos_personales = $total_gastos_P[0];
              if(empty($total_gastos_P[0])){
                $t_gastos_personales = 0;
              }else{
                $t_gastos_personales = $total_gastos_P[0];
              }

    $sql140 = "SELECT SUM(importe) FROM deposito WHERE concepto LIKE 'DEPÓSITO%' and fecha = '".$filtro."'";
              $sentencia140 = $pdo->prepare($sql140);
              $sentencia140->execute();
              $total_depos = $sentencia140->fetch(); 
              $t_depositos = $total_depos[0];
              if(empty($total_depos[0])){
                $t_depositos = 0;
              }else{
                $t_depositos = $total_depos[0];
              }

    $sql150 = "SELECT SUM(importe) FROM deposito WHERE concepto LIKE 'TARJETA%' and fecha = '".$filtro."'";
              $sentencia150 = $pdo->prepare($sql150);
              $sentencia150->execute();
              $total_tarjeta = $sentencia150->fetch(); 
              $t_tarjeta = $total_tarjeta[0];
              if(empty($total_tarjeta[0])){
                $t_tarjeta = 0;
              }else{
                $t_tarjeta = $total_tarjeta[0];
              }

    $sql160 = "SELECT SUM(importe) FROM deposito WHERE concepto LIKE 'TRANSFERENCIA%' and fecha = '".$filtro."'";
              $sentencia160 = $pdo->prepare($sql160);
              $sentencia160->execute();
              $total_transf = $sentencia160->fetch(); 
              $t_transferencias = $total_transf[0];
              if(empty($total_transf[0])){
                $t_transferencias = 0;
              }else{
                $t_transferencias = $total_transf[0];
              }

    $sql170 = "SELECT SUM(importe) FROM deposito WHERE concepto LIKE 'FACTURA%' and fecha = '".$filtro."'";
              $sentencia170 = $pdo->prepare($sql170);
              $sentencia170->execute();
              $total_factura = $sentencia170->fetch(); 
              $t_facturas = $total_factura[0];
              if(empty($total_factura[0])){
                $t_facturas = 0;
              }else{
                $t_facturas = $total_factura[0];
              }

    $Total_VENTA = $total_notas + $t_liquidaciones;
    $Diferencia = $t_gastos_personales + $t_tarjeta + $t_depositos + $t_facturas + $t_transferencias - $Total_VENTA;

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-8">
                <div class="text-center">
                  <button class="btn btn-success" id="Resumen">Imprimir</button>
                  <form action="resumen.php" method="post"  class="search-form">
                    <input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="<?php echo date("Y-m-d")?>"  name="busqueda" type="date">
                    <input type="submit" value="consultar" >
                  </form>
                </div><!-- /.col -->
                    <div class="box" id="resumen">
                      <div class="box-header with-border">
                        <!-- REGISTROS FISCALES -->
                        <div class="container justify-content-center text-left">
                          <div class="col-md-8">
                            <div class="row">
                              <div class="col-md-8">
                                <p class="text-center"><strong>Primero Dios</strong></p>
                                <h3 class="text-center"><strong>Resumen de Corte del día <?php echo $filtro;?></strong></h3>
                                <h4  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>TOTAL NOTAS FORÁNEAS $ <?php echo number_format($t_foraneas,2);?></strong></h4>
                                <table class="justify-content-center table table-striped table-sm text-center" >
                                  <thead>
                                    <th style="font-size: 10px;">Folios</th>
                                    <th style="font-size: 10px;">Importe</th>
                                    <th style="font-size: 10px;">Cliente</th>
                                    <th style="font-size: 10px;">Tipo Pago</th>                                      
                                    <th style="font-size: 10px;">Observaciones</th>
                                  </thead>
                                  <tbody>
                                  <?php foreach($n_foraneas as $foraneas): ?>
                                      <tr>
                                        <td style="font-size: 12px;"><?php echo $foraneas['rango_folios'];?></td>
                                        <td style="font-size: 12px; text-align: rigth;">$ <?php echo number_format($foraneas['total'],2);?></td>
                                        <td style="font-size: 12px;"><?php echo substr(ucfirst(strtolower($foraneas['cliente'])),0,12);?>...</td>
                                        <td style="font-size: 12px;"><?php echo ucfirst(strtolower($foraneas['tipo_pago']));?></td>
                                        <td style="font-size: 12px;"><?php echo ucfirst(strtolower($foraneas['observaciones']));?></td>
                                      </tr>
                                  <?php endforeach?>     
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <h4  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>REMISIONES $ <?php echo number_format($t_remisiones,2);?></strong></h4>
                                <table class="justify-content-center table table-striped table-sm text-center">
                                  <thead>
                                    <th style="font-size: 10px;">Folios</th>
                                    <th style="font-size: 10px;">Importe</th>   
                                  </thead>
                                  <tbody>
                                  <?php foreach($n_remision as $remisiones): ?>
                                      <tr>
                                        <td style="font-size: 12px;"><?php echo $remisiones['rango_folios'];?></td>
                                        <td style="font-size: 12px; text-align: rigth;">$ <?php echo number_format($remisiones['total'],2);?></td>
                                      </tr>
                                  <?php endforeach?>     
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-4">
                                <h4  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>PEDIDOS $ <?php echo number_format($t_pedidos,2);?></strong></h4>
                                <table class="justify-content-center table table-striped table-sm text-center">
                                  <thead>
                                    <th>Folios</th>
                                    <th>Importe</th>   
                                  </thead>
                                  <tbody>
                                  <?php foreach($n_pedidos as $pedidos): ?>
                                      <tr>
                                        <td style="font-size: 12px;"><?php echo $pedidos['rango_folios'];?></td>
                                        <td style="font-size: 12px; text-align: rigth;">$ <?php echo number_format($pedidos['total'],2);?></td>
                                      </tr>
                                  <?php endforeach?>     
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <h4  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>TICKETS REM $ <?php echo number_format($tickets_r,2);?></strong></h4>
                                <table class="justify-content-center table table-striped table-sm text-center">
                                  <thead>
                                    <th>Folios</th>
                                    <th>Importe</th> 
                                  </thead>
                                  <tbody>
                                  <?php foreach($tc_remisiones as $tc_r): ?>
                                      <tr>
                                        <td style="font-size: 12px;"><?php echo $tc_r['rango_folios'];?></td>
                                        <td style="font-size: 12px; text-align: rigth;">$ <?php echo number_format($tc_r['total'],2);?></td>
                                      </tr>
                                  <?php endforeach?>     
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-4">
                                <h4  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>TICKETS FIS $ <?php echo number_format($tickets_f,2);?></strong></h4>
                                <table class="justify-content-center table table-striped table-sm text-center">
                                  <thead>
                                    <th>Folios</th>
                                    <th>Importe</th> 
                                  </thead>
                                  <tbody>
                                  <?php foreach($tc_fiscales as $tc_f): ?>
                                      <tr>
                                        <td style="font-size: 12px;"><?php echo $tc_f['rango_folios'];?></td>
                                        <td style="font-size: 12px; text-align: rigth;">$ <?php echo number_format($tc_f['total'],2);?></td>
                                      </tr>
                                  <?php endforeach?>     
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-8">
                                <h4  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>LIQUIDACIONES $ <?php echo number_format($t_liquidaciones,2);?></strong></h4>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-8">
                                <p style="font-size: 15px"><strong>
                                  Venta Real: $ <?php echo number_format($Total_VENTA,2);?><br>
                                  Gastos: $ <?php echo number_format($t_gastos_personales,2);?><br>
                                  Pagos con Tarjeta: $ <?php echo number_format($t_tarjeta,2);?><br>
                                  Depósitos: $ <?php echo number_format($t_depositos,2);?><br>
                                  Facturas: $ <?php echo number_format($t_facturas,2);?><br>
                                  Transferencias: $ <?php echo number_format($t_transferencias,2);?><br>
                                  Diferencia: $ <?php echo number_format($Diferencia,2);?><br>
                                </strong></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!-- /.box -->
              </div>
            </div><!-- /.row -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php

}else{

  require 'noacceso.php';
  
}

require 'footer.php';

?>

<?php
}
ob_end_flush();
?>