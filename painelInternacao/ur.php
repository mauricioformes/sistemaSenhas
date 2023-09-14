<?php
	$local = "2";
	$_GET['local'] = "2";
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Painel Emergência</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/index.css">
		<audio src="sound/notify.wav" id='isom' preload="auto"></audio>
	</head>
	<body onload="startTime()">
	<div class="container-fluid">

		<!-- BEGIN TOP BAR -->
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading bg-azul top-page selector-bg">
					<div class="col-md-4">
						<img src="img/austa_thumb-h.png" alt="austa-logo" class="img-responsive logo">
					</div>
					<div class="col-md-4">
						<!-- <h1 class="text-center title-bem-vindo selector-font"><b>Seja Bem Vindo!</b></h1> -->
					</div>
					<div class="col-md-4">
						<h2 class="pull-right title-bem-vindo"><i class="glyphicon glyphicon-time selector-titulos"></i> <span id="relogio" class="selector-titulos"></span></h2>
					</div>
				</div>
			</div>
		</div>
		<!-- END TOP BAR -->
		<br><br>

		<!-- BEGIN SENHA DIV -->
		<div class="container-senha">
			<div class="col-md-12 col-marged">
				<div class="panel panel-primary bordered">
					<div class="panel-heading bg-azul panel-section-nome bordered selector-bg">
						<h3 class="panel-title text-center title-campos selector-titulos" id="titulo-nome">Senha:</h3>
						<br><br>
						<h1 class="text-center title-campos campo-nome fonte-amarelo selector-font"><b id="valor-nome"></b></h1>
					</div>
				</div>
			</div>


			<div class="col-md-12 col-marged">
				<div class="panel panel-primary bordered">
					<div class="panel-heading bg-azul panel-section-local bordered selector-bg">
						<h3 class="panel-title text-center title-campos selector-titulos">Local:</h3>
						<br><br><br>
						<h3 class="panel-title text-center title-campos campo-local fonte-amarelo selector-font"><b id="valor-local"></b></h3>
					</div>
				</div>
			</div>


			<div class="col-md-12 col-marged">
				<div class="panel panel-default bordered">
					<div class="panel-heading panel-section-historico bordered">
						<h3 class="panel-title text-center historico-font">Histórico:</h3>
						<br><br><br>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th class="text-center titulo-historico">Nome/Senha</th>
										<th class="text-center titulo-historico">Local</th>
									</tr>
								</thead>
								<tbody class="historico-fila">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<br>
			<h4 class=" text-center" style="color:red; font-size: 600%;"><b>*Atenção: As senhas não são sequenciais.</b></h4>
		</div>
		<!-- END SENHA DIV -->


		<!-- BEGIN VIDEO DIV -->
		<div class="container-fluid container-video" hidden>
			<h1 class="text-center" style="font-size: 4000%; color:black;"> VIDEO</h1>
		</div>
		<!-- END VIDEO DIV -->
	</div>
	<!-- END CONTAINER SENHA -->


		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<?php require("falas.php"); ?>
		<script src="js/bootstrap.min.js"></script>
		<script>
		$(document).ready(function() {
			buscaHistorico();
			setaIdioma();
		});
			function startTime() {
			    var today = new Date();
			    var h = today.getHours();
			    var m = today.getMinutes();
			    var s = today.getSeconds();
			    // add a zero in front of numbers < 10
			    m=checkTime(m);
	     		s=checkTime(s);
			    $('#relogio').html(h + ":" + m + ":" + s);
			    t = setTimeout('startTime()', 500);
			}

			var contador_new = 0;
			var piscar = 0;
			var nome = '',
			    senha = '',
			    local = '';
			var resultado = '';
			var qtd = 0;
			var idx = 0;

			var noticia_idx = 0;
			var noticia_nome = '';
			var noticia_resultado = '';
			var noticia_qtd = 0;
			var noticia_id_x = 0;

			var noticia_mostrar = 0;
			var codlo = 0;


			function checkTime(i) {

			    //Noticias
			    if ((noticia_idx == 0) || (noticia_idx > 30)) {
			        var date_not = new Date();

			        if (noticia_resultado == "") {
			            $.ajax({
			                async: "false",
			                type: "POST",
			                url: "index_noticias.php?date=" + date_not,
			                data: "",

			                success: function(txt) {
			                    noticia_resultado = txt;
			                },
			                error: function(txt) {
			                    console.log(txt);
			                }
			            });
			        }

			        if (noticia_resultado != "") {
			            noticia_mostrar = noticia_mostrar + 1;
			            var noticias_dados = jQuery.parseJSON(noticia_resultado);
			            $.each(noticias_dados, function(key, val) {
			                if (noticia_mostrar == key) {
			                    noticia_nome = '<span class=texto-amarelo>' + val['categoria'] + ':</span> ' + val['nome'];
			                }
			                noticia_qtd = key;
			            });

			            $('#inoticias').hide();
			            $('#inoticias').html(noticia_nome);
			            $('#inoticias').fadeIn('slow');


			            if (noticia_mostrar >= noticia_qtd) {
			                noticia_resultado = '';
			                noticia_mostrar = 0;
			                noticia_qtd = 0;
			            }
			        }
			        noticia_idx = 0;
			    }
			    noticia_idx = noticia_idx + 1;
			    //Fim noticias

			    contador_new = contador_new + 1;

			    if ((nome == "") || (contador_new > 30)) {

			        //retorno = Fila();
			        //alert(retorno);


			        if (nome == "") {
			            var date = new Date();

			            if (resultado == "") {
			                $.ajax({
			                    url: "index_busca.php?local=<?php echo $local; ?>&date=" + date,
			                    data: "",

			                    success: function(txt) {
			                        resultado = txt;
			                    },
			                    error: function(txt) {
			                        location.href = 'ur.php';
			                    }
			                });
			            }
			            if (resultado != "") {
			                qtd = 0;
			                idx = 0;
			            }
			        }

			        if (resultado != "") {
			            idx = idx + 1;

			            var dados = jQuery.parseJSON(resultado);
			            $.each(dados, function(key, val) {
			                if (idx == key) {
			                    nome = val['nome'];
			                    senha = val['senh'];
			                    local = val['loca'];
			                    codlo = val['codl'];
			                }
			                qtd = key;
			            });

			            if ((idx > qtd) || (qtd == 0)) {
			                resultado = '';
			                nome = '';
			                senha = '';
			                local = '';
			            }

			            contador_new = 0;
			            piscar = 0;

			            if (nome != "") {
			                 document.getElementById('isom').play();
			                //fala(nome,senha,local);
			            }
			        }
			    }

			    var resul_aux = resultado.substr(0, 1);
			    if ((resul_aux != "{") || (resultado == "")) {
			        nome = '';
			        senha = '';
			        local = '';
			    }


			    if (((contador_new % 3) == 0) && (piscar < 4)) {
			        $('#inome').html('');
			        $('#isenha').html('');
			        $('#ilocal').html('');
			        piscar = piscar + 1;
			    } else {

			        if (codlo == 7) {
			        	//ACOLHIMENTO - FUNDO AMARELO LETRA AZUL
			        	//Letras:
			        	$(".selector-font").removeClass("fonte-amarelo");
			        	$(".selector-font").removeClass("fonte-branco");
			        	$(".selector-font").addClass("fonte-azul");
			        	$(".selector-titulos").addClass("fonte-black");
			        	$(".logo").addClass('img-black');

			        	// Fundo:
			        	$(".selector-bg").removeClass("bg-vermelho");
			        	$(".selector-bg").removeClass("bg-azul");
			        	$(".selector-bg").addClass("bg-amarelo");



			        } else if ((codlo == 5) || (codlo == 17)) {
			            //MEDICO - FUNDO VERMELHO LETRA BRANCA
			            //Letras:
			            $(".selector-font").removeClass("fonte-amarelo");
			        	$(".selector-font").removeClass("fonte-azul");
			        	$(".selector-font").removeClass("fonte-black");
			        	$(".selector-titulos").removeClass("fonte-black");
			        	$(".logo").removeClass('img-black');
			        	$(".selector-font").addClass("fonte-branco");

			        	// Fundo:
			        	$(".selector-bg").removeClass("bg-amarelo");
			        	$(".selector-bg").removeClass("bg-azul");
			        	$(".selector-bg").addClass("bg-vermelho");





			        } else {
			            // GUICHES - FUNDO AZUL LETRA AMARELA
			            //Letras:
			            $(".selector-font").removeClass("fonte-branco");
			        	$(".selector-font").removeClass("fonte-azul");
			        	$(".selector-font").removeClass("fonte-black");
			        	$(".selector-titulos").removeClass("fonte-black");
			        	$(".logo").removeClass('img-black');
			        	$(".selector-font").addClass("fonte-amarelo");

			        	// Fundo:
			        	$(".selector-bg").removeClass("bg-vermelho");
			        	$(".selector-bg").removeClass("bg-amarelo");
			        	$(".selector-bg").addClass("bg-azul");





			        }


			        if (nome == 'NOVO ATENDIMENTO') {
			        	$("#titulo-nome").html("Senha:");
			        	$("#valor-nome").html(senha);
				        $('#valor-local').html(local);
			        }else{
			        	$("#titulo-nome").html("Nome:");
			        	$("#valor-nome").html(nome);
				        $('#valor-local').html(local);
			        }



			    }

			    if (i < 10) {
			        i = "0" + i;
			    }
			    return i;
			}

			function buscaHistorico(){
				$.ajax({
		        	url: 'busca_historico.php?local=<?php echo $local; ?>',
		        })
		        .done(function(data) {
		        	$(".historico-fila").html(data);
		        })
		        .fail(function() {
		        	//console.log("error");
		        })
		        .always(function() {
		        	//console.log("complete");
		        });
			}

			setInterval(buscaHistorico,5000);

		</script>
	</body>
</html>