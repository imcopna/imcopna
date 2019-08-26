<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Eventos extends CI_Controller {



	public function __construct(){

		parent::__construct();

		$this->load->model('Evento_model','eve');

	}



	public function index(){

		$data['tipo'] = "portal";

		$data['titulo']="Eventos";

		$data['subtitulo'] ="En esta sección usted podrá encontrar todos los eventos próximos a llevarse a cabo.";

		$data['eventos'] = $this->eve->listareventoslimit();

		$this->load->view('portal/complementos/header',$data);

		$this->load->view('portal/complementos/menu');

		$this->load->view('portal/eventos/index');

		$this->load->view('portal/complementos/copyright');

		

	}



	public function mostrar(){

    $numeropagina=$this->input->post("nropagina");

    $cantidad=5;

    $inicio =($numeropagina -1)*$cantidad;

    $data = array("eventos"=>$this->eve->buscarEventosPortal($inicio,$cantidad),

    "totalregistros"=>count($this->eve->buscarEventosPortal()),

    "cantidad"=>$cantidad);

    echo json_encode($data);

  }



  public function mostrarDetalle($id){

  	/*

				/* $this->header[] = '<meta property="og:site_name" content="' . $this->conf->Nombre . '"/>';

        $this->header[] = '<meta property="og:image" content="' . base_url('uploads/' . $publicacion->Imagen1) . '"/>';

        $this->header[] = '<meta property="og:url" content="' . $this->currentUrl . '"/>';

        $this->header[] = '<meta property="og:title" content="' . $publicacion->Nombre . '" />';

        $this->header[] = '<meta property="og:description" content="' . $publicacion->Descripcion . '"/>';

        $this->header[] = '<meta property="og:type" content="blog"/>';*/



  	

  		$data['tipo'] = "portal";

  		$data['titulo']="Información del Evento";

		$data['subtitulo'] ="En esta sección usted conocerá más a fondo a cerca del evento que ha elegido";



		$even = $this->eve->listarDatosEventoPorID($id);

		$data['evento']= $even;

		$data['e_rows'] =$this->eve->listareventoslimit(3,true);

	foreach($even as $e):



	
        $this->header[] = '<meta property="og:url" content="' .  base_url("e/$e->IDent_Evento")  . '"/>';

        $this->header[] = '<meta property="og:title" content="' . $e->Titulo . '" />';

        $this->header[] = '<meta property="og:description" content="' . $e->Descripcion . '"/>';

        $this->header[] = '<meta property="og:type" content="website"/>';

        $this->header[] = '<meta property="og:image:url" content="http://www.imcopna.org/file/ANIVERSARIO.jpg"/>';

    endforeach;

	



		$this->eve->updateVistos($id);

		$this->load->view('portal/complementos/header',$data);

		$this->load->view('portal/complementos/menu');

		$this->load->view('portal/eventos/detalle');

		$this->load->view('portal/complementos/copyright');


  }



}