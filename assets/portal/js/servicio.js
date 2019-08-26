
$(document).ready(function(){
	$('.tab-nav li a:first').click();


});

$('.tab-nav li a').on('click',function(){

	var valor = $(this).attr('data-id');
	var url = base_url("informacion/retronarImgPorServicio");
	var dato = new FormData();
	dato.append('id',valor);

	$.ajax({
		url: url,
		method:"POST",
		dataType:'json',
		data:dato,
		cache: false,
		contentType: false,
		processData: false,
		success:function(resp){
			$('.tab-content .imagen a').attr('href',base(resp.img));
			$('.tab-content .imagen img').attr('src',base(resp.img));
		}

	});
	
});

