<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  	function __construct()
  	{
  		parent::__construct();
 		$this->usuario = $this->session->userdata("user");
		if(!$this->usuario){
			redirect('dashboard');
		}
		if($this->usuario->nivel!=2){
			redirect('dashboard');
		}
		#$this->load->model('musuario');
		#$this->load->model('mescuela');
		#$this->load->model('mevento');
		#$this->load->library('form_validation');
    $this->load->model('Madmin');
  	}

	public function index(){

		$this->load->view('Admin/vadmin');
	}

  public function AlumnosView(){
    $lista_json_alumnos = $this->Madmin->get_alumnos();
    $data['Alumnos'] = json_decode($lista_json_alumnos);
    $this->load->view('Admin/vadminAlumno', $data);

  }

  public function Delete_user(){
    if(!$this->input->post()){
      echo " ¡Error! ";
      return;
    }
    $data = $this->input->post();
    print_r($data);
    return;
    #$id_delete = $this->Madmin->delete_user();

  }





}
