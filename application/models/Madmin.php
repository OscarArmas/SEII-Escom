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

  public function get_user($Boleta){

    $sql = $this->db->query("select Usuario_ID, Nombre
    ,AppPaterno, AppMaterno, Boleta, Correo from Usuario where Usuario.Boleta = '$Boleta'")->result();

    return json_encode($sql);

  }

  public function update_user($data){
    $data_up = Array("Nombre"=>$data['Nombre'],
                  "AppPaterno"=>$data['AppPaterno'],
                  "AppMaterno"=>$data['AppMaterno'],
                  "Correo"=>$data['Correo']);
      $this->db->where('Boleta', $data['boleta']);
      $this->db->update('Usuario', $data_up);
      return true;

  }





}
