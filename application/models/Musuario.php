<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Musuario extends CI_Model{
    function createRestoreURL($Usuario_ID){
        $data = Array();
        $fecha = date('Y-m-d H:i:s');
        $clave = $fecha."".$Usuario_ID;
        $TOKEN = hash('sha256',$clave);

        $data['usuario'] = $Usuario_ID;
        $data['fecha_creacion'] = $fecha;
        $data['usado'] = 0;
        $data['token'] = $TOKEN;

        if($this->db->insert('Tokens',$data))
            return $TOKEN;
        else
            return false;

    }
    public function getIdByEmail($correo){
      $this->db->select('Usuario_ID');
      $this->db->from('Usuario');
      $this->db->where('correo',$correo);
      $id = $this->db->get()->row_array();
      if(!$id)
        return false;
      return $id['Usuario_ID'];
    }
    function verifyTOKEN($TOKEN){
        $q = "SELECT usado,fecha_creacion from Tokens where token='".$TOKEN."';";
        $result = ($this->db->query($q))->result();
        if(!$result)
            return Array("codigo"=>false,"respuesta"=>"La clave no existe!");
        if(($result[0])->usado)
            return Array("codigo"=>false,"respuesta"=>"Ya usaste este token!");

        $fecha_creacion = ($result[0])->fecha_creacion;
        $fecha_expira = date('Y-m-d H:i:s',strtotime($fecha_creacion. ' + 3 days'));
        $fecha_actual = date('Y-m-d H:i:s');

        if($fecha_actual<=$fecha_expira)
            return Array("codigo"=>true,"respuesta"=>"Clave encontrada!");
        else
            return Array("code"=>false,"respuesta"=>"Clave expirada!");
    }
    function updatePassword($TOKEN=null,$password=null){
      if(!$TOKEN||!$password) //Modo paranoic ON XD
            return false;
      $q = "SELECT usuario from Tokens where token='".$TOKEN."' and usado=0;";
      $result = ($this->db->query($q))->result();
      if(!$result)
        return false;
      $id_user = ($result[0])->usuario;
      $this->db->where('Usuario_ID', $id_user);
      $this->db->update('Usuario', Array("Contraseña"=>$password));
      if($this -> db -> affected_rows() == 1){
          $this->db->where('token', $TOKEN);
          $this->db->update('Tokens', Array("usado"=>1));
       }
        return ($this->db->affected_rows() == 1);
    }

}
