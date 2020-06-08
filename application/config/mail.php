<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config["email"] = Array();
$config["email"]['protocol'] = 'smtp';
$config["email"]['smtp_host']    = 'smtp.gmail.com';
$config["email"]['smtp_port'] = 465;
$config["email"]['smtp_user'] = 'seiitoblox@gmail.com'; // correo sin espacio
$config["email"]['smtp_pass'] = 'Zero1281';
$config["email"]['smtp_crypto'] = 'ssl';
$config["email"]['smtp_timeout'] = '7';
$config["email"]['charset'] = 'utf-8';
$config["email"]['newline'] = "\r\n";
$config["email"]['mailtype'] = 'html'; // or html
$config["email"]['validation'] = TRUE; // bool whether to validate email or not
$config["email"]['newline'] = "\r\n";
$config["email"]['crlf']    = "\n";
$config["email"]['wordwrap'] = TRUE;
?>
