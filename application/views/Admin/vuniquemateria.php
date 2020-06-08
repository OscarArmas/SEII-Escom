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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin</span></a>
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

                  <li><a href="<?php echo site_url('Admin/AlumnosView') ?>"><i class="fa fa-laptop"></i> Alumnos <span class="label label-success pull-right"></span></a></li>
                  <li><a href="<?php echo site_url('Admin/materias_view') ?>"><i class="fa fa-line-chart"></i> Materias <span class="label label-success pull-right"></span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                      <a class="dropdown-item"  href="javascript:;"> Mi perfil</a>
                      <a class="dropdown-item"  href="<?=base_url()?>login/salir"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</a>
                    </div>
                  </li>

                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="<?=base_url()?>assets/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="<?=base_url()?>assets/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="<?=base_url()?>assets/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="<?=base_url()?>assets/images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
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
                <h3>Materia:   <?php echo $datos[0]->Nombre; ?></h3>

                <h6 id="date"></h6>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Tipo de inscripción.</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <canvas id="alumnospornivelChart"></canvas>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Horario</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <canvas id="generoAlumnosEscuelaChart"></canvas>
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
        </footer> -->
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
    <!-- Las graficas las hago usando Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url()?>assets/build/js/custom.js"></script>

    <script>
        $.ajaxSetup({async: false});
        var paramMaterias = [];
        var paramAlumnos = [];


        function materias(int,colorRGBA){

        };

        function alumnosPorNivel(){

          var ctx = document.getElementById("alumnospornivelChart");
          var data = {
              datasets: [{
                  data: <?php  echo json_encode([$datos[0]->Inscritos - $datos[0]->Recurses, (int)$datos[0]->Recurses]);?>,
                  backgroundColor: [
                      "rgba(255, 50, 0, 0.75)",
                      "rgba(108, 255, 0, 0.75)",
                      "rgba(0, 166, 255, 0.75)",
                      "rgba(255, 205, 0, 0.75)",
                      "rgba(155, 0, 255, 0.75)"
                  ],
              }],
              labels: [
                  "Ordiario",
                  "Recurse"

              ]
          };

          var pieChart = new Chart(ctx, {
              data: data,
              type: 'bar',
              options: {
                  legend: false,
                  scales: {
           yAxes: [{
               ticks: {
                   beginAtZero: true
               }
           }]
       }
              }
          });
        };

        function generoAlumnosEscuela(){
          paramAlumnos = [];
          $.post("<?php echo base_url();?>Admin/get_genero_alumnos_escuela/"+'M',
                function(data){
                    var objAlumno = JSON.parse(data);
                    console.log(objAlumno);
                    paramAlumnos.push(Object.keys(objAlumno).length);
                });

          $.post("<?php echo base_url();?>Admin/get_genero_alumnos_escuela/"+'F',
                function(data){
                    var objAlumno = JSON.parse(data);
                    paramAlumnos.push(Object.keys(objAlumno).length);
                });


          var ctx = document.getElementById("generoAlumnosEscuelaChart");
          var data = {
              datasets: [{
                  data: <?php  echo json_encode([(int)$datos[0]->Matutinos , $datos[0]->Inscritos - $datos[0]->Matutinos]);?>,
                  backgroundColor: [
                      "rgba(0, 185, 255, 0.75)",
                      "rgba(255, 134, 251, 0.75)"
                  ],
              }],
              labels: [
                  "Matutino",
                  "Vespertino"
              ]
          };

          var pieChart = new Chart(ctx, {
              data: data,
              type: 'pie',
              options: {
                  legend: false
              }
          });
        }


        var coloresRGBA = ["rgba(255, 50, 0, 0.75)","rgba(108, 255, 0, 0.75)","rgba(0, 166, 255, 0.75)","rgba(255, 205, 0, 0.75)"]
        for(var i=1; i <= 4; i++)
            materias(i,coloresRGBA[i-1]);

        alumnosPorNivel();
        generoAlumnosEscuela();

    </script>

    <script>
      n =  new Date();
      var dias = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
      var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
      minutos = n.getMinutes().toString().length == 1 ? '0'+n.getMinutes() : n.getMinutes();
      horas = n.getHours().toString().length == 1 ? '0'+n.getHours() : n.getHours();
      ampm = n.getHours() >= 12 ? 'pm' : 'am';
      document.getElementById("date").innerHTML = "Ciudad de México a " +dias[n.getDay()]+ " "+n.getDate()+ " de " +meses[n.getMonth()]+
          " del " +n.getFullYear()+ " a las "+horas+":"+minutos+ampm;
    </script>
  </body>
</html>