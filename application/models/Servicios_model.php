<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	function mdlMostrarServicios(){

		$this->db->where('estado', '1');
		$servicios = $this->db->get('servicios')->result();

		foreach($servicios as $s){
		
			$sql = "SELECT  sr.idServicio as id,d.Nombre as Cargo FROM servicios_responsables sr inner join responsables r on r.idResponsable = sr.idResponsable
						inner join parametro_detalle d on r.id_parametro_det_16=d.Ident_detalle where sr.idServicio = '" . $s->idServicios . "' group by d.Nombre order by d.orden asc";

			$s->{'responsables'} = $this->db->query($sql)->result();

			foreach ($s->responsables as $o) {
				$sql2 = "SELECT r.Nombre,r.ApePaterno,r.ApeMaterno FROM servicios_responsables sr inner join responsables r on r.idResponsable = sr.idResponsable
						inner join parametro_detalle d on r.id_parametro_det_16=d.Ident_detalle where sr.idServicio = '" . $o->id . "' and d.Nombre = '".$o->Cargo."'";

			    $o->{'cargo'} = $this->db->query($sql2)->result();
			}
		}

		return $servicios;

	}

	function mdlMostrarImgporServicio($id){
		$this->db->select('img');
		$this->db->where('idServicios', $id);
		$servicios = $this->db->get('servicios')->row();
		return $servicios;
	}


}
