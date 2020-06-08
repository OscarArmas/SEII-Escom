<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>SEII-Escom | </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets/bower_components/nprogress/nprogress.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('Admin') ?>" class="site_title"><i class="fa fa-paw"></i> <span>Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url()?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Administrador</span>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                    <li><a href="<?php echo site_url('Admin') ?>"><i class="fa fa-area-chart"></i> Inicio <span class="label label-success pull-right"></span></a></li>
                    <li><a href="<?php echo site_url('Admin/AlumnosView') ?>"><i class="fa fa-laptop"></i> Alumnos <span class="label label-success pull-right"></span></a></li>
                    <li><a href="<?php echo site_url('Admin/materias_view') ?>"><i class="fa fa-line-chart"></i> Materias <span class="label label-success pull-right"></span></a></li>
                  </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesion" href="<?=base_url()?>login/salir" style="width: 100%;">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?=base_url()?>assets/images/img.jpg" alt="">Administrador
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="<?=base_url()?>login/salir"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</a>
                    </div>
                  </li>

                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">

                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th style="font-size:15px;" >Materia</th>
                          <th style="font-size:15px;" >Nivel</th>
                          <th style="font-size:15px;" >Carrera</th>
                          <th style="font-size:15px;" >Reporte</th>
                        </tr>
                      </thead>


                      <tbody>

                        <?php foreach($Materias as $key=>$values): ?>

                        <tr>

                          <td style="font-size:15px;"><?php echo $values->Nombre; ?></td>
                          <td style="font-size:15px;"><?php echo $values->Nivel; ?></td>
                          <td style="font-size:15px;"><?php echo $values->Nombre_Carrera; ?></td>
                          <td>
                            <i class="fa fa-bar-chart _iconAction info" data-info=<?php echo $values->Materia_ID; ?> style="color:green;"></i>&nbsp;
                            <i class="fa fa-file-pdf-o _iconAction pdf" data-pdf=<?php echo $values->Materia_ID; ?> style="color:red;"></i>&nbsp;

                          </td>

                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url()?>assets/bower_components/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url()?>assets/build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script src="<?=base_url()?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=base_url()?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <style>
      ._iconAction{
        font-size:30px;
        cursor: pointer;
      }
    </style>

  <script>
  $( "body" ).on( "click", ".eliminar", function() {



    var boleta = $(this).attr("data-eliminar");
    //buscamos el TR mas cercano al click, osea el que hicimos click
    var tr = $(this).closest('tr');
    tr.css({ 'background-color' : '  #e7e3d2  ' });
    //Avisar al Admin con SWEETALERT
    swal({
      title: "Seguro que quieres eliminar a este usuario?",
      text: "Sera borrado de todo el sistema",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        url: "Delete_user",
        type: "post",
        data: {boleta:boleta},
        success:function(data){

          tr.hide();
                }
        });
      }else{
        tr.css({ 'background-color' : 'white' });
      }
    });


  });



  $( "body" ).on( "click", ".verinfo", function() {
    boleta = $(this).attr("data-verinfo");
    var tr = $(this).closest('tr');
    var color_tr = tr.css("background-color");
    tr.css({ 'background-color' : '  #e7e3d2  ' });
    $.ajax({
      url: "see_info_user",
      type: "post",
      data: {boleta:boleta},
      success:function(data){
        var data = JSON.parse(data);
        var nombre_completo=data[0]['Nombre']+" "+data[0]['AppPaterno']+" "+data[0]['AppMaterno'];
        swal({ html:true, title:"Información", text:"Nombre: "+nombre_completo+
              "\n"+"Boleta: "+data[0]['Boleta']+
              "\n"+"Correo: "+data[0]['Correo']})
              .then((value) => {
                tr.css({ 'background-color' : color_tr });
              });

       }

    });

  });


  $( "body" ).on( "click", ".pdf", function() {
    id_materia= $(this).attr("data-pdf");
    window.location.href = "<?php echo base_url();?>/GenPdfMateria/details_materia_pdf/"+id_materia;
  });


  $( "body" ).on( "click", ".info", function() {
    id_materia= $(this).attr("data-info");
    window.location.href = "<?php echo base_url();?>/GenPdfMateria/info/"+id_materia;

  });












  </script>
  <!-- SweetAlert-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>
