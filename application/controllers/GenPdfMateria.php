<?php defined('BASEPATH') OR exit('No direct script access allowed');

class GenPdfMateria extends CI_Controller {


    public function __construct(){
    parent::__construct();

    $this->usuario = $this->session->userdata("user");
    if(!$this->usuario){
        redirect('dashboard');
    }
    if($this->usuario->nivel!=2){
        redirect('dashboard');
    }
    $this->load->model('Madmin');
    }

    public function index(){
      echo 'VISTA NO DISPONIBLE';
    }

    public function details_materia_pdf($id_materia){
      if ($id_materia) {
        $this->load->library('pdf');
        $html_content = $this->Madmin->get_materia_pdf($id_materia);
        $this->dompdf->loadHtml($html_content);
          $this->dompdf->setPaper('A4');
        $this->dompdf->render();
        $this->dompdf->stream("materia.pdf", array("Attachment"=>0));

      }




    }
    public function info($id_materia){
      $datos = $this->Madmin->get_materia_info($id_materia);
      $data['datos']=$datos;
      $this->load->view('Admin/vuniquemateria', $data);
        return;


    }

    public function info_s($id_materia){
      $datos = $this->Madmin->get_materia_test($id_materia);
      print_r($datos);
        return;


    }



}
