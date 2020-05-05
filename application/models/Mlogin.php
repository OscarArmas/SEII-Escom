<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Mlogin extends CI_Model
{
    public function ingresar($boleta=null,$contraseña=null){
        if(!$boleta || !$contraseña)
            return Array();
        $this->db->select('Usuario_ID,Nombre,AppMaterno, AppPaterno, Nivel_permiso,Curp, Boleta,Contraseña');
        $this->db->from('Usuario');
        $this->db->where('Boleta',$boleta);
        $user = $this->db->get()->result_array();
        if(!$user)
            return Array();
        $user = $user[0];
        $check = strcmp($contraseña,$user["Contraseña"]);
        if($check != 0)
            return Array();
        unset($user["Contraseña"]);
        return $user;
    }

    public function isFullRegister($boleta = null){
      if(!$boleta)
          return False;
      $this->db->select('Correo');
      $this->db->from('Usuario');
      $this->db->where('Boleta', $boleta);
      return $this->db->get()->result();

    }

    public function getall()
    {
        $this->db->select('*');
        $this->db->from('Usuarios');
        return $this->db->get()->result_array();  //hacemos la consulta y la guarda en la la variable $resultado
    }


    public function Fullregister($nombre,$appat,$apmat,$email,$password, $boleta){
        $data = Array("Nombre"=>$nombre,
                      "AppPaterno"=>$appat,
                      "AppMaterno"=>$apmat,
                      "Correo"=>$email,
                      "Contraseña	"=>$password);
          $this->db->where('Boleta', $boleta);
          $this->db->update('Usuario', $data);
          return true;

    }
}
