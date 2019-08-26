<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Misiones extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}


	public function anexos(){
		$data['tipo'] = "portal";
		$data['titulo']="Anexos";
		$data['subtitulo'] ="El trabajo a través de los anexos es extendernos a través de la Provincia Constitucional del Callao y Lima Metropolitana. Están presididos por los líderes oficiales de la iglesia central.";
		$this->load->view('portal/complementos/header',$data);
		$this->load->view('portal/complementos/menu');
		$this->load->view('portal/misiones/anexos');
		$this->load->view('portal/complementos/copyright');
	}
	public function obras_afiliadas(){
		$data['tipo'] = "portal";
		$data['titulo']="Obras afiliadas";
		$data['subtitulo'] ="Esperando el tiempo de Dios, se afiliaron obras misioneras para estar bajo la cobertura de la iglesia central y sus pastores principales.";
		$this->load->view('portal/complementos/header',$data);
		$this->load->view('portal/complementos/menu');
		$this->load->view('portal/misiones/obras_afiliadas');
		$this->load->view('portal/complementos/copyright');
	}
	public function grupossalvacion(){
		$data['tipo'] = "portal";
		$data['titulo']="Grupos de Salvación";
		$data['subtitulo'] ="Con el único fin de multiplicar las ovejas y que sigan edificándose cerca a sus hogares, es que nacen los grupos de salvación.";
		$this->load->view('portal/complementos/header',$data);
		$this->load->view('portal/complementos/menu');
		$this->load->view('portal/misiones/grupossalvacion');
		$this->load->view('portal/complementos/copyright');
	}

	public function obras_misioneras(){
		$data['tipo'] = "portal";
		$data['titulo']="Obras Misioneras";
		$data['subtitulo'] ="Dios nos ha demandado dar fruto y cumplir la misión de llevar la palabra hasta lo ultimo de la tierra.";
		$this->load->view('portal/complementos/header',$data);
		$this->load->view('portal/complementos/menu');
		$this->load->view('portal/misiones/obras_misioneras');
		$this->load->view('portal/complementos/copyright');
	}
	
}