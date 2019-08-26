<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Multimedia extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Multimedia_model','multimedia');
	}


	public function trasmision(){

		$data['tipo'] = "portal";
		$data['titulo']="Trasmisión en vivo";
		$data['subtitulo'] ="No se pierda la bendición, aquí podrá edificarse con la palabra de Dios";
		$data['trasmision'] = $this->multimedia->listarVideosFB();
		$this->load->view('portal/complementos/header',$data);
		$this->load->view('portal/complementos/menu');
		$this->load->view('portal/multimedia/trasmision');
		$this->load->view('portal/complementos/copyright');
	}

}