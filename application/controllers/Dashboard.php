
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
      if($this->usuario->nivel==2)
            redirect('Admin');
      $this->load->model('Musuario');

  }
  public function index()
  {
    $usuario = $this->usuario;
    $name_user = $usuario->nombre .' '. $usuario->appat;
    $Datos['nombre']= $name_user;
    $Datos['id_usuario'] = $usuario->id_usuario;
    $materias = $this->Musuario->getMaterias($usuario->id_usuario);
    if(empty($materias)){
          $this->load->view('vdashboardregistro', $Datos);
    }else{
        $Datos["Materias"] = $materias;
        $this->load->view('vdashboard', $Datos);
    #  print_r($materias);
    }
  }
}














 ?>
