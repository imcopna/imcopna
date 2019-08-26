<?php 

/**
 * muestra el valor de un array en html
 */
function var_debug($array){?>
	<pre><?php print_r($array); ?></pre>
<?php } 

/**
 * arrchivos css
 */
function base_css($tipo,$url){?>

	<link rel="stylesheet" href="<?php echo base_url('assets/'.$tipo.'/css/'.$url) ?>" />

<?php }

/**
 * arrchivos js
 */
function base_js($tipo,$url){?>
	<script type="text/javascript" src="<?php echo base_url('assets/'.$tipo.'/js/'.$url)?>"></script>
<?php } 

/**
 * el parametro url, solo se debe de ingresar el nombre de la imagen
 */
function base_img($tipo,$url,$array=null){?>
	<img src="<?php echo base_url('assets/'.$tipo.'/img/'.$url)?>" alt="<?php echo $url ?>" class="<?php echo (!isset($array)) ? '' : $array['clase']; ?>" style="<?php echo  (!isset($array)) ? "" : $array['estilo']; ?>"/>
<?php } 

function mostrar_fechas_eventos($e){
	$fecha2 = explode('-',$e->Fecha);

	$fech_ini_frac2 = explode('-',$e->Fecha_Inicial);
	$fech_fin_frac2 = explode('-',$e->Fecha_Fin);
	$datofecha2="";

	if($e->Fecha_Inicial=='0000-00-00'  & $e->Fecha_Fin=='0000-00-00'){
			    
			$datofecha2 =  $fecha2[2]."/".$fecha2[1]."/".$fecha2[0];

	}else{
					        
			$datofecha2 = $fech_ini_frac2[2]."/". $fech_ini_frac2[1]."/". $fech_ini_frac2[0] ." - ". $fech_fin_frac2[2]."/". $fech_fin_frac2[1]."/". $fech_fin_frac2[0];
					        }
	return $datofecha2;
}

function today_is($time=false){return date('Y-m-d' . ($time ? ' H:i:s' : '' ));}

function ConvertirUrl($id, $tipo, $str){
	$str = strtolower($str);
	
	$str = str_replace('á', 'a', $str);
	$str = str_replace('é', 'e', $str);
	$str = str_replace('í', 'i', $str);
	$str = str_replace('ó', 'o', $str);
	$str = str_replace('ú', 'u', $str);
	$str = str_replace('ñ', 'n', $str);

	$url = trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $str), '-');
	return $tipo . '/' . $id . '/' . $url;
}

function ConvertirTynimce($string){
	return  
?>
<script languaje='javascript'>tinyMCE.get(<?php echo $string ?>)</script>;

<?php
}
function DateFormat($date, $t)
{
	$_date = explode('/', $date);

	if(count($_date) > 1) $d = new DateTime($_date[2] . '/' . $_date[1] . '/' . $_date[0]);
	else $d = new DateTime($date);
	
	$dia = DayToSpanish($d->Format('w'), true);
	$mes = MonthToSpanish($d->Format('m'), true);
	
	if($t == 1) return $dia . ' ' . $d->format(" d ");
	if($t == 2) return $mes;
	if($t == 3) return $d->format("Y");
	if($t == 4) return $d->format(" d ") . ' de ' . $mes . ' del ' . $d->format('y');
	if($t == 5) return $d->format(" d ") . ' de ' . $mes . ' del ' . $d->format('y') . ', ' . $d->format('h:i:sa');
}
function Months()
{
	return (object)array(
		(object)array(
			'mes'   => 'Enero',
			'valor' => 1
		),
		(object)array(
			'mes'   => 'Febrero',
			'valor' => 2
		),
		(object)array(
			'mes'   => 'Marzo',
			'valor' => 3
		),
		(object)array(
			'mes'   => 'Abril',
			'valor' => 4
		),
		(object)array(
			'mes'   => 'Mayo',
			'valor' => 5
		),
		(object)array(
			'mes'   => 'Junio',
			'valor' => 6
		),
		(object)array(
			'mes'   => 'Julio',
			'valor' => 7
		),
		(object)array(
			'mes'   => 'Agosto',
			'valor' => 8
		),
		(object)array(
			'mes'   => 'Setiembre',
			'valor' => 9
		),
		(object)array(
			'mes'   => 'Octubre',
			'valor' => 10
		),
		(object)array(
			'mes'   => 'Noviembre',
			'valor' => 11
		),
		(object)array(
			'mes'   => 'Diciembre',
			'valor' => 12
		),		
	);
}
function Years($y)
{
	$years = array();
	
	for($i = $y; $i <= date('Y'); $i++)
	{
		$years[] = (object)array(
			'anio' => $i
		);
	}
	
	return (object)$years;
}
function DayToSpanish($x, $short = false )
{
	$dias = array("Domingo","Lunes", "Mártes", "Miercoles", "Jueves", "Viernes", "Sábado");
	
	if(!$short) return $dias[$x];
	else return substr(QuitarTildes($dias[$x]), 0, 3);
}
function MonthToSpanish($x, $short = false ) 
{
	$meses = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$x = (int)$x;
	
	if(!$short) return $meses[$x];
	else return substr($meses[$x], 0, 3);
}
function ToDate($date)
{
	$d = explode('/', $date);
	return $d[2] . '/' . $d[1] . '/' . $d[0];
}

function QuitarTildes($cadena) {
	$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
	$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
	$texto = str_replace($no_permitidas, $permitidas ,$cadena);
	return $texto;
}

