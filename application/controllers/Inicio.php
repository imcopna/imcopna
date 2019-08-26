<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Inicio extends CI_Controller {



	public function __construct(){

		parent::__construct();

		$this->load->model('Slide_model','slide');

		$this->load->model('Servicios_model','servicios');

		$this->load->model('Evento_model','eve');

	}



	public function index()

	{





        $this->header[] = '<meta property="og:url" content="http://www.imcopna.org"/>';

        $this->header[] = '<meta property="og:type" content="website"/>';

        $this->header[] = '<meta property="og:title" content="Iglesia Misionera Casa de Oración para todas las Naciones" />';

        $this->header[] = '<meta property="og:description" content="La iglesia casa de oracion para todas las naciones les da la bienvenida y les invita a compartir su pagina web"/>';

        $this->header[] = '<meta property="og:image" content="'.base_url("assets/portal/img/iglesia.jpg").'"/>';



		$data['tipo'] = "portal";

		//muestra los slides

		$data['slide'] =$this->slide->mdlMostrarSlide("slide");



		//muestra los servicios con sus responsables

		$data['servicios'] = $this->servicios->mdlMostrarServicios();



		//muestra los eventos en la pagina principal

		$data['evento'] =$this->eve->listareventoslimit(5);

		

		$this->load->view('portal/complementos/header',$data);

		$this->load->view('portal/complementos/menu');

		$this->load->view('portal/complementos/slide');

		$this->load->view('portal/inicio');

		$this->load->view('portal/complementos/footer');

		$this->load->view('portal/complementos/copyright');

	}

}

