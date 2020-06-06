<?php defined('BASEPATH') OR exit('No direct script access allowed');

class GenPdf extends CI_Controller {


    public function __construct(){
    parent::__construct();
    $this->load->model('Madmin');
    }

    public function index(){
       $boleta= 1;
      $data['user_data'] = $this->Madmin->get_user_pdf($boleta);
      print_r($data);
    }

    public function details($id_user){
      if ($id_user) {
        $this->load->library('pdf');
        $html_content = $this->Madmin->get_user_pdf($id_user);
        $this->dompdf->loadHtml($html_content);
        $this->dompdf->setPaper('A4');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

      }




    }
    public function esho(){
      $html_content = $this->Madmin->test_join(1);
       print_r($html_content) ;


    }

}
