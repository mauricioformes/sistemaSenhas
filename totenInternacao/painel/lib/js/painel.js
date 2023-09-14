//menu colapsible
$('li').click(function(ev) {
	$(this).find('>ul').slideToggle(100);
	ev.stopPropagation();
});

//efeito flip - fade no carregamento

var timeOut;

var altura2 = $(document).height();
$("#fade").css("height", altura2);

$(document).ready(function(){
	$("#fade").delay(200).fadeOut(300);

	//efeito flip
	$('.hover').hover(function(){
		var elem = this;
		timeOut = setTimeout(function() {
			$(elem).addClass('flip');
		}, 200)
	},function(){
		clearTimeout(timeOut);
		$(this).removeClass('flip');
	});
});

//fecha banner
$("#fechar").click(function() {
	$(".banner").slideUp(600);
});

//busca cc
$("#submitCC").click(function () {
	var temp;
	temp = $("#ibuscacc").val();
	location.href='../prescricao_online/?MENU_LK=135&MENU_CODAUX=&HASH=0688d4dec1b9f2dda52198ff8b528f3b&cc='+temp;
});

//menu de contexto notificações mural
$("#msg").click(function () {
	$.ajax(
	{
		type: "POST",
		url: "../notificacao.php",
		data: "id=1",

		beforeSend: function() {
		},
		success: function(txt) {
			$('#inotificacao1').html(txt);
		},
		error: function(txt) {
			alert('erro');
		}
	});

	$(".context").fadeToggle(50);
	$(".context2").fadeOut(50);
	$("#overlay").show();

	var altura = $(document).height();

	$("#overlay").css("height", altura);
});

//menu de contexto notificações interação
$(".icon-globe").click(function () {
	$.ajax(
	{
		type: "POST",
		url: "../notificacao.php",
		data: "id=2",

		beforeSend: function() {
		},
		success: function(txt) {
			$('#inotificacao2').html(txt);
		},
		error: function(txt) {
			alert('erro');
		}
	});

	$(".context2").fadeToggle(50);
	$(".context").fadeOut(50);
	$("#overlay").show();

	var altura = $(document).height();

	$("#overlay").css("height", altura);
});

//menu de contexto notificações interação
$("#overlay").click(function () {
	//alert("teste");
	$(".context").fadeOut(50);
	$(".context2").fadeOut(50);
	$("#overlay").hide();
});

//outline campo busca cc
$("#ibuscacc").focusin(function() {
	$("#busca").addClass("focus");
});

$("#ibuscacc").focusout(function() {
	$("#busca").removeClass("focus");
});

//placeholder campo buscacc
$("#ibuscacc").focusin(function () {
	var valor;
	valor = $("#ibuscacc").val();
	if (valor == "Busca Conta Corrente") {
		$("#ibuscacc").val("");
	}
});

$("#ibuscacc").focusout(function () {
	var valor;
	valor = $("#ibuscacc").val();
	if (valor == "") {
		$("#ibuscacc").val("Busca Conta Corrente");
	}
});