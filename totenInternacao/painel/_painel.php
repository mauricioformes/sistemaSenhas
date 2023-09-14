<!doctype html>
<html lang="pt-BR">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Gerar Senha Hospital Austa</title>

	<link rel="stylesheet" href="lib/css/login.css" media="all">

	<?php
		#jquery, jquery ui, css, fonts
		require("lib_css.php");
	?>

	<script src="lib/js/jquery-1.10.1.min.js"></script>
	<script src="lib/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="lib/js/jquery-ui-1.9.2.custom.min.js"></script>
</head>
<body onselectstart='return false' ondragstart='return false'  oncontextmenu='return false'>

<br><br><br>

	<div class="top40"></div>
	<div id="login">
		<div class="left">
			<div class="cycle">
				<img src="lib/img/0.png" style='width:475px; height:336px;' alt="">
				<img src="lib/img/1.png" style='width:475px; height:336px;' alt="">
				<img src="lib/img/0.png" style='width:475px; height:336px;' alt="">
				<img src="lib/img/2.png" style='width:475px; height:336px;' alt="">
				<img src="lib/img/0.png" style='width:475px; height:336px;' alt="">
				<img src="lib/img/3.png" style='width:475px; height:336px;' alt="">
			</div>
			<div class="clear"></div>
			<div class="destaque">
				<div class="info">
					<div class="login-info-title">Tenha em mãos</div>
					<div class="login-info-desc">Documento de identidade e cartão do plano.</div>
					<input type="button" value="Saiba mais" class="botao-claro hide">
				</div>

				<div class="info">
					<div class="login-info-title">Gerar Senha Atendimento</div>
					<div class="login-info-desc">Clique no botão para gera sua senha.</div>
					<input type="button" value="Saiba mais" class="botao-claro hide">
				</div>
				<div class="info">
					<div class="login-info-title">Tenha em mãos</div>
					<div class="login-info-desc">Documento de identidade e cartão do plano.</div>
					<input type="button" value="Saiba mais" class="botao-claro hide">
				</div>

				<div class="info">
					<div class="login-info-title">Retirar Senha</div>
					<div class="login-info-desc">Retirar a senha abaixo.</div>
					<input type="button" value="Saiba mais" class="botao-claro hide">
				</div>
				<div class="info">
					<div class="login-info-title">Tenha em mãos</div>
					<div class="login-info-desc">Documento de identidade e cartão do plano.</div>
					<input type="button" value="Saiba mais" class="botao-claro hide">
				</div>
				<div class="info">
					<div class="login-info-title">Atendimento</div>
					<div class="login-info-desc">Esperar o atendimento, será chamado pela TV.</div>
					<input type="button" value="Saiba mais" class="botao-claro hide">
				</div>

			</div>
		</div>

		<input type="hidden" name="fbrowser" id="ibrowser">
		<input type="hidden" name="flocal"   id="ilocal" value=''>
		<input type="hidden" name="ftipoatendimento" id="ftipoatendimento" value=''>

		<div class="right">
			<div id="logo" class="logo3" style='margin-top:0px;margin-bottom:0px;'>
				<img src="lib/img/austa_hospital.png" style='width:360px!important;' alt="Austa">
			</div>
			<div id="tabs" style="margin: 0px 0px 0px 50px;">
				<ul>
					<li></li>
					<!--<li><a href="#tabs-2">AustaClínicas</a></li>!-->
				</ul>
				<br>
				<div id="tabs-1"><span class="text" style='height:80px;font-size:20px!important'>Clique para gerar senha:</span>
					<div>
						<input type="button" value="ATENDIMENTO MÉDICO ADULTO" style='height:84px;width:400px;font-size:18px!important;' id="ientrar_adulto" class="btnEntrar botao">
						<input type="button" value="ATENDIMENTO MÉDICO PEDIÁTRICO" style='background-color:#114C77;height:84px;width:400px;font-size:18px!important;' id="ientrar_ped" class="btnEntrar botao">
						<input type="button" value="OUTROS ATENDIMENTOS" style='background-color:#0D304A;height:84px;width:400px;font-size:18px!important;' id="ientrar_outro" class="btnEntrar botao">

						<input type="button" value="COM RISCO" style='display:none;background-color:#c73e3e;height:84px;width:400px;font-size:18px!important;' id="ientrar_cr" class="btnEntrar botao">
						<input type="button" value="SEM RISCO" style='display:none;background-color:#0D304A;height:84px;width:400px;font-size:18px!important;' id="ientrar_sr" class="btnEntrar botao">
						<input type="button" value="VOLTAR" style='display:none;background-color:#H0H0H0;height:84px;width:400px;font-size:18px!important;' id="ivoltar" class="btnEntrar botao">

						<div id='userinput_login_errado' style='margin:10px;'></div>
					</div>
				</div>
				<!--
				<div id="tabs-2">
					<span style="font-size:12px;">Número do seu cartão do Plano AustaClínias:</span>
					<div id="userinput-plano" style="float: left; width: 200px;">
						<input type="text" name="fcartao" id="icartao" class="input0" maxlength="30" style="width: 180px;" value="Número do seu cartão">
					</div>
					<i class="icon-question-sign" id="ajuda_carteirinha" style="color: #0072C6; float: left; margin-top: 4px; font-size: 24px; margin-left: 5px;"></i>

					<input type="button" value="Entrar" id="ientrar_plano" class="btnEntrar botao">
				</div>
				!-->
			</div><!-- tabs -->
		</div>
		<div class="clear"></div>
	</div>
	<div class="hr">
		<span class="text copyright">© Grupo Austa 2014</span>
	</div>

