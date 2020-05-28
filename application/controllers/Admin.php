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
  	}

	public function index(){

		$this->load->view('Admin/vadmin');
	}

  public function AlumnosView(){
    $this->load->view('Admin/vadminAlumno');

  }





}
