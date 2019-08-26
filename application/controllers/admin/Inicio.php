<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
		 parent::__construct();
	}
	public function index()
	{
		$data['titulo']="Inicio";
		$this->load->view('admin/complementos/header',$data);
		$this->load->view('admin/complementos/menu');
		$this->load->view('admin/complementos/top');
		$this->load->view('admin/inicio/index');
		$this->load->view('admin/complementos/footer');
		
	}

}
