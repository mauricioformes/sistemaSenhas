<!doctype html>
<html lang="pt-BR" onselectstart='return false' ondragstart='return false' oncontextmenu='return false'>

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

<body>

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
		<input type="hidden" name="flocal" id="ilocal" value=''>
		<input type="hidden" name="ftipoatendimento" id="ftipoatendimento" value=''>
		<input type="hidden" name="fpossoajudar" id="fpossoajudar" value='A'>

		<div class="right">
			<div id="tabs" style="margin: -5px 0px 0px 50px;">
				<input id='i_visita_quarto' type="button" value="VISITA QUARTO" style='background-color:#00A0C6;height:80px;width:400px;font-size:18px!important;' class="btnEntrar botao">
				<input id='i_visita_uti' type="button" value="VISITA UTI" style='background-color:#00A0C6;height:80px;width:400px;font-size:18px!important;' class="btnEntrar botao">
				<input id='i_internacao' type="button" value="INTERNAÇÃO" style='background-color:#114C77;height:80px;width:400px;font-size:18px!important;' class="btnEntrar botao">
				<input id='i_internacao_prev' type="button" value="INTERNAÇÃO PRÉVIA" style='background-color:#114C77;height:80px;width:400px;font-size:18px!important;' class="btnEntrar botao">			
				<input id='i_autorizacao' type="button" value="AUTORIZAÇÃO" style='background-color:#5A5659;height:80px;width:400px;font-size:18px!important;' class="btnEntrar botao">
				<input id='i_proc_amb' type="button" value="PROCEDIMENTOS AMBULATÓRIOS" style='background-color:#5A5659;height:80px;width:400px;font-size:18px!important;' class="btnEntrar botao">
				<input id='i_inf' type="button" value="INFORMAÇÕES" style='background-color:#E28900;height:80px;width:400px;font-size:18px!important;' class="btnEntrar botao">
				<div id='userinput_login_errado' style='margin:10px;'></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="hr">
		<span class="text copyright">Grupo Austa 2022</span>
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
			$("#tabs").tabs({
				show: {
					effect: "fade",
					duration: 300
				}
			});

			$('.cycle').cycle({
				timeout: 4000,
				speed: 2000,
				fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
			});

			$('.destaque').cycle({
				timeout: 4000,
				speed: 2000,
				fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
			});
		});

		$("#i_visita_quarto").click(function() {
			f_TimeSnh();

			$.ajax({
				type: "POST",
				url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=Q",
				data: $('#form1').serialize(),

				success: function(txt) {
					f_Imprimir(txt, 3);
				},
				error: function(txt) {
					alert("Computador sem rede, verificar o cabo azul de rede!");
				}
			});
		});

		$("#i_visita_uti").click(function() {
			f_TimeSnh();

			$.ajax({
				type: "POST",
				url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=B",
				data: $('#form1').serialize(),

				success: function(txt) {
					f_Imprimir(txt, 4);
				},
				error: function(txt) {
					alert("Computador sem rede, verificar o cabo azul de rede!");
				}
			});
		});

		$("#i_internacao").click(function() {
			f_TimeSnh();

			$.ajax({
				type: "POST",
				url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=I",
				data: $('#form1').serialize(),

				success: function(txt) {
					f_Imprimir(txt, 5);
				},
				error: function(txt) {
					alert("Computador sem rede, verificar o cabo azul de rede!");
				}
			});
		});

		$("#i_internacao_prev").click(function() {
			f_TimeSnh();

			$.ajax({
				type: "POST",
				url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=C",
				data: $('#form1').serialize(),

				success: function(txt) {
					f_Imprimir(txt, 7);
				},
				error: function(txt) {
					alert("Computador sem rede, verificar o cabo azul de rede!");
				}
			});
		});

		$("#i_autorizacao").click(function() {
			f_TimeSnh();

			$.ajax({
				type: "POST",
				url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=A",
				data: $('#form1').serialize(),

				success: function(txt) {
					f_Imprimir(txt, 8);
				},
				error: function(txt) {
					alert("Computador sem rede, verificar o cabo azul de rede!");
				}
			});
		});

		$("#i_proc_amb").click(function() {
			f_TimeSnh();

			$.ajax({
				type: "POST",
				url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=P",
				data: $('#form1').serialize(),

				success: function(txt) {
					f_Imprimir(txt, 2);
				},
				error: function(txt) {
					alert("Computador sem rede, verificar o cabo azul de rede!");
				}
			});
		});

		$("#i_inf").click(function() {
			f_TimeSnh();

			$.ajax({
				type: "POST",
				url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=S",
				data: $('#form1').serialize(),

				success: function(txt) {
					f_Imprimir(txt, 6);
				},
				error: function(txt) {
					alert("Computador sem rede, verificar o cabo azul de rede!");
				}
			});
		});
		// $("#i_end").click(function(){
		// 	f_TimeSnh();

		// 	$.ajax({
		// 		type: "POST",
		// 		url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=E",
		// 		data: $('#form1').serialize(),

		// 		success: function(txt) {
		// 			f_Imprimir(txt,8);
		// 		},
		// 		error: function(txt) {
		// 			alert("Computador sem rede, verificar o cabo azul de rede!");
		// 		}
		// 	});
		// });
		// $("#i_raiox").click(function(){
		// 	f_TimeSnh();

		// 	$.ajax({
		// 		type: "POST",
		// 		url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=R",
		// 		data: $('#form1').serialize(),

		// 		success: function(txt) {
		// 			f_Imprimir(txt,8);
		// 		},
		// 		error: function(txt) {
		// 			alert("Computador sem rede, verificar o cabo azul de rede!");
		// 		}
		// 	});
		// });
		// $("#i_tomogra").click(function(){
		// 	f_TimeSnh();

		// 	$.ajax({
		// 		type: "POST",
		// 		url: "http://192.168.10.27/sistema/app/toten/internacao.php?nRisco=T",
		// 		data: $('#form1').serialize(),

		// 		success: function(txt) {
		// 			f_Imprimir(txt,8);
		// 		},
		// 		error: function(txt) {
		// 			alert("Computador sem rede, verificar o cabo azul de rede!");
		// 		}
		// 	});
		// });

		function f_Imprimir(senha, tipo) {
			
			$.ajax({
				type: "POST",
				url: "painel_imprimir.php?senha="+senha+"&tipo="+tipo,
				data: $('#form1').serialize(),

				success: function(txt) {
					//$("#ientrar").show();
				},
				error: function(txt) {
						alert('erro');
				}
			});
			
		}

		function Bt_Aparece(id) {
			if (id == 2) {
				$('#i_lab').hide();
				$('#i_lab_pref').hide();
				$('#i_end').hide();
				$('#i_raiox').hide();
				$('#i_tomogra').hide();
			} else {
				$('#i_lab').show();
				$('#i_lab_pref').show();
				$('#i_end').show();
				$('#i_raiox').show();
				$('#i_tomogra').show();
			}
		}

		//valida_snh = setTimeout("f_TimeSnh()",1000);
		var tempo = 4;

		function f_TimeSnh() {
			Bt_Aparece(2);

			$("#userinput_login_errado").show();

			var tempo_aux = tempo--;
			$("#userinput_login_errado").html('<img border=0 src=lib/img/printer.gif>Imprimindo ' + tempo + ' segundos<br><br><b>Retirar o cupom abaixo</b>');

			if (tempo_aux > 0) {
				valida_snh = setTimeout("f_TimeSnh()", 1000);
			} else {
				tempo = 4;
				clearTimeout(valida_snh);
				$("#userinput_login_errado").hide();
				Bt_Aparece(1);
			}
		}

		function disableSelection(target) {
			if (typeof target.onselectstart != "undefined") //IE route
				target.onselectstart = function() {
					return false
				}
			else if (typeof target.style.MozUserSelect != "undefined") //Firefox route
				target.style.MozUserSelect = "none"
			else //All other route (ie: Opera)
				target.onmousedown = function() {
					return false
				}
		}
		disableSelection(document);
	</script>

	<div id="dialog" title="Atenção" class="hide">
		<div id='dialogMsg'></div>
		<div id='dialogMsgValida'></div>
	</div>

	<div id="debug"></div>

	<style>
		* {
			/* cursor: none !important; */
		}

		.ui-tabs .ui-widget-content {
			border: 0px solid !important;
		}

		.ui-tabs-nav {
			border-bottom: 1px solid #E0E0E0 !important;

		}

		.ui-tabs-nav>.ui-state-active a {}

		.ui-tabs-nav>.ui-state-default a {
			border-color: white;
			background: white;
			color: #525252;
			/* margin-left: 15px; */
		}

		.ui-tabs-nav .ui-state-active a {
			margin-bottom: 2px;
			/* margin-left: 15px; */
			border: 1px solid;
			background: #F8F8F8 !important;
		}
	</style>
</body>

</html>