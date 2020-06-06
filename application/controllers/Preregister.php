<<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Preregister extends CI_Controller
{

  function __construct()
  {

    parent::__construct();
    $this->load->model('Mlogin');
  }
  public function index(){
    $this->load->view('vregister');

  }
  public function fullregister(){
    if(!$this->input->post()){
			echo "Hicite algo mal!";
			return;
		}
		$data = $this->input->post();
    if(isset($data['nombre'])&&isset($data['genero'])&&isset($data['nacimiento'])&&isset($data['boleta'])&&isset($data['appat'])&&isset($data['apmat'])&&isset($data['email'])&&isset($data['password'])&&isset($data['confirm-password'])){
      $nombre = $data['nombre'];
      $appat = $data['appat'];
      $apmat = $data['apmat'];
      $boleta = $data['boleta'];
      $password = $data['password'];
      $email = $data['email'];
      $nacimiento = date("Y-m-d",strtotime($data['nacimiento']));
      $genero = $data['genero'];

      $exist = $this->Mlogin->isFullRegister($boleta);
      if($exist[0]->Correo == NULL){
        print_r($data);
        $this->Mlogin->Fullregister($nombre,$appat,$apmat,$email,$password,$boleta,$nacimiento,$genero);
      }
      if($exist){
        echo "El usuario o el email ya existe!";
        return;
    }


  }




}

}









 ?>
