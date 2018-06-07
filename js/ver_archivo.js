function salir(){

	window.location=url_ver_archivo+idArchivo;
}



function reporteExito(){
	window.onload($("#fin").modal());


}

function puntuar(punto){
 	$("#aux").val(punto);
 	document.getElementById("form").submit();
}



$('.star-rating').click(function(){
	if ($('.open-rating').css('display') == 'none' ) {
		$('.open-rating').attr('style','display: inline-block');
	}else{

		$('.open-rating').attr('style','display: none');
	}
});


$('#uno').hover(function() {
	$('#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#uno').attr('src',url_base+'img/vacia.png');
});

$('#dos').hover(function() {
	$('#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#tres').hover(function() {
	$('#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#cuatro').hover(function() {
	$('#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#cinco').hover(function() {
	$('#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#seis').hover(function() {
	$('#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#siete').hover(function() {
	$('#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#ocho').hover(function() {
	$('#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#nueve').hover(function() {
	$('#nueve,#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#nueve,#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#diez').hover(function() {
	$('#diez,#nueve,#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#diez,#nueve,#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});
