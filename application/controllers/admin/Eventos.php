<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->model('Evento_model','eve');
    $this->load->model('Parametro_model','par');
	}

  public function index(){
    $data['tipo']="admin";
    $data['titulo'] = "Eventos";
    $this->load->view('admin/complementos/header',$data);
    $this->load->view('admin/complementos/menu');
    $this->load->view('admin/complementos/top');
	  $this->load->view('admin/eventos/index');
    $this->load->view('admin/complementos/footer');

  }
  public function mostrar(){
    $buscar = $this->input->post("buscar");
    $numeropagina=$this->input->post("nropagina");
    $cantidad=5;
    $inicio =($numeropagina -1)*$cantidad;
    $data = array("eventos"=>$this->eve->buscar($buscar,$inicio,$cantidad),
    "totalregistros"=>count($this->eve->buscar($buscar)),
    "cantidad"=>$cantidad);
    echo json_encode($data);
  }

  public function crud($id = 0){
  	$data['persona']=$this->usu->listarDatosPersona($this->session->userdata('usuario'));
    $valor = $id > 0 ? $this->eve->Obtener($id) : null;
      foreach($this->usu->listarIdUsuarioPorNombre($this->session->userdata('usuario')) as $id)
    $data['tipo_persona'] = $this->usu->TipodeUsuario($id);

    $valor==null ? $titulo_crud ="Registrar Eventos" :$titulo_crud="Actualizar Eventos";
    $data['titulo']=$titulo_crud;

    $this->load->view('admin/complementos/header',$data);
    $this->load->view('admin/complementos/menu');
    $this->load->view('admin/complementos/top');
	  $this->load->view('admin/eventos/registro',array('model'=> $valor,
                                                      'categoria'=>$this->par->mostrarParametroDetalle(15)));
    $this->load->view('admin/complementos/footer');
  }

  public function grabar($id=0){
    $data = array("Titulo"=>$this->input->post('titulo'),
                  "Descripcion" =>$this->input->post('descripcion'),
                  "Contenido" =>$this->input->post('contenido'),
                  "Usuario_creacion"=>$this->user,
                  "Fecha_creacion" =>today_is(),
                  "Usuario_modificacion"=>$this->user,
                  "Fecha_modificacion"=>today_is(),
                  "IDent_004_Categoria"=>$this->input->post('categoria'));

    if($id>0){
        if($this->eve->updateEventos($id,$data)){
          $estado = true;
          $p['estado']=$estado;
        }
        echo json_encode($p);

    }else{
       $id = $this->eve->insertEventos($data);
       $this->eve->updateEventos(0,array("Principal"=>0));
       $estado = $this->eve->updateEventos($id,array('url' => ConvertirUrl($id, 'eventos', $this->input->post('titulo')),'Principal'=>"1"));
    if($estado){
        $p['href'] = 'eventos/crud/' .$id;
        $p['estado']=false;
        echo json_encode($p);

    }else{
      $p['alert']="No se guardo el evento";
      $p['estado']=false;
      echo json_encode($p);
    }
    }
   
 
  }
  public function update_estado(){
    $data['estado'] = $this->eve->updateEventos($this->input->post('id'),array("IDent_002_Estado"=>$this->input->post('estado')));
    echo json_encode($data);
  }

  public function update_principal(){
    $this->eve->updateEventos(0,array("Principal"=>0));
    $data['estado'] = $this->eve->updateEventos($this->input->post('id'),array("Principal"=>$this->input->post('destacado')));
    echo json_encode($data);
  }

  public function grabarimagenEvento(){
    $config["upload_path"]="./file";
    $config["allowed_types"]="png|jpg|jpeg";

    $this->load->library("upload",$config);
    $imagen = $this->input->post('imagen_hidden');
    

      if($this->upload->do_upload('files')){
        if($imagen!=""){
                unlink("./file/".$imagen);

        }
        $data = array("upload_data"=>$this->upload->data());
            $evento = array("Imagen"=>$data["upload_data"]["file_name"]);
            $d['estado'] = $this->eve->updateEventos($this->input->post('hidden_id'),$evento);
            $d['mensaje'] = "Se inserto correctamente esta imagen para este evento.";
            if($d['estado']){
              $d['img'] = $data["upload_data"]["file_name"];
              echo json_encode($d);
            }

      }else{
        $d['mensaje'] ="Debe ingresar una imagen válida con formatos (jpg, png)";
        echo json_encode($d);
      }
    

  }
  public function grabarvideo(){
    $video = $this->input->post('video');

    $evento = array("url_video"=>$video);
    if($this->eve->updateEventos($this->input->post('id'),$evento)){
          $d['estado'] = $this->eve->updateEventos($this->input->post('id'),$evento);
          $d['mensaje'] ="Se insertó correctamente el video de youtube";
          $d['respuesta'] = ObtenerCodigoYoutube($video);
    }else{
       $d['mensaje'] ="Por algún motivo no se pudo realizar la insercción";
    }
 echo json_encode($d);

  }
  public function eliminarImagen(){
    $imagen = $this->input->post('imagen');
    $evento = array("Imagen" => "");
    if($this->eve->updateEventos($this->input->post('id'),$evento)){
       unlink("./file/".$imagen);
       $d['estado'] = $this->eve->updateEventos($this->input->post('id'),$evento);
       $d['mensaje'] ="Se eliminó correctamente la imagen";
    }else{
       $d['mensaje'] ="Por algún motivo no se pudo eliminar la imagen";

    }
     echo json_encode($d);

  }
  public function eliminarVideo(){
     $evento = array("url_video" => "");
    if($this->eve->updateEventos($this->input->post('id'),$evento)){
       $d['estado'] = $this->eve->updateEventos($this->input->post('id'),$evento);
       $d['mensaje'] ="Se eliminó correctamente este video";
    }else{
       $d['mensaje'] ="Por algún motivo no se pudo eliminar este video";

    }
     echo json_encode($d);
 
  }

  public function update_fecha(){

    $evento = array("Fecha" => ($this->input->post('fecha')=="")?'0000-00-00':$this->input->post('fecha'),
                    "Hora_Inicio"=>$this->input->post('horainicial'),
                    "Hora_Final" =>$this->input->post('horafinal'),
                    "Fecha_Inicial"=>($this->input->post('fechaini')=="")?'0000-00-00':$this->input->post('fechaini'),
                    "Fecha_Fin"=>($this->input->post('fechafin')=="")?'0000-00-00':$this->input->post('fechafin'));


 $row = $this->eve->Obtener($this->input->post('id'));

if($row->Estado_Fecha==0){
  $evento = array("Fecha" =>"0000-00-00",
                    "Hora_Inicio"=>"",
                    "Hora_Final" =>"",
                    "Fecha_Inicial"=>($this->input->post('fechaini')=="")?'0000-00-00':$this->input->post('fechaini'),
                    "Fecha_Fin"=>($this->input->post('fechafin')=="")?'0000-00-00':$this->input->post('fechafin'));
}else{
   $evento = array("Fecha" =>($this->input->post('fecha')=="")?'0000-00-00':$this->input->post('fecha'),
                    "Hora_Inicio"=>$this->input->post('horainicial'),
                    "Hora_Final" =>$this->input->post('horafinal'),
                    "Fecha_Inicial"=>"0000-00-00",
                    "Fecha_Fin"=>"0000-00-00");
}

  $this->eve->updateEventos($this->input->post('id'),$evento);
  $d['Estado_Fecha'] =$row->Estado_Fecha;

  echo json_encode($d);

  }
  public function estado_fecha(){
    $evento = array("Estado_Fecha" => $this->input->post('estado'));

    $this->eve->updateEventos($this->input->post('id'),$evento);

  }
}