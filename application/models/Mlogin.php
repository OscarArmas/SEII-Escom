<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Mlogin extends CI_Model
{
    public function ingresar($username=null,$curp=null){
        if(!$username || !$curp)
            return Array();
        $this->db->select('Usuario_ID,Nombre,AppMaterno, AppPaterno, Nivel_permiso');
        $this->db->from('Usuarios');
        $this->db->where('username',$username);
        $user = $this->db->get()->result_array();
        if(!$user)
            return Array();
        $user = $user[0];
        $check = password_verify($curp,$user["password"]);
        if(!$check)
            return Array();
        unset($user["password"]);
        return $user;
    }
    public function getall()
    {
        $this->db->select('*');
        $this->db->from('Usuarios');
        return $this->db->get()->result_array();  //hacemos la consulta y la guarda en la la variable $resultado
    }

}
