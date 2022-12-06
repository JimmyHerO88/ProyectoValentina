<?php
  ob_start();
  session_start();

  if(!isset($_SESSION['nombre'])){
    header('Location: login.html');
  }else{
  
  require 'header.php';

  if ($_SESSION['nomina']==1){

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                      <h1 class="box-title">Prenómina
                        <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                      </h1>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <table class="table table-striped table-bordered table-condensed table-hover" id="tbllistado">
                          <thead>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Dias</th>
                            <th>T_Extra</th>
                            <th>Ventas</th>
                            <th>T_Perdido</th>
                            <th>Adelanto</th>
                            <th>Abono</th>
                            <th>Mercancía</th>
                            <th>T_General</th>
                          </thead>

                          <tbody>
                          
                          </tbody>

                          <tfoot>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Dias</th>
                            <th>T_Extra</th>
                            <th>Ventas</th>
                            <th>T_Perdido</th>
                            <th>Adelanto</th>
                            <th>Abono</th>
                            <th>Mercancía</th>
                            <th>T_General</th>
                          </tfoot>
                        </table>
                    </div>
                    <!-- general form elements -->
                    <?php

                      require 'forms/form_prenomina.php';

                    ?>
                  <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
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

<script type="text/javascript" src="scripts/nomina.js"></script>

<?php
}
ob_end_flush();

?>