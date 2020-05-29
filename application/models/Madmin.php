<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Madmin extends CI_Model
{
  public function get_alumnos(){
    $sql = $this->db->query("select Usuario_ID, Nombre
    ,AppPaterno, AppMaterno, Boleta, Correo from Usuario")->result();

    return json_encode($sql);
  }

  public function delete_user($Boleta){

    return $this->db->delete('Usuario', array('Boleta' => $Boleta));

  }




}
