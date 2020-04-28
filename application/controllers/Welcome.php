<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
	        parent::__construct();
	        $this->usuario = $this->session->userdata("user");
	        if(!$this->usuario){
	            redirect('login');
	        }
		}

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function test(){
		echo 'HOLAAAAAAAAAAAAAAAAAAAAAAAA';
	}
}
