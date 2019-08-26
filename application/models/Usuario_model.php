<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	function validar($username,$password){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('usuario',$username);
		$this->db->where('clave',$password);

		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
		 $estado=true;
		}else{
		 $estado =false;
		}
		return $estado;
	}

	function estadoUsuario($username,$password){
		$this->db->select('IDent_001_Estado');
		$this->db->from('usuario');
		$this->db->where('usuario',$username);
		$this->db->where('clave',$password);

		$query = $this->db->get();

		return $query->result();
	}
	function listarDatosPersonaPorID($id){
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->join('usuario', 'persona.IDent_Persona = usuario.IDent_Persona');
		$this->db->where('usuario.IDent_Persona',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }
	}

	function listarDatosPersona($usuario){
		$this->db->select('*');
		$this->db->from('persona');
		$this->db->join('usuario', 'persona.IDent_Persona = usuario.IDent_Persona');
		$this->db->where('usuario.usuario',$usuario);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->row();
        }
	}
		public function listarIdUsuarioPorNombre($usuario){
		$this->db->select('Id_usuario');
		$this->db->from('usuario');
		$this->db->where('usuario.usuario',$usuario);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->row();
        }
		}

		function TipodeUsuario($id_usuario){
		$this->db->select('parametro_detalle.Nombre');
		$this->db->from('usuario');
		$this->db->join('parametro_detalle', 'usuario.IDent_Tipo = parametro_detalle.IDent_Detalle');
		$this->db->where('usuario.Id_usuario',$id_usuario);
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->row();
        }
	}

	//obtenemos el total de filas para hacer la paginación
 function filas()
 {
	 $consulta = $this->db->get('persona');
	 return  $consulta->num_rows() ;
 }

	 //obtenemos todas las persona a paginar con la función
	 //total_posts_paginados pasando la cantidad por página y el segmento
	 //como parámetros de la misma
 function total_paginados($por_pagina,$segmento)
			 {
					 $consulta = $this->db->get('persona',$por_pagina,$segmento);
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
	 $this->db->like("Nombre",$buscar);
	 $this->db->or_like("Paterno",$buscar);
	 $this->db->or_like("Materno",$buscar);
	 $this->db->or_like("Dni",$buscar);
	 if($inicio!==FALSE && $cantidadregistro!==FALSE){
		 $this->db->limit($cantidadregistro,$inicio);
	 }
	 $consulta = $this->db->get("persona");
	 return $consulta->result();
 }
 function listarParametro($id){
	 $this->db->select('parametro_detalle.*');
	 $this->db->from('parametro');
	 $this->db->join('parametro_detalle', 'parametro.IDent_Parametro = parametro_detalle.IDent_Parametro');
	 $this->db->where('parametro.IDent_Parametro',$id);
	 $query = $this->db->get();
	 if($query->num_rows() > 0 )
				{
						return $query->result();
				}
 }

 function listarCargo(){
	 $this->db->select('*');
	 $this->db->from('tipo_usuario');
	 $query = $this->db->get();
	if($query->num_rows() > 0 )
			 {
					 return $query->result();
			 }
 }


 function updatePersona($id,$persona){
	 $this->db->where('IDent_Persona', $id);
	$estado= $this->db->update('persona', $persona);

	 return $estado;
 }


 function updateUsuario($id,$usuario){

	 $this->db->where('Id_usuario', $id);
	 $estado = $this->db->update('usuario', $usuario);
	 return $estado;
}
function insertPersona($persona){
	$this->db->insert('persona',$persona);
	$insert_id = $this->db->insert_id();
  return  $insert_id;
}

function insertUsuario($usuario){
	return $this->db->insert('usuario',$usuario);

}
function deletePersona($id){
	$this->db->where('IDent_Persona', $id);
	return $this->db->delete('persona');
}

function listarUsuarioPorIdPersona($id){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('IDent_Persona',$id);
		$query = $this->db->get();

		return $query->result();
}

}

/* End of file login.php */
/* Location: ./application/models/login.php */
