<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia_model extends CI_Model{

public function __construct(){

		parent::__construct();
   }


function listarVideosFB(){
	$this->db->select('*');
 	$this->db->from('imcopna.videos_facebook');
 	$consulta = $this->db->get();
	return $consulta->result();
}

}
