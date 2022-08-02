<?php

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
                      <h1 class="box-title">Gastos
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
                            <th>Concepto</th>
                            <th>Tipo</th>
                            <th>Importe</th>
                          </thead>

                          <tbody>
                          
                          </tbody>

                          <tfoot>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Tipo</th>
                            <th>Importe</th>
                          </tfoot>
                        </table>
                    </div>
                    <!-- general form elements -->
                    <?php

                      require 'forms/form_gastos.php';

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

<script type="text/javascript" src="scripts/gastos.js"></script>
