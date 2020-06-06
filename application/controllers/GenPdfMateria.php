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

    public function details_materia($id_materia){
      if ($id_user) {
        $this->load->library('pdf');
        $html_content = $this->Madmin->get_materia_pdf($id_materia);
        $this->dompdf->loadHtml($html_content);
          $this->dompdf->setPaper('A4');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

      }




    }
    public function esho($id_materia){
        $html_content = $this->Madmin->get_materia_pdf($id_materia);
       print_r($html_content) ;


    }

}
