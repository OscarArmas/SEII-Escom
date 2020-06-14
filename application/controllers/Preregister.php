<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Preregister extends CI_Controller
{

  function __construct()
  {

    parent::__construct();
    $this->load->model('Mlogin');
    $this->load->model('Madmin');
    $this->load->model('Musuario');
    $this->usuario = $this->session->userdata("user");
  }
  public function index(){
      if(!$this->input->post()){
            echo "Hicite algo mal!";
            return;
        }
        $data = $this->input->post();
        $info['boleta'] = $data;
        //$info[data]
    $this->load->view('vregister', $info);


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



public function update_register(){
    $id_user = $this->usuario->id_usuario;

  $info_user = $this->Madmin->get_user_byid($id_user);
  $data['Alumno']= json_decode($info_user);
  $this->load->view('vformeditalumno', $data);
  return;


}

public function update_info_alumno(){
  if(!$this->input->post()){
    echo " ¡Error! ";
    return;
  }
    $data = $this->input->post();

     $verify = $this->Madmin->update_user($data);
     echo $verify;

     return;


}



public function change_password(){

    $usuario = $this->usuario;
    $name_user = $usuario->nombre .' '. $usuario->appat;
    $Datos['nombre']= $name_user;
    $Datos['id_usuario'] = $usuario->id_usuario;
    $info_user = $this->Madmin->get_user_byid($usuario->id_usuario);
    $Datos['info'] = json_decode($info_user);
    $this->load->view('vchangepass', $Datos);
    return;


}


public function change_pass_user(){
    if(!$this->input->post()){
      echo " ¡Error! ";
      return;
    }
      $usuario = $this->usuario;
      $data = $this->input->post();
      $is_change = $this->Musuario->change_pass($usuario->id_usuario,$data['pass']);
      print_r($is_change);
      return;

}

}









 ?>
