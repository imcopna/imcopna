<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function __construct(){
		parent::__construct();
		 $this->load->library("phpmailer_library");
       
	}


	public function index(){
		$data['tipo'] = "portal";
		$data['titulo']="Contacto";
		$data['subtitulo'] ="Estamos para atender todas tus consultas y peticiones de oración.";
		$this->load->view('portal/complementos/header',$data);
		$this->load->view('portal/complementos/menu');
		$this->load->view('portal/contacto/index');
		$this->load->view('portal/complementos/copyright');
	}


	public function enviarcorreo(){
 		
 	

 	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

 		$nombreFrom = $this->input->post('template-contactform-name');
 		$mailFrom =$this->input->post('template-contactform-email');

 		$asunto =$this->input->post('subject');

 		$mensaje = $this->input->post('template-contactform-message');
 		$telefono = $this->input->post('template-contactform-phone');
	
		$mail = $this->phpmailer_library->load();

		//From email address and name
		$mail->From = $mailFrom;
		$mail->FromName = $nombreFrom;

	//To address and name
	$mail->addAddress("contacto@imcopna.org", "Contacto");
	//$mail->addAddress("recepient1@example.com"); //Recipient name is optional

	//Address to which recipient will reply
	//$mail->addReplyTo("reply@yourdomain.com", "Reply");

	//CC and BCC
	//$mail->addBCC("administracion@imcopna.org");

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$body = $mensaje."<br><b>Teléfono:<b> ".$telefono;


	$mail->Subject = $asunto;
	$mail->Body = $body;
	$mail->AltBody = "This is the plain text version of the email content";

	if(!$mail->send()) 
	{
	   echo '{ "alert": "error", "message": "<br><br><strong>Error:</strong><br>' . $mail->ErrorInfo . '" }';
	} 
	else 
	{
	   echo '{ "alert": "success", "message": "Se envio correctamente el correo" }';

	}
} else {
	echo '{ "alert": "error", "message": "Se produho un error inesperado. Por favor intentelo de nuevo más tarde" }';
}
		
}
}