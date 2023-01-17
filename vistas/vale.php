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

    if(isset($_GET["idgasto"])){

      $filtro = $_GET["idgasto"]; 

      $sql = "SELECT * FROM gasto WHERE idgasto = '".$filtro."'";
                $sentencia = $pdo->prepare($sql);
                $sentencia->execute();
                $gasto = $sentencia->fetch(); 

    }elseif(isset($_GET["idprestamo"])){

        $filtro = $_GET["idprestamo"]; 

        $sql = "SELECT *  FROM prestamo INNER JOIN empleado ON prestamo.idempleado = empleado.idempleado WHERE idprestamo = '".$filtro."'";
                $sentencia = $pdo->prepare($sql);
                $sentencia->execute();
                $prestamo = $sentencia->fetch(); 

    }elseif(isset($_GET["iddeposito"])){

        $filtro = $_GET["iddeposito"]; 
        $sql = "SELECT * FROM deposito WHERE iddeposito = '".$filtro."'";
                $sentencia = $pdo->prepare($sql);
                $sentencia->execute();
                $deposito = $sentencia->fetch(); 

        $deno1 = 1000;
        $deno2 = 500;
        $deno3 = 200;
        $deno4 = 100;
        $deno5 = 50;
        $deno6 = 20;
        $deno7 = 1;

        $cant1 =  $deposito['cant1'];
        $cant2 =  $deposito['cant2'];
        $cant3 =  $deposito['cant3'];
        $cant4 =  $deposito['cant4'];          
        $cant5 =  $deposito['cant5'];
        $cant6 =  $deposito['cant6'];
        $cant7 =  $deposito['cant7'];

        $importe1 = $deno1 * $cant1;
        $importe2 = $deno2 * $cant2;
        $importe3 = $deno3 * $cant3;
        $importe4 = $deno4 * $cant4;
        $importe5 = $deno5 * $cant5;
        $importe6 = $deno6 * $cant6;
        $importe7 = $deno7 * $cant7;

        $total = $importe1 + $importe2 + $importe3 + $importe4 + $importe5 + $importe6 + $importe7;
      
    }elseif(isset($_GET["idnomina"])){

        $filtro = $_GET["idnomina"]; 
        $sql = "SELECT * FROM nomina INNER JOIN empleado ON empleado.idempleado = nomina.idempleado WHERE idnomina = '".$filtro."'";
                $sentencia = $pdo->prepare($sql);
                $sentencia->execute();
                $nomina = $sentencia->fetch(); 

        $deuda = $nomina['idempleado'];

        $sql2 = "SELECT e.idempleado, e.nombre, e.sueldo_dia, coalesce(p.prestamo, 00000.00) prestamo, coalesce(a.abono, 00000.00) abono, coalesce(p.prestamo, 00000.00) - coalesce(a.abono, 00000.00) debe FROM empleado e LEFT OUTER JOIN (SELECT idempleado, SUM(coalesce(importe, 00000.00)) prestamo FROM prestamo GROUP BY 1) p on e.idempleado=p.idempleado LEFT OUTER JOIN (SELECT idempleado, SUM(coalesce(importe, 00000.00)) abono FROM abono GROUP BY 1) a on e.idempleado=a.idempleado WHERE e.idempleado='".$deuda."' ORDER BY e.nombre";
        $sentencia2 = $pdo->prepare($sql2);
        $sentencia2->execute();
        $total_deuda = $sentencia2->fetch();
      
    }

?>