</div> <!-- painel -->
<div class="clear"></div> <!--necessário por causa do float:right -->
</div> <!-- wrapper -->

<div id="fade"></div>

<script src="lib/js/painel.js"></script>
<script src="lib/js/jquery.mask.min.js"></script>
<script src="lib/js/jquery.browser.min.js"></script>

<script src="lib/js/jquery.cycle.lite.js"></script>

<script>
$(document).ready(function() {
	$( "#tabs" ).tabs({ show: { effect: "fade", duration: 300 } });

	$('.cycle').cycle({
		timeout: 4000,
		speed:   2000,
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});

	$('.destaque').cycle({
		timeout: 4000,
		speed:   2000,
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});

function Bt_Aparece(id){
	$("#ientrar_cr").hide();
	$("#ientrar_sr").hide();
	$("#ivoltar").hide();

	// Aparecer
	if(id == 1){
		$("#ientrar_adulto").show();
		$("#ientrar_ped").show();
		$("#ientrar_outro").show();
	}else{
		$("#ientrar_adulto").hide();
		$("#ientrar_ped").hide();
		$("#ientrar_outro").hide();
	}
}

$("#ientrar_adulto").click(function(){
	Bt_Aparece(2);
	$("#ientrar_cr").show();
	$("#ientrar_sr").show();
	$("#ivoltar").show();
	$('#ftipoatendimento').val(3);
});

$("#ientrar_ped").click(function(){
	Bt_Aparece(2);
	$("#ientrar_cr").show();
	$("#ientrar_sr").show();
	$("#ivoltar").show();
	$('#ftipoatendimento').val(5);
});

$("#ientrar_cr").click(function(){
	f_TimeSnh();

	var tipo_aux = $('#ftipoatendimento').val();

	$.ajax({
		type: "POST",
		url: "http://192.168.10.27/sistema/app/toten/emergencia.php?nTipo="+tipo_aux+"&nRisco=C",
		data: $('#form1').serialize(),

		success: function(txt) {
			f_Imprimir(txt,tipo_aux);
			$('#ftipoatendimento').val('');
		},
		error: function(txt) {
				alert("Computador sem rede, verificar o cabo azul de rede!");
		}
	});
});

$("#ientrar_sr").click(function(){
	f_TimeSnh();

	var tipo_aux = $('#ftipoatendimento').val();

	$.ajax({
		type: "POST",
		url: "http://192.168.10.27/sistema/app/toten/emergencia.php?nTipo="+tipo_aux+"&nRisco=S",
		data: $('#form1').serialize(),

		success: function(txt) {
			f_Imprimir(txt,tipo_aux);
			$('#ftipoatendimento').val('');
		},
		error: function(txt) {
				alert("Computador sem rede, verificar o cabo azul de rede!");
		}
	});
});

$("#ivoltar").click(function(){
	Bt_Aparece(1);
});


$("#ientrar_outro").click(function(){
	$('#ftipoatendimento').val('');

	f_TimeSnh();

	$.ajax({
		type: "POST",
		url: "http://192.168.10.27/sistema/app/toten/emergencia.php?nTipo=8",
		data: $('#form1').serialize(),

		success: function(txt) {
			f_Imprimir(txt,8);
		},
		error: function(txt) {
				//alert('erro'+txt);
				alert("Computador sem rede, verificar o cabo azul de rede!");
		}
	});
});

function f_Imprimir(senha,tipo){
	$.ajax({
		type: "POST",
		url: "painel_imprimir.php?senha="+senha+"&tipo="+tipo,
		data: $('#form1').serialize(),

		success: function(txt) {
			//$("#ientrar").show();
			$('#ftipoatendimento').val('');
		},
		error: function(txt) {
				alert('erro');
		}
	});
}

$("#ientrar_plano").click(function() {
	var cart = $("#icartao").val();
	var browser = $("#ibrowser").val();

	if (cart == "") {
		$('#dialogMsg').html("Preencha o número do cartão.");
		$('#dialog').dialog('open');
	}
	else if (cart == "Número do seu cartão"){
		$('#dialogMsg').html("Preencha o número do cartão.");
		$('#dialog').dialog('open');
	}
	else {
		xajax_cartao(cart,browser);
	}
});


$(".informacoes-login").click(function() {
	$('#dialogMsg').html("<table border=0 cellpadding=2 cellspacing=2><tr><td align=right>Login: </td><td><input type='text' id='esq_login'></td></tr><tr><td align=right>Email: </td><td><input type='text' id='esq_email'></td></tr></table>");
	$('#dialog').dialog('open');
	$('#dialog').dialog( 'option', 'buttons', {   'Recuperar usuário': function() { fRecuperar(); }  } );
});

$("#ajuda_carteirinha").click(function() {
	$('#dialogMsg').html("<img src='lib/img/cartao_usuario.gif'><br><span style='font-size: 12px;'>O número encontra-se no verso do seu cartão magnético.</span>");
	$('#dialog').dialog('open');
	//$('#dialog').dialog( 'option', 'buttons', {   'Recuperar usuário': function() { fRecuperar(); }  } );
});

$(function() {
	$( "#dialog" ).dialog({
		width: 400,
		height: 330,
		autoOpen: false,
		modal: true,
		resizable: false,
		show: {
			effect: "fade",
			duration: 200
		},
		hide: {
			effect: "fade",
			duration: 200
		},
		buttons: {
			"Fechar": function() {
				$( this ).dialog( "close" );
			}
		}
	});

	$( ".alerta" ).click(function() {
		$( "#dialog" ).dialog( "open" );
	});
});


//valida_snh = setTimeout("f_TimeSnh()",1000);
var tempo = 4;
function f_TimeSnh(){
	Bt_Aparece(2);

	$("#userinput_login_errado").show();

	var tempo_aux = tempo--;
	$("#userinput_login_errado").html('<img border=0 src=lib/img/printer.gif> Imprimindo '+tempo+' segundos<br><br><b>Retirar o cupom abaixo</b>');

	if(tempo_aux > 0){
		valida_snh = setTimeout("f_TimeSnh()",1000);
	}else{
		tempo = 4;
		clearTimeout(valida_snh);
		$("#userinput_login_errado").hide();
		Bt_Aparece(1);
	}
}

function fAlterar(){
	var snh1    = $("#snh_atual").val();
	var snh2    = $("#snh_nova").val();
	var snh3    = $("#snh_conf").val();
	var email   = $("#email_atual").val();

	if( (snh1 == "") || (snh2 == "") || (snh3 == "") || (email == "") ){
		$('#dialogMsgValida').html("<font class=textov>Preencha campos do formulário.</font>");
	}else{
		xajax_alterar(snh1,snh2,snh3,email);
	}
}

function fRecuperar(){
	var esq_login    = $("#esq_login").val();
	var esq_email    = $("#esq_email").val();

	if ((esq_login == "") || (esq_email == "")) {
		$('#dialogMsg').html("Preencha o login e o email.");
		$('#dialog').dialog('open');
		$('#dialog').dialog( 'option', 'buttons', {   'Fechar': function() { $(this).dialog('close'); }  } );
	}
	else {
		xajax_recuperar(esq_login,esq_email);
	}
}

$("#ilogin").keydown(function(event){
	if(event.keyCode == 13 && jQuery.support.submitBubbles) {
		var login   = $("#ilogin").val();
		var senha   = $("#isenha").val();
		var browser = $("#ibrowser").val();

		xajax_login(login,senha,browser);
	};
})

/*
$("#isenha").keydown(function(event){
	if(event.keyCode == 13 && jQuery.support.submitBubbles) {
		var login   = $("#ilogin").val();
		var senha   = $("#isenha").val();
		var browser = $("#ibrowser").val();

		xajax_login(login,senha,browser);
	};
})
*/

$("#icartao").keydown(function(event){
	if(event.keyCode == 13 && jQuery.support.submitBubbles) {
		var cart = $("#icartao").val();
		var browser = $("#ibrowser").val();

		if (cart == "") {
			$('#dialogMsg').html("Preencha o número do cartão.");
			$('#dialog').dialog('open');
		}
		else if (cart == "Número do seu cartão"){
			$('#dialogMsg').html("Preencha o número do cartão.");
			$('#dialog').dialog('open');
		}
		else {
			xajax_cartao(cart,browser);
		}
	}
})

function f_Limpa(){
	//$("#ilogin").val('');
	$("#isenha").val('');
	$("#isenha").focus();
}
</script>

<div id="dialog" title="Atenção" class="hide">
	<div id='dialogMsg'></div>
	<div id='dialogMsgValida'></div>
</div>

<div id="debug"></div>

<style>
body{
	cursor:none;
}

.ui-tabs .ui-widget-content {
	border: 0px solid !important;
}

.ui-tabs-nav {
	border-bottom: 1px solid #E0E0E0 !important;

}

.ui-tabs-nav > .ui-state-active a {

}

.ui-tabs-nav > .ui-state-default a {
	border-color: white;
	background: white;
	color: #525252;
	margin-left: 15px;
}

.ui-tabs-nav .ui-state-active a {
	margin-bottom: 2px;
	margin-left: 15px;
	border: 1px solid;
	background: #F8F8F8 !important;
}
</style>
</body>
</html>