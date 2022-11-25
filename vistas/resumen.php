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

    $sql = "SELECT nombre, tipo, importe FROM prestamo INNER JOIN empleado on prestamo.idempleado = empleado.idempleado WHERE fecha = '".$filtro."' ORDER BY tipo";
              $sentencia = $pdo->prepare($sql);
              $sentencia->execute();
              $g_nomina = $sentencia->fetchAll();

      $sql2 = "SELECT * FROM pago_proveedor WHERE fecha = '".$filtro."' ORDER BY concepto";
              $sentencia2 = $pdo->prepare($sql2);
              $sentencia2->execute();
              $g_prov = $sentencia2->fetchAll();  

      $sql3 = "SELECT * FROM gasto WHERE tipo = 'TIENDA' AND fecha = '".$filtro."' ORDER BY concepto";
              $sentencia3 = $pdo->prepare($sql3);
              $sentencia3->execute();
              $g_tienda = $sentencia3->fetchAll(); 

      $sql4 = "SELECT * FROM gasto WHERE tipo = 'PERSONAL' AND fecha = '".$filtro."' ORDER BY concepto";
              $sentencia4 = $pdo->prepare($sql4);
              $sentencia4->execute();
              $g_personal = $sentencia4->fetchAll(); 

      $sql5 = "SELECT * FROM liquidaciones WHERE fecha = '".$filtro."' ORDER BY concepto";
              $sentencia5 = $pdo->prepare($sql5);
              $sentencia5->execute();
              $liquidaciones = $sentencia5->fetchAll(); 

      $sql6 = "SELECT SUM(importe) FROM prestamo WHERE fecha = '".$filtro."'";
              $sentencia6 = $pdo->prepare($sql6);
              $sentencia6->execute();
              $total_prestamo = $sentencia6->fetch(); 
              $t_prestamos = $total_prestamo[0];
              if(empty($total_prestamo[0])){
                $t_prestamos = 0;
              }else{
                $t_prestamos = $total_prestamo[0];
              }

      $sql7 = "SELECT SUM(importe) FROM pago_proveedor WHERE fecha = '".$filtro."'";
              $sentencia7 = $pdo->prepare($sql7);
              $sentencia7->execute();
              $total_proveedores = $sentencia7->fetch(); 
              $t_proveedores = $total_proveedores[0];
              if(empty($total_proveedores[0])){
                $t_proveedores = 0;
              }else{
                $t_proveedores = $total_proveedores[0];
              }

      $sql8 = "SELECT SUM(importe) FROM gasto WHERE tipo = 'TIENDA' AND fecha = '".$filtro."'";
              $sentencia8 = $pdo->prepare($sql8);
              $sentencia8->execute();
              $total_gastos_T = $sentencia8->fetch(); 
              $t_gastos_tienda = $total_gastos_T[0];
              if(empty($total_gastos_T[0])){
                $t_gastos_tienda = 0;
              }else{
                $t_gastos_tienda = $total_gastos_T[0];
              }
              

      $sql9 = "SELECT SUM(importe) FROM gasto WHERE tipo = 'PERSONAL' AND fecha = '".$filtro."'";
              $sentencia9 = $pdo->prepare($sql9);
              $sentencia9->execute();
              $total_gastos_P = $sentencia9->fetch(); 
              $t_gastos_personales_cuadrante = $total_gastos_P[0];
              if(empty($total_gastos_P[0])){
                $t_gastos_personales_cuadrante = 0;
              }else{
                $t_gastos_personales_cuadrante = $total_gastos_P[0];
              }

      $sql10 = "SELECT SUM(importe) FROM liquidaciones WHERE fecha = '".$filtro."'";
              $sentencia10 = $pdo->prepare($sql10);
              $sentencia10->execute();
              $total_liq = $sentencia10->fetch(); 
              $t_liquidaciones = $total_liq[0];
              if(empty($total_liq[0])){
                $t_liquidaciones = 0;
              }else{
                $t_liquidaciones = $total_liq[0];
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

      $sql140 = "SELECT SUM(importe) FROM deposito WHERE tipo = 'DEPÓSITO' and fecha = '".$filtro."'";
                $sentencia140 = $pdo->prepare($sql140);
                $sentencia140->execute();
                $total_depos = $sentencia140->fetch(); 
                $t_depositos = $total_depos[0];
                if(empty($total_depos[0])){
                  $t_depositos = 0;
                }else{
                  $t_depositos = $total_depos[0];
                }

      $sql150 = "SELECT SUM(importe) FROM deposito WHERE tipo = 'TARJETA' and fecha = '".$filtro."'";
                $sentencia150 = $pdo->prepare($sql150);
                $sentencia150->execute();
                $total_tarjeta = $sentencia150->fetch(); 
                $t_tarjeta = $total_tarjeta[0];
                if(empty($total_tarjeta[0])){
                  $t_tarjeta = 0;
                }else{
                  $t_tarjeta = $total_tarjeta[0];
                }

      $sql160 = "SELECT SUM(importe) FROM deposito WHERE tipo like 'TRANSF%' and fecha = '".$filtro."'";
                $sentencia160 = $pdo->prepare($sql160);
                $sentencia160->execute();
                $total_transf = $sentencia160->fetch(); 
                $t_transferencias = $total_transf[0];
                if(empty($total_transf[0])){
                  $t_transferencias = 0;
                }else{
                  $t_transferencias = $total_transf[0];
                }

      $sql170 = "SELECT SUM(importe) FROM deposito WHERE tipo = 'FACTURA' and fecha = '".$filtro."'";
                $sentencia170 = $pdo->prepare($sql170);
                $sentencia170->execute();
                $total_factura = $sentencia170->fetch(); 
                $t_facturas = $total_factura[0];
                if(empty($total_factura[0])){
                $t_facturas = 0;
              }else{
                $t_facturas = $total_factura[0];
              }

      $sql180 = "SELECT * FROM deposito WHERE fecha = '".$filtro."'";
                $sentencia180 = $pdo->prepare($sql180);
                $sentencia180->execute();
                $listado_depos = $sentencia180->fetchAll();

    $Total_VENTA = $total_notas + $t_liquidaciones;
    $Diferencia = $t_gastos_personales + $t_tarjeta + $t_depositos + $t_facturas + $t_transferencias - $Total_VENTA;

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" id="content-wrapper">        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- Left navbar links -->   
                <div class="pt-1 text-center" id="botones">
                  <button type="button" class="btn btn-warning m-1" style="width: 130px" data-toggle="modal" data-target="#modal-depositos">Depósitos</button>
                  <button type="button" class="btn btn-warning m-1" style="width: 130px" data-toggle="modal" data-target="#modal-gastos">Gastos</button>
                  <button type="button" class="btn btn-warning m-1" style="width: 130px"data-toggle="modal" data-target="#modal-notas">Notas</button>
                  <button type="button" class="btn btn-warning m-1" style="width: 130px"data-toggle="modal" data-target="#modal-liquidaciones">Liquidaciones</button>
                  <button type="button" class="btn btn-warning m-1" style="width: 130px"data-toggle="modal" data-target="#modal-proveedores">Proveedores</button>
                  <button type="button" class="btn btn-info m-1" style="width: 130px"data-toggle="modal" data-target="#modal-prestamos">Préstamos</button>
                  <button type="button" class="btn btn-info m-1" style="width: 130px"data-toggle="modal" data-target="#">Adelantos</button>
                  <button type="button" class="btn btn-info m-1" style="width: 130px"data-toggle="modal" data-target="#">Prenómina</button>
                  <button type="button" class="btn btn-success m-1" style="width: 130px" onclick="imprimeCuadrante()">Imprimir Cuadrante</button>
                  
                  <button type="button" class="btn btn-success m-1" style="width: 130px" onclick="imprimeResumen()">Imprimir Resumen</button>
                </div>
              </div><!-- /.box -->
              <div class="col-12 text-center pb-3" id="search">
                <form action="resumen.php" method="post"  class="search-form">
                  <input onblur="if (this.value=='') this.value = this.defaultValue" onfocus="if (this.value==this.defaultValue) this.value = ''" value="<?php echo date("Y-m-d")?>"  name="busqueda" type="date">
                  <input type="submit" value="consultar" >
                </form>
              </div>
              <section style="background-color: #fff">
                <div class="col-12" id="cuadrante">
                  <div class="p-3 text-center">
                    <div>
                      <p class="p-3"><strong>Primero Dios</strong></p>
                      <h3 class=""><strong>Corte de Cuadrantes del día <?php echo $filtro;?></strong></h3>
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-6" style="border-right: 5px solid;">
                      <h5  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>NÓMINA</strong></h5>
                      <table class="justify-content-center table table-striped table-sm text-center" >
                        <tbody>
                        <?php foreach($g_nomina as $nomina): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo substr(ucfirst(strtolower($nomina['tipo'])),0,8);?> <?php echo substr($nomina['nombre'],0,10);?>...</td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($nomina['importe'],2);?></td>
                            </tr>
                        <?php endforeach?>     
                        </tbody>
                      </table>
                      <p class="text-center" style="font-size: 25px;"><strong>Total: $ <?php echo number_format($t_prestamos,2);?></strong></p>
                    </div>
                    <div class="col-6">
                      <h5 style="border-style: solid; border-width: 3px;" class="text-center"><strong>PROVEEDORES</strong></h5>
                      <table class="justify-content-center table table-striped table-sm text-center" >
                        <tbody>
                        <?php foreach($g_prov as $prov): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo substr(ucfirst(strtolower($prov['concepto'])),0,40);?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($prov['importe'],2);?></td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                      </table>
                      <p class="text-center" style="font-size: 25px;"><strong>Total: $ <?php echo number_format($t_proveedores,2);?> </strong></p>
                    </div>
                  </div>    
                  <div class="row">
                    <div class="col-6" style="border-right: 5px solid; border-top: 5px solid; padding-top: 15px;">
                      <h5  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>GASTOS TIENDA</strong></h5>
                      <table class="justify-content-center table table-striped table-sm text-center"  >
                        <tbody>
                        <?php foreach($g_tienda as $tienda): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo substr(ucfirst(strtolower($tienda['concepto'])),0,40);?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($tienda['importe'],2);?></td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                      </table>
                      <p class="text-center" style="font-size: 25px;"><strong>Total: $ <?php echo number_format($t_gastos_tienda,2);?></strong></p>
                      <h5  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>GASTOS PERSONALES</strong></h5>
                      <table class="justify-content-center table table-striped table-sm text-center"  >
                        <tbody>
                        <?php foreach($g_personal as $personal): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo substr(ucfirst(strtolower($personal['concepto'])),0,40);?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($personal['importe'],2);?></td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                      </table>
                      <p class="text-center" style="font-size: 25px;"><strong>Total: $ <?php echo number_format($t_gastos_personales_cuadrante,2);?></strong></p>
                    </div>
                    <div class="col-6" style="border-top: 5px solid; padding-top: 15px;">
                      <h5 style="border-style: solid; border-width: 3px;" class="text-center"><strong>DEPÓSITOS</strong></h5>
                      <table class="justify-content-center table table-striped table-sm text-center"  >
                        <tbody>
                        <?php foreach($listado_depos as $depos): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo ($depos['tipo']);?> <?php echo ($depos['concepto']);?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($depos['importe'],2);?></td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                      </table>
                      <p class="text-center" style="font-size: 25px;"><strong>Total: $ <?php echo number_format($t_depositos,2);?></strong></p>
                      <h5 style="border-style: solid; border-width: 3px;" class="text-center"><strong>LIQUIDACIONES</strong></h5>
                      <table class="justify-content-center table table-striped table-sm text-center"  >
                        <tbody>
                        <?php foreach($liquidaciones as $liq): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo substr(ucfirst(strtolower($liq['concepto'])),0,40);?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($liq['importe'],2);?></td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                      </table>
                      <p class="text-center" style="font-size: 25px;"><strong>Total: $ <?php echo number_format($t_liquidaciones,2);?></strong></p>
                    </div>
                  </div>     
                </div>
                <div class="col-12 pt-5 pb-1 text-center" id="resumen">
                  <div>
                    <h3 class=""><strong>Resumen de Corte del día <?php echo $filtro;?></strong></h3>
                    <h5  style="border-style: solid; border-width: 3px;"  class="text-center" style="font-size: 25px;"><strong>TOTAL NOTAS FORÁNEAS $ <?php echo number_format($t_foraneas,2);?></strong></h5>
                    <table class="justify-content-center table table-striped table-sm text-center" >
                      <thead>
                        <th style="font-size: 20px;">Folios</th>
                        <th style="font-size: 20px;">Importe</th>
                        <th style="font-size: 20px;">Cliente</th>
                        <th style="font-size: 20px;">Tipo Pago</th>                                      
                        <th style="font-size: 20px;">Observaciones</th>
                      </thead>
                      <tbody>
                      <?php foreach($n_foraneas as $foraneas): ?>
                          <tr>
                            <td style="font-size: 20px;"><?php echo $foraneas['rango_folios'];?></td>
                            <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($foraneas['total'],2);?></td>
                            <td style="font-size: 20px;"><?php echo substr(ucfirst(strtolower($foraneas['cliente'])),0,50);?></td>
                            <td style="font-size: 20px;"><?php echo ucfirst(strtolower($foraneas['tipo_pago']));?></td>
                            <td style="font-size: 20px;"><?php echo ucfirst(strtolower($foraneas['observaciones']));?></td>
                          </tr>
                      <?php endforeach?>     
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <h5  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>REMISIONES $ <?php echo number_format($t_remisiones,2);?></strong></h5>
                      <table class="justify-content-center table table-striped table-sm text-center">
                        <thead>
                          <th style="font-size: 20px;">Folios</th>
                          <th style="font-size: 20px;">Importe</th>   
                        </thead>
                        <tbody>
                        <?php foreach($n_remision as $remisiones): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo $remisiones['rango_folios'];?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($remisiones['total'],2);?></td>
                            </tr>
                        <?php endforeach?>     
                        </tbody>
                      </table>
                    </div>
                    <div class="col-6">
                      <h5  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>PEDIDOS $ <?php echo number_format($t_pedidos,2);?></strong></h5>
                      <table class="justify-content-center table table-striped table-sm text-center">
                        <thead>
                          <th style="font-size: 20px;">Folios</th>
                          <th style="font-size: 20px;">Importe</th>      
                        </thead>
                        <tbody>
                        <?php foreach($n_pedidos as $pedidos): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo $pedidos['rango_folios'];?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($pedidos['total'],2);?></td>
                            </tr>
                        <?php endforeach?>     
                        </tbody>
                      </table>
                    </div>                    
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <h5  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>TICKETS REMISIONES $ <?php echo number_format($tickets_r,2);?></strong></h4>
                      <table class="justify-content-center table table-striped table-sm text-center">
                        <thead>
                          <th style="font-size: 20px;">Folios</th>
                          <th style="font-size: 20px;">Importe</th> 
                        </thead>
                        <tbody>
                        <?php foreach($tc_remisiones as $tc_r): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo $tc_r['rango_folios'];?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($tc_r['total'],2);?></td>
                            </tr>
                        <?php endforeach?>     
                        </tbody>
                      </table>
                    </div>
                    <div class="col-6">
                      <h5  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>TICKETS FISCALES $ <?php echo number_format($tickets_f,2);?></strong></h4>
                      <table class="justify-content-center table table-striped table-sm text-center">
                        <thead>
                          <th style="font-size: 20px;">Folios</th>
                          <th style="font-size: 20px;">Importe</th> 
                        </thead>
                        <tbody>
                        <?php foreach($tc_fiscales as $tc_f): ?>
                            <tr>
                              <td style="font-size: 20px;"><?php echo $tc_f['rango_folios'];?></td>
                              <td style="font-size: 20px; text-align: rigth;">$ <?php echo number_format($tc_f['total'],2);?></td>
                            </tr>
                        <?php endforeach?>     
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-12">
                    <h5  style="border-style: solid; border-width: 3px;"  class="text-center"><strong>LIQUIDACIONES $ <?php echo number_format($t_liquidaciones,2);?></strong></h5>
                    <p style="font-size: 40px"><strong>
                      ****************************************************************<br>
                    Venta Real: $ <?php echo number_format($Total_VENTA,2);?><br>
                      ****************************************************************</p>
                    
                    <p class="text-success" style="font-size: 30px">Pagos con Tarjeta: $ <?php echo number_format($t_tarjeta,2);?><br>
                    Depósitos: $ <?php echo number_format($t_depositos,2);?><br>
                    Facturas: $ <?php echo number_format($t_facturas,2);?><br>
                    Transferencias: $ <?php echo number_format($t_transferencias,2);?>
                    
                    </p>
                    <p class="text-danger" style="font-size: 30px">Gastos: $ <?php echo number_format($t_gastos_personales,2);?></p>
                    <p style="font-size: 40px">****************************************************************</p>
                    <?php if($Diferencia > 0){ ?>
                        <p class="text-success" style="font-size: 30px">Diferencia: $ <?php echo number_format($Diferencia,2);?><br></p></strong></p>;
                    <?php }else if($Diferencia < 0){ ?>
                        <p class="text-danger" style="font-size: 30px">Diferencia: $ <?php echo number_format($Diferencia,2);?><br></p></strong></p>;
                    <?php }else{ ?>
                        <p style="font-size: 30px">Diferencia: $ <?php echo number_format($Diferencia,2);?><br></p></strong></p>;
                    <?php } ?>
                  </div>
                </div> 
              </section>  
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>

      <!-- vale de caja -->
      <div id="vale_caja"></div>

      <!-- vale de caja -->
      <div id="vale_deposito"></div>

      <!-- MODAL -->
      <?php
        require 'modal/modal_gastos.php';
        require 'modal/modal_depositos.php';
        require 'modal/modal_proveedores.php';
        require 'modal/modal_registro_notas.php';
        require 'modal/modal_liquidaciones.php';
        require 'modal/modal_prestamos.php';
      ?>

<?php

}else{

  require 'noacceso.php';
  
}

//require 'footer.php';

?>

<script type="text/javascript" src="scripts/modal/modales.js"></script>

<?php
}
ob_end_flush();

?>