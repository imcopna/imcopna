<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Parametro_model','par');

	}

  public function index(){
    $data['persona']=$this->usu->listarDatosPersona($this->session->userdata('usuario'));
    //tipos de estados
	$data['tipo_estado']=$this->par->mostrarParametroDetalle(1);
	//tipos de usuarios
	$data['tipo_usuarios']=$this->par->mostrarParametroDetalle(14);

	$data['titulo'] ="Usuarios";
	
	foreach($this->usu->listarIdUsuarioPorNombre($this->session->userdata('usuario')) as $id)
		$data['tipo_persona'] = $this->usu->TipodeUsuario($id);
    $this->load->view('admin/complementos/header',$data);
    $this->load->view('admin/complementos/menu');
    $this->load->view('admin/complementos/top');
	$this->load->view('admin/usuario/index');
    $this->load->view('admin/complementos/footer');
  }
  public function mostrar(){
    $buscar = $this->input->post("buscar");
    $numeropagina=$this->input->post("nropagina");
    $cantidad=5;
    $inicio =($numeropagina -1)*$cantidad;
    $data = array("personas"=>$this->usu->buscar($buscar,$inicio,$cantidad),
    "totalregistros"=>count($this->usu->buscar($buscar)),
    "cantidad"=>$cantidad);
    echo json_encode($data);
  }

  public function listarInformacionPersona(){
    $id = $this->input->post('id');
    $info['personas']=$this->usu->listarDatosPersonaPorID($id);
    $info['parametro']=$this->usu->listarParametro(1);
		$info['cargo']=$this->usu->listarCargo();
    echo json_encode($info);
  }

	public function update(){
		//id de persona y usuario respectivamente
		$id = $this->input->post('id');
		$idusuario=$this->input->post('idusuario');

		//datos a modificar de personay usuario
		$persona= array("Dni"=>$this->input->post('Dni'),
										"Nombre"=>$this->input->post('Nombre'),
										"Paterno"=>$this->input->post('Paterno'),
										"Materno"=>$this->input->post('Materno'),
										"Direccion"=>$this->input->post('Direccion'),
										"Celular"=>$this->input->post('Celular'),
										"Correo"=>$this->input->post('Correo'));

	  $usuario =array("IDent_001_Estado"=> $this->input->post('Estado'),
									"IDent_Tipo"=>$this->input->post('Cargo'));

		//funciones de actualizacion de cada uno
		$estado=$this->usu->updatePersona($id,$persona);
		$flag = $this->usu->updateUsuario($idusuario,$usuario);

		if($estado){
			if($flag){
				$valor=true;
			}else{
				$valor=false;
			}

		}else{
			$valor = false;
		}

		$json['estado']=$estado;
		echo json_encode($json);
	}

	public function insert(){
		$persona= array("Dni"=>$this->input->post('Dni'),
										"Nombre"=>$this->input->post('Nombre'),
										"Paterno"=>$this->input->post('Paterno'),
										"Materno"=>$this->input->post('Materno'),
										"Direccion"=>$this->input->post('Direccion'),
										"Celular"=>$this->input->post('Celular'),
										"Correo"=>$this->input->post('Correo'));

//retorna el id de la persona insertada
		$id =$this->usu->insertPersona($persona);

//datos para el usuario
		$clave =strtolower(substr($this->input->post('Nombre'),0,2)."".substr($this->input->post('Paterno'),0,2)."".substr($this->input->post('Materno'),0,2));
		$usuario =array("usuario"=>$this->input->post('Dni'),
										"clave"=>base64_encode($clave),
										"IDent_Persona"=>$id);

		if($this->usu->insertUsuario($usuario)){
			$estado = true;
		}else {
			$estado = false;
		}
		
		$json['estado']=$estado;
		echo json_encode($json);

	}

	public function delete(){
		if($this->usu->deletePersona($this->input->post('id'))){
			$estado = true;
		}else{
			$estado = false;
		}
		$json['estado']=$estado;
		echo json_encode($json);
	}

	public function listarUsuarioPorIdPersona($id){
		 $data=$this->usu->listarUsuarioPorIdPersona($id);
		 foreach ($data as $value) {
		 	$datos['usuario'] = array("id"=>$value->Id_usuario,"usuario"=>$value->usuario,"pass"=>base64_decode($value->clave),"tipo"=>$value->IDent_Tipo,"estado"=>$value->IDent_001_Estado);
		 }
		 echo json_encode($datos);

	}

	public function updateUsuario(){

		$usuario = array("usuario"=>$this->input->post('usuario'),"clave"=>base64_encode($this->input->post('password')),"IDent_Tipo"=>$this->input->post('tipo'),"IDent_001_Estado"=>$this->input->post('estado'));

		$estado=$this->usu->updateUsuario($this->input->post('id'),$usuario);

		if($estado){
			$data['mensaje']="Se actualizaron los datos satisfactoriamente";
			$data['estado']= true;
		}else{
			$data['mensaje']="No se actualizaron los datos";
			$data['estado']=false;

		}	
		 echo json_encode($data);
	}

}
