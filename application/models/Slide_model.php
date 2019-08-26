<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	/*=============================================
	MOSTRAR SLIDE
	=============================================*/
	function mdlMostrarSlide($tabla){

		$this->db->select('*');
		$this->db->from("$tabla");
		$this->db->order_by('Orden ASC');

		$query = $this->db->get();
		return $query->result();
	}


	/*=============================================
	CREAR SLIDE
	=============================================*/

	function mdlCrearSlide($tabla, $datos, $orden){

		$datos["orden"] = $orden;

		$query = $this->db->insert($tabla, $datos);
		if($query){

			return "ok";

		}else{

			return "error";
		
		}

	}


	/*=============================================
	ACTUALIZAR ORDEN SLIDE
	=============================================*/

	function mdlActualizarOrdenSlide($tabla, $datos){
		
		$this->db->set('orden', $datos["orden"]);
		$this->db->where('id', $datos["id"]);
		$query = $this->db->update($tabla);
		
		if($query){

			return "ok";

		}else{

			return "error";
		
		}
	}

	/*=============================================
	ELIMINAR SLIDE
	=============================================*/

	 function mdlEliminarSlide($tabla, $id){

		$this->db->where('id', $id);
		$query = $this->db->delete($tabla);


		if($query){

			return "ok";
		
		}else{

			return "error";	

		}
		
	}

	/*=============================================
	ACTUALIZAR SLIDE
	=============================================*/

     function mdlActualizarSlide($tabla, $rutaFondo, $rutaProducto, $datos){

     	$datos["imgFondo"] = $rutaFondo;
     	$datos["imgProducto"] =  $rutaProducto;
	
		$this->db->where('id', $datos["id"]);
		$query = $this->db->update($tabla,$datos);

		if($query){

			return "ok";

		}else{

			return "error";
		
		}


	}


}
