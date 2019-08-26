<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {
public $tabla;
	public function __construct(){
		parent::__construct();
		$this->load->model('Slide_model','slide');
		

	}

	public function index(){
		$data['titulo'] ="Slide";
		$data['slide'] = $this->slide->mdlMostrarSlide("slide");
	    $this->load->view('admin/complementos/header',$data);
	    $this->load->view('admin/complementos/menu');
	    $this->load->view('admin/complementos/top');
		$this->load->view('admin/slide/index');
	    $this->load->view('admin/complementos/footer');
	}

	/*=============================================
	CREAR SLIDE
	=============================================*/

	public function ajaxCrearSlide(){
		$tabla = "slide";
		$datos = array( "imgFondo"=>$this->input->post("imgFondo"),
						"tipoSlide"=>$this->input->post("tipoSlide"),
						"estiloTextoSlide"=>$this->input->post("estiloTextoSlide"),
						"titulo1"=>$this->input->post("titulo1"),
						"titulo2"=>$this->input->post("titulo2"),
						"titulo3"=>$this->input->post("titulo3"),
						"boton"=>$this->input->post("boton"),
						"url"=>$this->input->post("url"),
						"orden" =>"");

		$traerSlide = $this->slide->mdlMostrarSlide($tabla);

		foreach ($traerSlide as $key => $value) {
			
		}

		$orden = $value->orden + 1;

		$respuesta = $this->slide->mdlCrearSlide($tabla, $datos, $orden);

		
		echo $respuesta;

	}

	/*=============================================
	ACTUALIZAR ORDEN SLIDE
	=============================================*/

	public function ajaxOrdenSlide(){
		$tabla = "slide";
		$datos = array( "id"=> $this->input->post("idSlide"),
						"orden"=> $this->input->post("orden"));

		$respuesta = $this->slide->mdlActualizarOrdenSlide($tabla, $datos);

		echo $respuesta;

	}

	
	/*=============================================
	ELIMINAR SLIDE
	=============================================*/

	public function ctrEliminarSlide(){

		$idSlide = $this->input->post("idSlide");
		$imgFondo = $this->input->post("imgFondo");
		$imgProducto = $this->input->post("imgProducto");
		

		if(isset($idSlide)){

			if($imgFondo != "assets/portal/img/slide/default/fondo.jpg"){

				unlink($imgFondo);

			}

			if($imgProducto!= ""){

				unlink($imgProducto);

			}

			rmdir(base_url('assets/portal/img/slide/slide'.$idSlide));

			$tabla = "slide";
			$id = $idSlide;

			$respuesta = $this->slide->mdlEliminarSlide($tabla, $id);

			echo $respuesta;		

		}


	}

	/*=============================================
	ACTUALIZAR SLIDE
	=============================================*/

  public function ctrActualizarSlide(){

		$tabla = "slide";
		$ruta1 = null;
		$ruta2 = null;
		$datos = array( "id"=>$this->input->post("id"),
						"nombre"=>$this->input->post("nombre"),
						"tipoSlide"=>$this->input->post("tipoSlide"),
						"estiloImgProducto"=>$this->input->post("estiloImgProducto"),
						"estiloTextoSlide"=>$this->input->post("estiloTextoSlide"),
						"imgFondo"=>$this->input->post("imgFondo"),						
						"imgProducto"=>$this->input->post("imgProducto"),				
						"titulo1"=>$this->input->post("titulo1"),
						"titulo2"=>$this->input->post("titulo2"),
						"titulo3"=>$this->input->post("titulo3"),
						"boton"=>$this->input->post("boton"),
						"url"=>$this->input->post("url"));


	if(isset($_FILES["subirFondo"])){

		$subirFondo = $_FILES["subirFondo"];

	}else{

		$subirFondo= null;

	}

	// CAMBIAR IMAGEN PRODUCTO


	if(isset($_FILES["subirImgProducto"])){

		$subirImgProducto = $_FILES["subirImgProducto"];

	}else{

		$subirImgProducto = null;

	}

		//$subirFondo = $this->input->post("subirFondo");
		//$subirImgProducto = $this->input->post("subirImgProducto");
		/*=============================================
		SI HAY CAMBIO DE FONDO
		=============================================*/	

		if($subirFondo!= null){

		//foreach ($subirFondo as $subir)
			/*=============================================
			BORRAMOS EL ANTIGUO FONDO DEL SLIDE
			=============================================*/	


			if($datos["imgFondo"] != "assets/portal/img/slide/default/fondo.jpg"){	

				unlink($datos["imgFondo"]);

			}

			/*=============================================
			CREAMOS EL DIRECTORIO SI NO EXISTE
			=============================================*/	

			$directorio = "assets/portal/img/slide/slide".$datos["id"];

			if(!file_exists($directorio)){

				mkdir($directorio, 0755);

			}

			/*=============================================
			CAPTURAMOS EL ANCHO Y ALTO DEL FONDO DEL SLIDE
			=============================================*/

			list($ancho, $alto) = getimagesize($subirFondo["tmp_name"]);	

			$nuevoAncho = 1600;
			$nuevoAlto = 520;

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			if($subirFondo["type"] == "image/jpeg"){

				$ruta1 = $directorio."/fondo.jpg";

				$origen = imagecreatefromjpeg($subirFondo["tmp_name"]);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta1);
		
			}

			if($subirFondo["type"] == "image/png"){

				$ruta1 = $directorio."/fondo.png";

				$origen = imagecreatefrompng($subirFondo["tmp_name"]);

				imagealphablending($destino, FALSE);
    			
    			imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $ruta1);
		
			}


			$rutaFondo = $ruta1;

		}else{

			$rutaFondo = $datos["imgFondo"];

		}

		/*=============================================
		SI HAY CAMBIO DE PRODUCTO
		=============================================*/		

		if($subirImgProducto!= null){

			/*=============================================
			CREAMOS EL DIRECTORIO SI NO EXISTE
			=============================================*/		

			$directorio = "assets/portal/img/slide/slide".$datos["id"];

			if(!file_exists($directorio)){

				mkdir($directorio, 0755);

			}

			/*=============================================
			CAPTURAMOS EL ANCHO Y ALTO DE LA IMAGEN DEL PRODUCTO
			=============================================*/		

			list($ancho, $alto) = getimagesize($subirImgProducto["tmp_name"]);

			$nuevoAncho = 600;
			$nuevoAlto = 600;

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			if($subirImgProducto["type"] == "image/jpeg"){

				$ruta2 = $directorio."/producto.jpg";

				$origen = imagecreatefromjpeg($subirImgProducto["tmp_name"]);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta2);
		
			}

			if($subirImgProducto["type"] == "image/png"){

				$ruta2 = $directorio."/producto.png";

				$origen = imagecreatefrompng($subirImgProducto["tmp_name"]);

				imagealphablending($destino, FALSE);
    			
    			imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $ruta2);
		
			}

			$rutaProducto = $ruta2;

		}else{

			$rutaProducto = $datos["imgProducto"];

		}

		$respuesta = $this->slide->mdlActualizarSlide($tabla, $rutaFondo, $rutaProducto, $datos);

		echo $respuesta;

	}



}