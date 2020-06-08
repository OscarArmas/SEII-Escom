<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  	function __construct()
  	{
  		parent::__construct();
  		$this->load->model('mlogin');
  	}
	public function index()
	{
		$user = $this->session->userdata("user");
		if(!$user){
			$this->load->view('vlogin');
		}
		else{
			redirect('dashboard');
		}
		return;

	}
	public function iniciar(){
		if(!$this->input->post()){
			echo "Hicite algo mal!";
			return;
		}
		$data = $this->input->post();
    print_r($data);
		if(isset($data['boleta'])&&isset($data['contraseña'])){
			$boleta = $data['boleta'];
			$contraseña = $data['contraseña'];
			$data = $this->mlogin->ingresar($boleta,$contraseña);
			if(!$data){
				echo "CURP o Boleta no encontrados";
				return;
			}

  			$name = $data["Nombre"]." ".$data["AppPaterno"]." ".$data["AppMaterno"];
  			$this->session->set_userdata('user',(object)Array(
  				"id_usuario"	=> $data['Usuario_ID'],
  				"nombre" 		=> $data["Nombre"],
  				"appat"  		=> $data["AppPaterno"],
  				"apmat"			=> $data["AppMaterno"],
  				"nivel"  		=> $data["Nivel_permiso"]
  				));
  			echo "Bienvenido ".$name;
  			return;



		}
		else{
			echo "No derrapes!";
			return;
		}
	}


  public function checkRegister(){
    $this->load->model('Mlogin');
    if(!$this->input->post()){
      echo "Hicite algo mal!";
      return;
    }

    $data = $this->input->post();
    $boleta = $data['boleta'];
    $data = $this->Mlogin->isFullRegister($boleta);
    if (empty($data)){
      echo "null";
      return ;
    }
    if($data[0]->Correo == NULL){
      echo "0";
      return  ;
    }
    echo "1";
;    return ;
  }
	/*public function generarpass($pass=null){
		if(!$pass){
			echo "Mandame un parametro!";
			return;
		}
		echo password_hash($pass, PASSWORD_DEFAULT)."\n";
	}*/
	public function salir(){
		$this->session->unset_userdata('user');
		redirect('Login');
	}
	public function recovery(){
		$this->load->view('vrecovery');
	}
}
