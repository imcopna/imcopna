<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	function estadoEvento($id){
		$this->db->select('IDent_001_Estado');
		$this->db->from('eventos');
		$this->db->where('IDent_Evento',$id);
		$query = $this->db->get();

		return $query->result();
	}
	function listarDatosEventoPorID($id){
		$this->db->select('*');
		$this->db->from('eventos');
		$this->db->where('IDent_Evento',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }
	}


	//obtenemos el total de filas para hacer la paginación
 function filas()
 {
	 $consulta = $this->db->get('eventos');
	 return  $consulta->num_rows() ;
 }

 function total_paginados($por_pagina,$segmento)
			 {
					 $consulta = $this->db->get('eventos',$por_pagina,$segmento);
					 if($consulta->num_rows()>0)
					 {
							 foreach($consulta->result() as $fila)
	 {
			 $data[] = $fila;
	 }
									 return $data;
					 }
 }

 function buscar($buscar,$inicio=FALSE,$cantidadregistro=FALSE){
 	$this->db->select('*');
 	$this->db->from('eventos');
 	$this->db->join('parametro_detalle', 'eventos.IDent_004_Categoria = parametro_detalle.IDent_Detalle');

	 $this->db->like("eventos.Titulo",$buscar);
	 $this->db->or_like("eventos.Descripcion",$buscar);
	 if($inicio!==FALSE && $cantidadregistro!==FALSE){
		 $this->db->limit($cantidadregistro,$inicio);
	 }
	 $consulta = $this->db->get();
	 return $consulta->result();
 }

 function  buscarEventosPortal($inicio=FALSE,$cantidadregistro=FALSE){
 	$this->db->select('*,eventos.Descripcion as Desc_evento');
 	$this->db->from('eventos');
 	$this->db->join('parametro_detalle', 'eventos.IDent_004_Categoria = parametro_detalle.IDent_Detalle');
 	$this->db->where('eventos.IDent_002_Estado','1');		
 	$this->db->order_by("eventos.Fecha_Inicial desc, eventos.Fecha desc");


	 if($inicio!==FALSE && $cantidadregistro!==FALSE){
		 $this->db->limit($cantidadregistro,$inicio);
	 }
	 $consulta = $this->db->get();
	 return $consulta->result();
 }



 function updateEventos($id,$evento){
 	if($id!== 0){
 		$this->db->where('IDent_Evento', $id);
		$estado= $this->db->update('eventos', $evento);
 	}else{
		$estado= $this->db->update('eventos', $evento);
 	}

	 return $estado;
 }

 function updateVistos($id){
	$this->db->set('Vistos', 'Vistos + 1', FALSE);
	$this->db->where('IDent_Evento', $id);
	$estado= $this->db->update('eventos');

	 return $estado;
 }

function insertEventos($evento){
	$this->db->insert('eventos',$evento);
	return $this->db->insert_id();

}

function deleteEvento($id){
	$this->db->where('IDent_Evento', $id);
	return $this->db->delete('eventos');
}

function Obtener($id){
		$this->db->where('IDent_Evento', $id);
		$publicacion = $this->db->get('eventos')->row();
		return $publicacion;
}

function listareventoslimit($limit=0,$random=false){

	$this->db->select('*,if(Fecha="0000-00-00",Fecha_Inicial,Fecha) as Fecha');
		$this->db->from('eventos');
		$this->db->where('IDent_002_Estado','1');

		if($limit!=0){
		$this->db->limit($limit);

		}

		if($random){
		$this->db->order_by("rand()");

		}else{
			$this->db->order_by("Fecha desc");

		}

		$query = $this->db->get();
		return $query->result();

}

}