<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Mlogin extends CI_Model
{
    public function ingresar($boleta=null,$curp=null){
        if(!$boleta || !$curp)
            return Array();
        $this->db->select('Usuario_ID,Nombre,AppMaterno, AppPaterno, Nivel_permiso,Curp, Boleta,Contraseña');
        $this->db->from('Usuario');
        $this->db->where('Boleta',$boleta);
        $user = $this->db->get()->result_array();
        if(!$user)
            return Array();
        $user = $user[0];
        $check = strcmp($curp,$user["Curp"]);
        if($check != 0)
            return Array();
        unset($user["Curp"]);
        return $user;
    }
    public function getall()
    {
        $this->db->select('*');
        $this->db->from('Usuarios');
        return $this->db->get()->result_array();  //hacemos la consulta y la guarda en la la variable $resultado
    }

}
