<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function logout(){

		if($_SESSION){
			$this->session->sess_destroy();
			$this->index();
		}
	}
	public function index()
	{

		$data =  array('titulo' =>'Iniciar sesion','header_titulo'=>'Administración IMCOPNA','descripcion'=>'Bienvenido a la administracion del portal web de la Iglesia Misionera Casa de Oración para todas las Naciones',"tipo"=>"admin");
		$this->load->view('admin/login/index',$data);
	}

	public function acceder()

	{

		$this->load->model('usuario_model','usu');

		$data=$this->input->post();
		$usuario =$data['usuario'];
		$clave =$data['clave'];
		$estado = $this->usu->validar($usuario,base64_encode($clave));
		

		if($estado){
			$result = $this->usu->estadoUsuario($usuario,base64_encode($clave));
			foreach($result as $r):endforeach;
			if($r->IDent_001_Estado==2 or $r->IDent_001_Estado == 0){
				$datos['mensaje']="Su usuario esta inactivo, porfavor contactarse con el administrador del sistema";
				$datos['estado']=false;
			}elseif($r->IDent_001_Estado==1){
				$usuario_data['usuario']=$usuario;
		    	$usuario_data['login']=true;

				$this->session->set_userdata($usuario_data);
				$datos['estado']=true;
			}
			
		}else{
			$persona = array();
			$persona = $this->usu->listarDatosPersona($usuario);

			if($persona){
				$datos['mensaje']="Contraseña incorrecta, por favor verificar";
				$datos['estado']=false;	
			}else{
				$datos['mensaje']="Este usuario no se encuentra registrado";
				$datos['estado']=false;
			}
		
		}
		echo json_encode($datos);
	}

}
