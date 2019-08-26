<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Informacion extends CI_Controller {



	public function __construct(){

		parent::__construct();

		$this->load->model('Servicios_model','servicio');

	}



	public function NHistoria(){

		$data['tipo'] = "portal";

		$data['titulo']="Nosotros";

		$data['subtitulo'] ="Somos una iglesia conservadora con una vision misionera y evangelistica.";

		$this->load->view('portal/complementos/header',$data);

		$this->load->view('portal/complementos/menu');

		$this->load->view('portal/informacion/NHistoria');

		$this->load->view('portal/complementos/copyright');

		

	}



	public function cuerpo_ministerial(){

		$data['tipo'] = "portal";

		$data['titulo']="Cuerpo Ministerial";

		$data['subtitulo'] = "El equipo de trabajo que cumple la misión entregada por nuestro Dios.";

		$this->load->view('portal/complementos/header',$data);

		$this->load->view('portal/complementos/menu');

		$this->load->view('portal/informacion/cuerpo_ministerial');

		$this->load->view('portal/complementos/copyright');

	}



	public function escuelas_biblicas(){

		$data['tipo'] = "portal";

		$data['titulo']="Escuelas Bíblicas";

		$data['subtitulo'] = "Hemos establecido las siguientes escuelas con la guianza de Dios, para la edificación de nuestros hermanos en la palabra de Dios.";

		$this->load->view('portal/complementos/header',$data);

		$this->load->view('portal/complementos/menu');

		$this->load->view('portal/informacion/escuelas_biblicas');

		$this->load->view('portal/complementos/copyright');

	}



		public function servicios(){

		$data['servicios'] = $this->servicio->mdlMostrarServicios();

		$data['tipo'] = "portal";

		$data['titulo']="Servicios Locales";

		$data['subtitulo'] = "Cada servicio cumple un papel importante, dentro y fuera de la congregación.";

		$this->load->view('portal/complementos/header',$data);

		$this->load->view('portal/complementos/menu');

		$this->load->view('portal/informacion/servicios');

		$this->load->view('portal/complementos/copyright');

	}



	public function retronarImgPorServicio(){

		$id = $this->input->post('id');



		$data=$this->servicio->mdlMostrarImgporServicio($id);

		echo json_encode($data);



	}



}