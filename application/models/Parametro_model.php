<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametro_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	//obtenemos el total de filas para hacer la paginación
 function filas()
 {
	 $consulta = $this->db->get('parametro');
	 return  $consulta->num_rows() ;
 }

	 //obtenemos todas las persona a paginar con la función
	 //total_posts_paginados pasando la cantidad por página y el segmento
	 //como parámetros de la misma
 function total_paginados($por_pagina,$segmento)
			 {
					 $consulta = $this->db->get('parametro',$por_pagina,$segmento);
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
	 $this->db->like("parametro.Nombre",$buscar);
	 $this->db->or_like("parametro.Descripcion",$buscar);
	 $this->db->or_like("parametro_detalle.Nombre",$buscar);

	 if($inicio!==FALSE && $cantidadregistro!==FALSE){
		 $this->db->limit($cantidadregistro,$inicio);
	 }

	 $this->db->select('parametro.IDent_Parametro,parametro.Nombre,parametro.Descripcion,parametro_detalle.Nombre as estado');
	 $this->db->from('parametro');
	 $this->db->join('parametro_detalle', 'parametro_detalle.IDent_Detalle=parametro.IDent_001_Estado');

	 $consulta = $this->db->get();
	 return $consulta->result();
 }

 function insertParametro($parametro){
	return $this->db->insert('parametro',$parametro);
 } 
 function insertParametroDetalle($parametro){
 	return $this->db->insert('parametro_detalle',$parametro);
 }

 function mostrarParametroDetalle($id){
	$this->db->select('*');
		$this->db->from('parametro_detalle');
		$this->db->where('IDent_Parametro',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }
 }

  function mostrarEstadoParametroDetalle($id){
	$this->db->select('*');
		$this->db->from('parametro_detalle');
		$this->db->where('IDent_Parametro',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $estado=true;
        }else{
        	return $estado=false;
        }
 }
 function deletedetalleparametro($id){
	$this->db->where('IDent_Detalle', $id);
	return $this->db->delete('parametro_detalle');
 }
 function deleteparametro($id){
 	$this->db->where('IDent_Parametro', $id);
	return $this->db->delete('parametro');
 }

 function editarParametroDetalle($id){
		$this->db->select('*');
		$this->db->from('parametro_detalle');
		$this->db->where('IDent_Detalle',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }
 }
 function editarParametro($id){
		$this->db->select('*');
		$this->db->from('parametro');
		$this->db->where('IDent_Parametro',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }
 }
 function updatedetalle($id,$detalle){
	 $this->db->where('IDent_Detalle', $id);
	 $estado = $this->db->update('parametro_detalle', $detalle);
	 return $estado;
 }
  function updateparametro($id,$parametro){
	 $this->db->where('IDent_Parametro', $id);
	 $estado = $this->db->update('parametro', $parametro);
	 return $estado;
 }


}