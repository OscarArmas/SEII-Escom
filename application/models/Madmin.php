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
    ,AppPaterno, AppMaterno, Boleta, Correo, fecha_nacimiento, genero from Usuario where Usuario.Boleta = '$Boleta'")->result();

    return json_encode($sql);

  }
  public function get_user_byid($id_user){

    $sql = $this->db->query("select Usuario_ID, Nombre
    ,AppPaterno, AppMaterno, Boleta, Correo, fecha_nacimiento, genero from Usuario where Usuario.Usuario_ID = '$id_user'")->result();

    return json_encode($sql);

  }

  public function update_user($data){
    $data_up = Array("Nombre"=>$data['Nombre'],
                  "AppPaterno"=>$data['AppPaterno'],
                  "AppMaterno"=>$data['AppMaterno'],
                  "Correo"=>$data['Correo'],
                  "fecha_nacimiento"=>$data['nacimiento']);
      $this->db->where('Boleta', $data['boleta']);
      $this->db->update('Usuario', $data_up);
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE)
      {
          return 0;
      }
      return 1;

  }

  /*public function get_nombre_materias(){
    $this->db->select('Nombre');
    $this->db->from('Materia');
    $query = $this->db->get();

    return $query->result();
  }*/

  public function get_nombre_materias($nivel){
    $sql = $this->db->query("select Materia.Nombre,Materia.Materia_ID,Materia.Nivel FROM Materia WHERE Materia.Nivel = '$nivel'")->result();
    return $sql;
  }

  public function get_numero_de_alumnos_por_materia($id_materia){
    $sql = $this->db->query("select Alumno_Materias.Materia_id,Materia.Nombre as Nombre_materia,
    Materia.Nivel FROM Alumno_Materias JOIN Materia ON Alumno_Materias.Materia_id = Materia.Materia_ID WHERE Alumno_Materias.Materia_id = '$id_materia'")->result();

    return $sql;
  }

  public function get_alumnos_por_nivel($nivel){
    $sql = $this->db->query("select DISTINCT Usuario_id FROM (select Materia.Nivel,Alumno_Materias.Usuario_id,Alumno_Materias.Materia_id FROM Materia JOIN Alumno_Materias ON Alumno_Materias.Materia_id = Materia.Materia_ID WHERE Materia.Nivel = '$nivel') as subquery")->result();

    return $sql;
  }

  public function get_genero_alumnos_escuela($sexo){
    $sql = $this->db->query("SELECT genero FROM Usuario WHERE genero = '$sexo' AND Nivel_permiso = 0")->result();
    return $sql;
  }

  /*public function get_numero_de_alumnos_por_materia($array){
    foreach ($array as $value){
      $sql = $this->db->query("select Alumno_Materias.Materia_id,Materia.Nombre as Nombre_materia,
      Materia.Nivel FROM Alumno_Materias JOIN Materia ON Alumno_Materias.Materia_id = Materia.Materia_ID WHERE Alumno_Materias.Materia_id = '$value'")->result();

      $alumnos = array();
      $alumnos[] = count($sql);
   }

    return $alumnos;
  }*/

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



  public function get_materia_info($id_materia){

    $sql = $this->db->query("select Materia.Nombre, Materia.Nivel, Carrera.Nombre as Carrera, COUNT(Alumno_Materias.Alumno_Materias_ID) as Inscritos,
     COUNT(CASE  WHEN Alumno_Materias.Recurse = 1 THEN 1 ELSE NULL END) as Recurses,
      COUNT(CASE  WHEN Alumno_Materias.Turno = 0 THEN 1 ELSE NULL END) as Matutinos
       from Alumno_Materias JOIN Materia ON Alumno_Materias.Materia_id = Materia.Materia_ID
       JOIN Carrera ON Materia.Carrera_ID = Carrera.Carrera_ID WHERE
        Alumno_Materias.Materia_id ='$id_materia'")->result();

      return $sql;

    }


    public function get_materia_pdf($id_materia){

      $sql = $this->db->query("select Materia.Nombre, Materia.Nivel, Carrera.Nombre as Carrera, COUNT(Alumno_Materias.Alumno_Materias_ID) as Inscritos,
       COUNT(CASE  WHEN Alumno_Materias.Recurse = 1 THEN 1 ELSE NULL END) as Recurses,
        COUNT(CASE  WHEN Alumno_Materias.Turno = 0 THEN 1 ELSE NULL END) as Matutinos
         from Alumno_Materias JOIN Materia ON Alumno_Materias.Materia_id = Materia.Materia_ID
         JOIN Carrera ON Materia.Carrera_ID = Carrera.Carrera_ID WHERE
          Alumno_Materias.Materia_id ='$id_materia'")->result();


      $fecha ="Fecha de expedición: " . date("d") . " del " . date("m") . " de " . date("Y");
      $nombre_completo = $sql[0]->Nombre;
      $inscritos= $sql[0]->Inscritos;
      $matutinos = $sql[0]->Matutinos;
      $vespertinos = $inscritos-$matutinos;
      $recuerses = $sql[0]->Recurses;
      $ordinario = $inscritos- $recuerses;
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

       .' <br /><p><strong style="color: #000;">Materia: </strong> '.$nombre_completo.'
       <br />
       <br />
       <p><strong style="color: #000;">Carrera: </strong> '.$sql[0]->Carrera.'
       <p><strong style="color: #000;">Inscritos: </strong> '.$inscritos.'
       <br />

       <p><strong style="color: #000;">Nivel: </strong>'.$sql[0]->Nivel.'

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
      <th>Matutinos</th>
      <th>Vespertinos</th>
      <th>Ordinario</th>
      <th>Recurses</th>
    </tr>
    <td>'.$matutinos.'</td>
    <td>'.$vespertinos.'</td>
    <td>'.$ordinario.'</td>
    <td>'.$recuerses.'</td>


    ';

    $html_content.='</table><div class="footer">'.$fecha.'</div>';


      return $html_content;

    }








}
