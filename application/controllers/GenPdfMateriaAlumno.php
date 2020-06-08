<?php defined('BASEPATH') OR exit('No direct script access allowed');

class GenPdfMateriaAlumno extends CI_Controller {


    public function __construct(){
      parent::__construct();
      $this->usuario = $this->session->userdata("user");
      if(!$this->usuario){
          redirect('dashboard');
      }
      $this->load->model('Madmin');

    }
    public function index(){
      echo 'VISTA NO DISPONIBLE';
    }

    public function details(){
      $id_user = $this->usuario->id_usuario;
      if ($id_user) {
        $this->load->library('pdf');
        $html_content = $this->Madmin->get_user_pdf($id_user);
        $this->dompdf->loadHtml($html_content);
        $this->dompdf->setPaper('A4');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

      }
    }

}
