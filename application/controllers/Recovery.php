<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Recovery extends CI_Controller {
		function __construct(){
			parent::__construct();
			if($this->session->userdata('user'))
				redirect('dashboard', 'refresh');
      $this->load->library('email');
      $this->load->config('mail');
      $email_settings = $this->config->item('email');
      $this->email->initialize($email_settings);
  		$this->load->model('musuario');
			$this->load->library('form_validation');
	    }
	public function index(){
    	$this-> load ->view("vrecovery");
	}
	public function ajax_reiniciar(){
		header('Content-Type: application/json');
		$respuesta = Array();
		$email = $this->input->post('email');

		if(!$email){
			$respuesta["codigo"] = 1;
			$respuesta["respuesta"] = "No enviaste nada";
			echo json_encode($respuesta);
			return;
		}
		$id_usuario = $this->musuario->getIdByEmail($email);
		if(!$id_usuario){
			$respuesta["codigo"] = 1;
			$respuesta["respuesta"] = "Usuario no encontrado";
			echo json_encode($respuesta);
			return;
		}
		$this->sendMail($email, $id_usuario);
	}
	public function reset($TOKEN=null){
		if(!$TOKEN){
			redirect('Login','refresh');
		}
		$verify = $this->musuario->verifyTOKEN($TOKEN);

		if($verify['codigo']){
			$this->load->view('vnewpassword',["TOKEN"=>$TOKEN]);
		}

		else{
			redirect('Login','redirect');
		}
	}

	public function changepassword(){
		$respuesta = Array();
		$data = $this->input->post();
		header('Content-Type: application/json');
		if(!$data){
			$respuesta["codigo"] = 1;
			$respuesta["respuesta"] = "No enviaste nada";
			$respuesta["errores"] = Array("No hay informacion");
			echo json_encode($respuesta);
			return;
		}
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('token', 'TOKEN', 'required|max_length[64]|min_length[64]');
		$this->form_validation->set_data($this->input->post());

		$validate = $this->form_validation->run();
		if(!$validate){
			$respuesta["codigo"] = 1;
			$respuesta["respuesta"] = "Ocurrio un error";
			$respuesta["errores"] = validation_errors();
			echo json_encode($respuesta);
			return;
		}
		#Verificamos nuevamente el token!
		$token = $data['token'];
		$verify = $this->musuario->verifyTOKEN($token);
		if($verify['codigo']){
			$result = $this->musuario->updatePassword($token,$data['password']);
			if($result){
				$respuesta["codigo"] = 0;
				$respuesta["respuesta"] = "Contraseña reestablecida";
				$respuesta["errores"] = Array();
			}
			else{
				$respuesta["codigo"] = 1;
				$respuesta["respuesta"] = "No se pudo cambiar la contraseña, contacta con soporte tecnico";
				$respuesta["errores"] = Array();
			}
		}else{
			$respuesta["codigo"] = 0;
			$respuesta["respuesta"] = "Contraseña reestablecida";
			$respuesta["errores"] = $verify['respuesta'];
		}
			echo json_encode($respuesta);
	}

	private function sendMail( $email, $id){
		if(strlen($email) == 0){
			$respuesta["codigo"] = 1;
			$respuesta["respuesta"] = "Usuario no encontrado";
			echo json_encode($respuesta);
	    return;
	  }
		$TOKEN =  $this->musuario->createRestoreURL($id);
		if(!$TOKEN){
			$respuesta["codigo"] = 1;
			$respuesta["respuesta"] = "No se pudo reestablecer tu contraseña, intenta mas tarde.";
			echo json_encode($respuesta);
	    return;
		}
		$mensaje = $this->load->view('Email/vreset',["TOKEN"=>$TOKEN],true);
	  # Headers del correo
	  $this->email->set_newline("\r\n");
	  $this->email->from("seiitoblox@gmail.com");
		$this->email->subject("Solicitud de cambio de contraseña de  SEII-ESCOM");
	  $this->email->message($mensaje);
		$this->email->to($email);
		$result = $this->email->send();

		if(!$result){
			$respuesta["codigo"] = 1;
			$respuesta["respuesta"] = "No se pudo reestablecer tu contraseña, intenta mas tarde.";
	  }else {
				$respuesta["codigo"] = 0;
				$respuesta["respuesta"] = "Revisa tu correo para poder reestablecer tu contraseña.";
	  }
		echo json_encode($respuesta);
		return;
	}
}

?>
