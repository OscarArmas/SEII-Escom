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
    $id_delete = $this->Madmin->delete_user($data['boleta']);

  }

  public function Edit_info($boleta){
    if($boleta){
    $info_user = $this->Madmin->get_user($boleta);
    $data['Alumno']= json_decode($info_user);
    $this->load->view('Admin/vformedit', $data);
    return;
  }
}

  public function update_info(){
    if(!$this->input->post()){
      echo " ¡Error! ";
      return;
    }
      $data = $this->input->post();

       $verify = $this->Madmin->update_user($data);
       echo $verify;

       return;


  }

  /*public function get_nombre_materias(){
    $result = $this->Madmin->get_nombre_materias();
    echo json_encode($result);
  }*/

  public function get_nombre_materias($nivel){
    $result = $this->Madmin->get_nombre_materias($nivel);
    echo json_encode($result);
  }

  public function get_numero_de_alumnos_por_materia($id_materia){
    $result = $this->Madmin->get_numero_de_alumnos_por_materia($id_materia);
    echo json_encode($result);
  }

  public function get_alumnos_por_nivel($nivel){
    $result = $this->Madmin->get_alumnos_por_nivel($nivel);
    echo json_encode($result);
  }

  public function get_genero_alumnos_escuela($sexo){
    $result = $this->Madmin->get_genero_alumnos_escuela($sexo);
    echo json_encode($result);
  }

  /*public function get_numero_de_alumnos_por_materia(){
    $array=json_decode($_POST['jsondata']);
    $result = $this->Madmin->get_numero_de_alumnos_por_materia($array);
    echo $result;
  }*/

  public function see_info_user(){
    if(!$this->input->post()){
      echo " ¡Error! ";
      return;
    }
    $data = $this->input->post();
    $verify = $this->Madmin->get_user($data['boleta']);
    $html_content = $this->Madmin->get_user_pdf($data['boleta']);
    echo $html_content;


  }

  public function materias_view(){

    $lista_json_alumnos = $this->Madmin->get_materias();
    $data['Materias'] = json_decode($lista_json_alumnos);
    $this->load->view('Admin/vadminchartmaterias', $data);

  }

public function add_alumno(){

$this->load->view('Admin/vadminadduser');
}

public function add_new_alumno(){
    if(!$this->input->post()){
      echo " ¡Error! ";
      return;
    }
    $data = $this->input->post();

    $is_add= $this->Madmin->nuevo_alumno_pre($data['boleta'], $data['CURP']);
    echo $is_add;
    return;




}









}
