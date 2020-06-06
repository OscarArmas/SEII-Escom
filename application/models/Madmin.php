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

  public function get_materias(){
    $sql = $this->db->query("select Materia.Nombre, Materia.Materia_ID, Materia.Nivel, Carrera.Nombre as Nombre_Carrera FROM Materia JOIN Carrera ON
Materia.Carrera_ID = Carrera.Carrera_ID")->result();

    return json_encode($sql);

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
      return 1;

  }

  public function get_user_pdf($id_user){

    $sql = $this->db->query("select Usuario.Nombre, Usuario.AppPaterno,Usuario.AppMaterno,Usuario.Boleta,Usuario.Correo,
    Alumno_Materias.Recurse,Alumno_Materias.Turno, Materia.Nombre as Nombre_materia ,Materia.Nivel FROM Usuario JOIN Alumno_Materias ON Usuario.Usuario_ID = Alumno_Materias.Usuario_id
    JOIN Materia ON Alumno_Materias.Materia_id = Materia.Materia_ID WHERE Usuario.Usuario_ID = '$id_user'")->result();
    if (empty($sql)){
      $sql_empty = $this->db->query("select Usuario_ID, Nombre
      ,AppPaterno, AppMaterno, Boleta, Correo from Usuario where Usuario.Usuario_ID = '$id_user'")->result();

      $fecha ="Fecha de expedición: " . date("d") . " del " . date("m") . " de " . date("Y");
      $nombre_completo = $sql_empty[0]->Nombre .' '. $sql_empty[0]->AppPaterno .' '. $sql_empty[0]->AppMaterno;
      $url_img =base_url().'assets/images/img.jpg';
      $type = pathinfo($url_img, PATHINFO_EXTENSION);
      $data = file_get_contents($url_img);
      $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
      $html_content='<style>

      .footer{
             position: fixed;
             text-align: center;
             bottom: 0px;
             width: 150%;
         }
         .outer {
           display: table;
           position: absolute;
           top: 0;
           left: 100;
           height: 100%;
           width: 100%;
         }

         .middle {
           display: table-cell;
           vertical-align: middle;
         }

         .inner {
           margin-left: auto;
           margin-right: auto;
           width: 400px;
           /*whatever width you want*/
         }
  </style>';
      $html_content .= '<h1 style="color: #4485b8;"><span style="background-color:
       #4485b8; color: #ffffff; padding: 0 5px;">SEII ESCOM</span><br /> Sistema de Encuestas.</h1><br />'

       .' <br /><p><strong style="color: #000;">Numero de Boleta: </strong> '.$sql_empty[0]->Boleta.'
       <br />

       <p><strong style="color: #000;">Nombre: </strong> '.$nombre_completo.'
       <br />

       <p><strong style="color: #000;">Contacto: </strong> '.$sql_empty[0]->Correo.'
       <br />
       <br />
       <br />

       Lista de Materias preferente a inscribir el siguiente semestre.&nbsp;</p><br /><br />
       <div class="outer">
         <div class="middle">
           <div class="inner">
             <h1 style="color: red;">Sin registro</h1>
           </div>
         </div>
       </div>
       '
       .'<img src="'.$base64.'" alt="..." width="300" style =" position: absolute;
      right: 0;
      top: 0;
      display: block;
      height: 200px;
      width: 200px;
      background: url(TRbanner.gif) no-repeat;
      text-indent: -999em;
      text-decoration: none;">';

      return $html_content;

    }
    $fecha ="Fecha de expedición: " . date("d") . " del " . date("m") . " de " . date("Y");
    $nombre_completo = $sql[0]->Nombre .' '. $sql[0]->AppPaterno .' '. $sql[0]->AppMaterno;
    $url_img =base_url().'assets/images/img.jpg';
    $type = pathinfo($url_img, PATHINFO_EXTENSION);
    $data = file_get_contents($url_img);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    $html_content='<style>

    .footer{
           position: fixed;
           text-align: center;
           bottom: 0px;
           width: 150%;
       }
table, td, th {
  border: 3px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>';
    $html_content .= '<h1 style="color: #4485b8;"><span style="background-color:
     #4485b8; color: #ffffff; padding: 0 5px;">SEII ESCOM</span><br /> Sistema de Encuestas.</h1><br />'

     .' <br /><p><strong style="color: #000;">Numero de Boleta: </strong> '.$sql[0]->Boleta.'
     <br />

     <p><strong style="color: #000;">Nombre: </strong> '.$nombre_completo.'
     <br />

     <p><strong style="color: #000;">Contacto: </strong> '.$sql[0]->Correo.'
     <br />
     <br />
     <br />

     Lista de Materias preferente a inscribir el siguiente semestre.&nbsp;</p><br /><br />'
     .'<img src="'.$base64.'" alt="..." width="300" style =" position: absolute;
    right: 0;
    top: 0;
    display: block;
    height: 200px;
    width: 200px;
    background: url(TRbanner.gif) no-repeat;
    text-indent: -999em;
    text-decoration: none;">';
    $html_content.='<table>
  <tr>
    <th>Materia</th>
    <th>Turno</th>
    <th>Nivel</th>
    <th>Recurse</th>
  </tr>';
  foreach ($sql as $key) {

  $html_content .= '<tr>
    <td>'.$key->Nombre_materia.'</td>
    <td>'.$this->TurnoToString($key->Turno).'</td>
    <td>'.$key->Nivel.'</td>
    <td>'.$this->numberToString($key->Recurse).'</td>

  </tr>';    // code...
  }
  $html_content.='</table><div class="footer">'.$fecha.'</div>';


    return $html_content;

  }
  public function numberToString($n)
  {
      return $n == 1 ? 'Si' : 'No';
  }

  public function TurnoToString($n)
  {
      return $n == 1 ? 'Vespertino' : 'Matutino';
  }








}
