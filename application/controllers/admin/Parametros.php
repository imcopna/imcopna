<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametros extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Parametro_model','par');

	}

	public function index(){
	$data['persona']=$this->usu->listarDatosPersona($this->session->userdata('usuario'));

	//tipos de estados
	$data['tipo_estado']=$this->par->mostrarParametroDetalle(1);
	$data['titulo'] ="Parámetros";
	foreach($this->usu->listarIdUsuarioPorNombre($this->session->userdata('usuario')) as $id)
		$data['tipo_persona'] = $this->usu->TipodeUsuario($id);

    $this->load->view('admin/complementos/header',$data);
    $this->load->view('admin/complementos/menu');
    $this->load->view('admin/complementos/top');
	$this->load->view('admin/parametros/index');
    $this->load->view('admin/complementos/footer');
	}
	 public function mostrar(){
    $buscar = $this->input->post("buscar");
    $numeropagina=$this->input->post("nropagina");
    $cantidad=5;
    $inicio =($numeropagina -1)*$cantidad;
    $data = array("parametro"=>$this->par->buscar($buscar,$inicio,$cantidad),
    "totalregistros"=>count($this->par->buscar($buscar)),
    "cantidad"=>$cantidad);
    echo json_encode($data);
  }

	public function insert(){
		$parametro= array("Nombre"=>$this->input->post('Parametro'),
										"Descripcion"=>$this->input->post('Descripcion'),
										"IDent_001_Estado"=>$this->input->post('Estado'));		

		if($this->par->insertParametro($parametro)){
			$estado = true;
		}else {
			$estado = false;
		}
		
		$json['estado']=$estado;
		echo json_encode($json);

	}

	public function insertdetalle(){
		$parametro= array("Nombre"=>$this->input->post('nombre'),
										"Descripcion"=>$this->input->post('descripcion'),
										"Valor"=>$this->input->post('valor'),
										"IDent_Parametro"=>$this->input->post('id'));		

		if($this->par->insertParametroDetalle($parametro)){
			$estado = true;
		}else {
			$estado = false;
		}
		
		$json['estado']=$estado;
		echo json_encode($json);
	}

	public function mostrardetalle(){
		$data['estado'] =$this->par->mostrarEstadoParametroDetalle($this->input->post('id'));
		$data['detalle'] =$this->par->mostrarParametroDetalle($this->input->post('id'));
		echo json_encode($data);
	}
	public function deletedetalleparametro(){
		if($this->par->deletedetalleparametro($this->input->post('id'))){
			$estado = true;
		}else{
			$estado = false;
		}
		$json['estado']=$estado;
		echo json_encode($json);
	}

	public function deleteparametro(){
		if($this->par->deleteparametro($this->input->post('id'))){
			$estado = true;
		}else{
			$estado = false;
		}
		$json['estado']=$estado;
		echo json_encode($json);
	}

	public function editarParametroDetalle(){
		$data['detalle'] =$this->par->editarParametroDetalle($this->input->post('id'));
		echo json_encode($data);
	}

	public function editarParametro(){
		$data['parametro'] =$this->par->editarParametro($this->input->post('id'));
		echo json_encode($data);
	}

	public function updatedetalle(){
		$detalle =array("Nombre"=>$this->input->post('nombre'),
										"Descripcion"=>$this->input->post('descripcion'),
										"Valor"=>$this->input->post('valor'));
		if($this->par->updatedetalle($this->input->post('id'),$detalle)){
			$estado = true;
		}else{
			$estado = false;
		}
		$json['estado']=$estado;
		echo json_encode($json);
	}
	public function updateparametro(){
			$parametro =array("Nombre"=>$this->input->post('nombre'),
										"Descripcion"=>$this->input->post('descripcion'),
										"IDent_001_Estado"=>$this->input->post('estado'));
		if($this->par->updateparametro($this->input->post('id'),$parametro)){
			$estado = true;
		}else{
			$estado = false;
		}
		$json['estado']=$estado;
		echo json_encode($json);
	}
}