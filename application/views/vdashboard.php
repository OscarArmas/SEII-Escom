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

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets/bower_components/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
    <style>
h4 {
        background-color: white;
        color: darkred;
        padding: 5px 10px;
      }
a{
  font-size: 15px;
}
label{
  font-size: 15px;
}
li{
  font-size: 20px;
}
.boton {
    background-color: darkgray;
    border-radius: 50%;
    padding: 5px 10px;
    text-decoration: none;
    color: lightblue;
    font-weight: bold;

}
.borrar {
    background-color: red;
    border-radius: 50%;
    padding: 5px 10px;
    text-decoration: none;
    color: white;
    font-weight: bold;
}
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url()?>" class="site_title"><i class="fa fa-user"></i> <span>SEII Escom</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url()?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $info[0]->Nombre.' '.$info[0]->AppPaterno ?></h2>
                <h2 id="UID" style="display: none;"><?php echo $id_usuario?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a href="<?php echo site_url('GenPdfMateriaAlumno/details') ?>"><i class="fa fa-file-pdf-o"></i>Comprobante<span class="label label-success pull-right"></span></a></li>
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
                      <img src="<?=base_url()?>assets/images/img.jpg" alt=""><?php echo $info[0]->Nombre.' '.$info[0]->AppPaterno ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="<?=base_url()?>preregister/update_register"> Mi perfil</a>
                      <a class="dropdown-item"  href="<?=base_url()?>preregister/change_password"><i class="fa fa-key pull-right"></i>Cambiar Contraseña</a>
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
            <div class="page-title">
              <div class="title_left">
                <h3>Materias preferentes para el siguiente semestre.</h3>

              </div>
              <div class="title_right">


              </div>


            </div>

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
                          <th style="font-size:15px;" >Turno</th>
                          <th style="font-size:15px;" >Nivel</th>
                          <th style="font-size:15px;" >Recurse</th>
                        </tr>
                      </thead>


                      <tbody>

                        <?php foreach($Materias as $key=>$values): ?>
                        <tr>

                          <td style="font-size:15px;"><?php echo $values->Nombre_materia; ?></td>
                          <td style="font-size:15px;"><?php echo ($values->Turno)? "Vespertino":"Matutino"; ?></td>
                          <td style="font-size:15px;"><?php echo $values->Nivel; ?></td>
                          <td style="font-size:15px;"><?php echo ($values->Recurse)? "SI":"NO"; ?></td>

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
    <script src="<?=base_url()?>assets/build/js/APP.js"></script>

  </body>
</html>
