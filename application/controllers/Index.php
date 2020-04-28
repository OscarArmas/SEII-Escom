<?php
class Index extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $usuario = $this->session->userdata("user");
        if($usuario){
            redirect('Login');
        }
    }

    public function index(){
        redirect('Login');
    }
}
?>
