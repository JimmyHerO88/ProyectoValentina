<?php
  ob_start();
  session_start();

  if(!isset($_SESSION['nombre'])){
    header('Location: login.html');
  }else{
  
  require 'header.php';

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
                      <h1 class="box-title">Usuarios
                        <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                      </h1>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <table class="table table-striped table-bordered table-condensed table-hover" id="tbllistado">
                        <thead>
                          <th>Opciones</th>
                          <th>Nombre</th>
                          <th>Login</th>
                          <th>Foto</th>
                          <th>Estado</th>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Login</th>
                            <th>Foto</th>
                            <th>Estado</th>
                        </tfoot>
                      </table>
                    </div>
                    <!-- general form elements -->
                    <?php

                      require 'forms/form_usuarios.php';

                    ?>
                  <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php

  require 'footer.php';

?>

<script type="text/javascript" src="scripts/usuario.js"></script>

<?php

  }
ob_end_flush();

?>