<div id="vale">
    <?php if(isset($_GET["iddeposito"])){ ?>
        <div class="col-12 text-center">
            <h1 class="text-center" style="font-size: 200px;"><strong><?php echo $_SESSION['sucursal'];?>
            </strong></h1>
            <h3 class="text-center" style="font-size: 150px;">Fecha: <strong><?php echo $deposito['fecha'] ?></strong></h3>
            <p style="font-size: 80px;">***********************************************************</p>
            <p class="text-center" style="font-size: 200px;"><span><strong><?php echo $deposito['concepto'] ?></strong></span></p>
            <p style="font-size: 80px;">***********************************************************</p>
            <table class="justify-content-center table table-sm">
                <thead>
                    <tr>
                        <th style="font-size: 60px; text-align:center;">DENOMINACIÓN</th>
                        <th style="font-size: 60px; text-align:center;">CANTIDAD</th>
                        <th style="font-size: 60px; text-align:center;">IMPORTE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 80px; text-align:center;">$ 1,000.00</td>
                        <td style="font-size: 80px; text-align:center;"><?php echo $cant1 ?></td>
                        <td style="font-size: 80px; text-align:center;">$ <?php echo number_format($importe1,2); ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 80px; text-align:center;">$ 5000.00</td>
                        <td style="font-size: 80px; text-align:center;"><?php echo $cant2 ?></td>
                        <td style="font-size: 80px; text-align:center;">$ <?php echo number_format($importe2,2); ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 80px; text-align:center;">$ 200.00</td>
                        <td style="font-size: 80px; text-align:center;"><?php echo $cant3 ?></td>
                        <td style="font-size: 80px; text-align:center;">$ <?php echo number_format($importe3,2); ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 80px; text-align:center;">$ 100.00</td>
                        <td style="font-size: 80px; text-align:center;"><?php echo $cant4 ?></td>
                        <td style="font-size: 80px; text-align:center;">$ <?php echo number_format($importe4,2); ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 80px; text-align:center;">$ 50.00</td>
                        <td style="font-size: 80px; text-align:center;"><?php echo $cant5 ?></td>
                        <td style="font-size: 80px; text-align:center;">$ <?php echo number_format($importe5,2); ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 80px; text-align:center;">$ 20.00</td>
                        <td style="font-size: 80px; text-align:center;"><?php echo $cant6 ?></td>
                        <td style="font-size: 80px; text-align:center;">$ <?php echo number_format($importe6,2); ?></td>
                    </tr>
                    <tr>
                        <td style="font-size: 80px; text-align:center;"></td>
                        <td style="font-size: 80px; text-align:center;">MORRALLA</td>
                        <td style="font-size: 80px; text-align:center;">$ <?php echo number_format($importe7,2); ?></td>
                    </tr>
                </tbody>
            </table>
            <p style="font-size: 80px;">**********************************************************</p>
            <p class="text-center" style="font-size: 350px;"><span><strong>$ <?php echo number_format($total,2); ?></strong></span></p>
            <p style="font-size: 80px;">***********************************************************</p>
            <h4 class="text-center" style="font-size: 80px;"><strong>FIRMA DE RECIBIDO</strong></h4>
            <p class="text-center" style="font-size: 60px; "><br><br><br><br>_________________________________________________</p>
        </div>
    <?php }else if(isset($_GET["idgasto"])){ ?>
        <div class="col-12">
            <h1 class="text-center" style="font-size: 200px;"><strong><?php echo $_SESSION['sucursal'];?></strong></h1>
            <h2 class="text-center" style="font-size: 150px;"><u>VALE PROVISIONAL DE CAJA</u></h2>
            <h3 class="text-center" style="font-size: 150px;" id="fecha_vale">Fecha: <strong><?php echo $gasto['fecha'];?></strong></h3>
            <h4 class="text-center" style="font-size: 80px;"><strong>CANTIDAD</strong></h4>
            <p style="font-size: 80px;">***********************************************************</p>
            <p class="text-center" style="font-size: 300px;" id="importe_vale"><span><strong>$ <?php echo number_format($gasto['importe'],2);?></strong></span></p>
            <p style="font-size: 80px;">***********************************************************<br></p>
            <h4 class="text-center" style="font-size: 80px;"><strong>CONCEPTO</strong></h4>
            <p style="font-size: 80px;">***********************************************************</p>
            <h2 class="text-center" style="font-size: 180px;" id="concepto_vale"><span><strong><?php echo $gasto['concepto'];?></strong></span></h2>
            <p style="font-size: 80px;">***********************************************************</p>
            <h4 class="text-center" style="font-size: 80px;"><strong>FIRMA DE RECIBIDO</strong></h4>
            <p class="text-center" style="font-size: 60px; "><br><br><br><br>_________________________________________________</p>
        </div>  
    <?php }else if(isset($_GET["idprestamo"])){ ?>
        <div class="col-12">
            <h1 class="text-center" style="font-size: 200px;"><strong><?php echo $_SESSION['sucursal'];?></strong></h1>
            <h2 class="text-center" style="font-size: 150px;"><u>VALE PROVISIONAL DE CAJA</u></h2>
            <h3 class="text-center" style="font-size: 150px;" id="fecha_vale">Fecha: <strong><?php echo $prestamo['fecha'];?></strong></h3>
            <h4 class="text-center" style="font-size: 80px;"><strong>CANTIDAD</strong></h4>
            <p style="font-size: 80px;">***********************************************************</p>
            <p class="text-center" style="font-size: 300px;" id="importe_vale"><span><strong>$ <?php echo number_format($prestamo['importe'],2);?></strong></span></p>
            <p style="font-size: 80px;">***********************************************************<br></p>
            <h4 class="text-center" style="font-size: 80px;"><strong>CONCEPTO</strong></h4>
            <p style="font-size: 80px;">***********************************************************</p>
            <h2 class="text-center" style="font-size: 180px;" id="concepto_vale"><span><strong><?php echo $prestamo['tipo'];?><br><?php echo $prestamo['nombre'];?></strong></span></h2>
            <p style="font-size: 80px;">***********************************************************</p>
            <h4 class="text-center" style="font-size: 80px;"><strong>FIRMA DE RECIBIDO</strong></h4>
            <p class="text-center" style="font-size: 60px; "><br><br><br><br>_________________________________________________</p>
        </div>  
    <?php }else if(isset($_GET["idnomina"])){ ?>
        <div class="col-12">
            <h1 class="text-center" style="font-size: 200px;"><strong>Creaciones Valentina</strong></h1>
            <h2 class="text-center" style="font-size: 150px;"><u>Vale de Nómina</u></h2>
            <h3 class="text-center" style="font-size: 150px;">Fecha: <strong><?php echo $nomina['tipo'];?></strong></h3>
            <p class="text-center" style="font-size: 80px;">***********************************************************</p>
            <h4 class="text-center" style="font-size: 150px;"><strong>Deuda acumulada: $ <?php echo $total_deuda['debe'];?> </strong></h4>
            <p class="text-center" style="font-size: 80px;">***********************************************************</p>
            <h4 class="text-center" style="font-size: 80px;"><strong>Nómina a nombre de:</strong></h4>
            <h2 class="text-center" style="font-size: 180px;"><span><strong><?php echo $nomina['nombre'];?></strong></span></h2>
            <p class="text-center" style="font-size: 80px;">***********************************************************</p>
            <div class="row">
                <div class="col-6">
                <p class="text-right" style="font-size: 120px;">Días Laborados</p>
                <p class="text-right" style="font-size: 120px;">Tiempo Extra</p>
                <p class="text-right" style="font-size: 120px;">Ventas</p>
                <p class="text-right" style="font-size: 120px;">Abono a Deuda</p>
                <p class="text-right" style="font-size: 120px;">Tiempo Perdido</p>
                </div>
                <div class="col-6">
                <p class="text-left" style="font-size: 120px; padding-left: 100px;"><?php echo $nomina['dias'];?></p>
                <p class="text-left" style="font-size: 120px; padding-left: 100px;">$ <?php echo $nomina['t_extra'];?></p>
                <p class="text-left" style="font-size: 120px; padding-left: 100px;">$ <?php echo $nomina['ventas'];?></p>
                <p class="text-left" style="font-size: 120px; padding-left: 100px;">$ <?php echo $nomina['abono'];?></p>
                <p class="text-left" style="font-size: 120px; padding-left: 100px;">$ <?php echo $nomina['t_perdido'];?></p>
                </div>
                <div class="col-12">
                <p class="text-center" style="font-size: 80px;">***********************************************************<br></p>
                <p class="text-center" style="font-size: 120px;"><strong>Total a Pagar</strong></p>
                <h4 class="text-center" style="font-size: 250px;"><strong>$ <?php echo $nomina['t_general'];?></strong></h4><br>
                <p class="text-center" style="font-size: 80px;">***********************************************************</p><br><br>
                </div>
            </div>
            <h4 class="text-center" style="font-size: 80px; padding-top: 20px;"><strong>FIRMA DE RECIBIDO</strong></h4><br>
            <p class="text-center" style="font-size: 80px; "><br><br><br>_________________________________________________</p>
        </div>  
    <?php } ?>
</div>
<?php

}else{

  require 'noacceso.php';
  
}


?>

<script type="text/javascript" src="scripts/vale.js"></script>

<?php
}
ob_end_flush();
?>