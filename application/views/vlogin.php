
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body {
    padding-top: 90px;
}
i.fa{
  font-size: 1.6em;
  width: 1.6em;
  text-align: center;
  line-height: 1.6em;
  color: #fff;
  border-radius: 0.8em; /* or 50% width & line-height */
  border-bottom: 10px;
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #337ab7;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

	</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SEII | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/Version3.3/bootstrap.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/Version3.3/bootstrap.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
            <img  src="<?php echo base_url('assets/escudoESCOM.png'); ?>"  class="img-responsive" alt="logo-de-ESCOM">
						<div class="row">
						<div class="col-s-12">
							<h1>
							<i class="fas fa-book-reader"></i>
							</h1>

						</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Activar cuenta</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Iniciar Sesion</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="boleta" id="boleta" tabindex="1" class="form-control" placeholder="Boleta" value="" data-validetta="required" data-vd-message-required="Campo requerido!">
									</div>
									<div class="form-group">
										<input type="text" name="curp" id="curp" tabindex="2" class="form-control" placeholder="CURP" data-validetta="required" data-vd-message-required="Campo requerido!">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Activar">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="<?php echo base_url();?>login/recovery" tabindex="5" class="forgot-password">Olvidaste tu contraseña?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="registrar" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="boleta" id="boleta" tabindex="1" class="form-control" placeholder="Boleta" value="" data-validetta="required" data-vd-message-required="Campo requerido!">
									</div>
									<div class="form-group">
										<input type="password" name="contraseña" id="contraseña" tabindex="2" class="form-control" placeholder="Contraseña" data-validetta="required" data-vd-message-required="Campo requerido!">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Iniciar">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="<?php echo base_url();?>login/recovery" tabindex="5" class="forgot-password">Olvidaste tu contraseña?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});




	$("#login-form").validetta({
	  onValid : function( event ) {
	    event.preventDefault(); // Will prevent the submission of the form
		 		$.ajax({
		 		url: "login/checkRegister",
		 		type: "post",
		 		data: $("#login-form").serialize()
		 		})
				.success( function( datas ){
					if(datas == "null"){
						swal("Datos no encontrados","Revisa si tu Curp y Boleta son correctos","error");
					}
					if (datas == "1"){
						swal("Cuenta Activada","Ya has activado tu cuenta anteriormente.","success");
					}
					if(datas == "0"){
						window.location.replace("<?php echo base_url();?>/Preregister");
					}

            })
            .fail( function( jqXHR, textStatus ){
                console.log(textStatus+':'+jqXHR.status+' : '+jqXHR.statusText);
            })
            .always( function( result ){ console.log('Request done !!');
        });

	  }

	});







	$("#register-form").validetta({
	  onValid : function( event ) {
	    event.preventDefault(); // Will prevent the submission of the form
		 		$.ajax({
		 		url: "login/iniciar",
		 		type: "post",
		 		data: $("#register-form").serialize()
		 		})
				.success( function( datas ){
					location.reload();

            })
            .fail( function( jqXHR, textStatus ){
                console.log(textStatus+':'+jqXHR.status+' : '+jqXHR.statusText);
            })
            .always( function( result ){ console.log('Request done !!');
        });

	  }

	});






 	});

	</script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- SweetAlert-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- validetta-->
	<script type="text/javascript" src="<?=base_url()?>assets/validetta/validetta.js"></script>
</body>
</html>
