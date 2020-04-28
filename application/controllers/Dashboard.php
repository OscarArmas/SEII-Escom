
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
     $this->usuario = $this->session->userdata("user");
     if(!$this->usuario){
          redirect('login');
      }

  }
  public function index()
  {
    $usuario = $this->usuario;
    $name_user = $usuario->nombre .' '. $usuario->appat;
    $Datos['nombre']= $name_user;

    $this->load->view('vdashboard', $Datos);


  }
}














 ?>
