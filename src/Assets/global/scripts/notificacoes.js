
$(document).ready(function () {


	$("#loading").dialog({
		closeOnEscape: false,
		open: function (event, ui) {
			$(".ui-dialog-titlebar-close", ui.dialog || ui).hide();
		},
		open: function () {
			$(this).closest(".ui-dialog").find(".ui-dialog-titlebar:first").hide();
		},
		width: 50,
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
		}
	});
	// Chosen Select
	$(".chosen-select").chosen({
		'width': '100%',
		'white-space': 'nowrap'
	});
	$(".data-panel").datepicker({
		monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
		dateFormat: "dd/mm/yy",
		dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"]
	});

	$(".time-panel").timepicker({
		showInputs: false,
		defaultTime: '',
		minuteStep: 1,
		disableFocus: true,
		template: 'dropdown',
		showMeridian: false
	});
});

function f_novoGuiche() {

	$("#modal-titulo").html("Cadastrar Novo Guichê");
	//$("#mensagem_detalhe").html(data);
	$("#modal_cadastra").modal("show");

}

$("#locais").change(function () {

	var codLocal = $("#locais").val();
	var html = "";
	//console.log(codLocal);
	$.ajax({
		type: 'POST',
		url: '../configuracao/guiches',
		data: { locais: codLocal },
		success: function (dados) {
			//console.log(dados);
			var valores = JSON.parse(dados);
			//console.log(valores);

			$("#guiches").removeAttr("disabled");
			html += "<option value=''>Selecione um guichê...</option>";
			for (var i = 0; i < valores.length; i++) {
				//console.log(valores[i]);
				html += "<option value='" + valores[i].ID + "'>" + valores[i].GUICHE + "</option>";
			}

			$("#guiches").html(html);

			//window.history.pushState({url: "" + $(this).attr('href') + ""}, $(this).attr('title') , $(this).attr('href'));
			//window.history.pushState('Object', 'Categoria JavaScript', '/sistema/app/gestao_caixas_guardiao_novo/index.php?' + dados);
		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});



});

function ajaxSenhaSAC() {
	var codLocal = $("#guiches").val();
	var html = "";
	$.ajax({
		type: 'POST',
		url: 'buscaSenhaSAC',
		success: function (data) {
			var valores = JSON.parse(data);

			for (var i = 0; i < valores.length; i++) {
				console.log(valores[i]);
				//console.log(valores[i]);
				if (valores[i].CHAMA_SENHA == 'N') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-primary' id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' onclick='chamarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Chamar</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaSAC(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else if (valores[i].CHAMA_SENHA == 'S') {
					html += "<tr>" +
						"<td style='text-align:center; width: 5%;'><button class='btn btn-danger' id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' onclick='pararChamadaSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>PARAR CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaSAC(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else {
					html += "<tr>" +
						"<td style='text-align:center; width: 5%;'><button class='btn btn-warning' disabled id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' >FOI CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaSAC(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				}
			}

			$("#exibeSenhasSAC").html(html);
			document.getElementById("exibeFilaSAC").hidden = false;

		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});
}

function ajaxSenhaRecepcao() {
	var codLocal = $("#guiches").val();
	var html = "";
	$.ajax({
		type: 'POST',
		url: 'buscaSenhaRecepcao',
		success: function (data) {
			var valores = JSON.parse(data);

			//console.log(valores);


			for (var i = 0; i < valores.length; i++) {
				//console.log(valores[i]);
				//console.log(valores[i]);
				if (valores[i].CHAMA_SENHA == 'N') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-primary' id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' onclick='chamarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Chamar</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenha(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else if (valores[i].CHAMA_SENHA == 'S') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-danger' id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' onclick='pararChamadaSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>PARAR CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenha(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else if (valores[i].CHAMA_SENHA == 'F') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-warning' disabled id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' >FOI CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' disabled onclick='encaminharSenha(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "'disabled onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>FINALIZADA</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-warning' disabled id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' >FOI CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenha(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				}

			}

			$("#exibeSenhasRecepcao").html(html);
			document.getElementById("exibeFilaRecepcao").hidden = false;

		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});
}

function ajaxSenhaAssistencial() {
	var codLocal = $("#guiches").val();
	var html = "";
	$.ajax({
		type: 'POST',
		url: 'buscaSenhaAssistencial',
		success: function (data) {
			var valores = JSON.parse(data);

			//console.log(valores);


			for (var i = 0; i < valores.length; i++) {
				//console.log(valores[i]);
				//console.log(valores[i]);
				if (valores[i].CHAMA_SENHA == 'N') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-primary' id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' onclick='chamarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Chamar</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaAssistencial(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else if (valores[i].CHAMA_SENHA == 'S') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-danger' id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' onclick='pararChamadaSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>PARAR CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaAssistencial(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else if (valores[i].CHAMA_SENHA == 'F') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-warning' disabled id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' >FOI CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' disabled onclick='encaminharSenhaAssistencial(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "'disabled onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>FINALIZADA</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-warning' disabled id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' >FOI CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaAssistencial(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				}

			}

			$("#exibeSenhasAssistencial").html(html);
			document.getElementById("exibeFilaAssistencial").hidden = false;

		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});
}

function ajaxSenhaInternacao() {
	var codLocal = $("#guiches").val();
	var html = "";

	$.ajax({
		type: 'POST',
		url: 'buscaSenhaInternacoes',
		success: function (data) {
			var valores = JSON.parse(data);

			//console.log(valores);


			for (var i = 0; i < valores.length; i++) {
				//console.log(valores[i]);
				//console.log(valores[i]);
				if (valores[i].CHAMA_SENHA == 'N') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-primary' id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' onclick='chamarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Chamar</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaInternacao(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else if (valores[i].CHAMA_SENHA == 'S') {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-danger' id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' onclick='pararChamadaSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>PARAR CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaInternacao(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				} else {
					html += "<tr>" +
						"<td style='text-align:center; width: 20vw;'><button class='btn btn-warning' disabled id='btnChamar_" + valores[i].CODIGO + "' name='btnChamar_" + valores[i].CODIGO + "' >FOI CHAMADA</button><button class='btn btn-success' id='btnEncaminhar_" + valores[i].CODIGO + "' name='btnEncaminhar_" + valores[i].CODIGO + "' onclick='encaminharSenhaInternacao(" + valores[i].CODIGO + ", " + codLocal + ", " + valores[i].COD_LOCAL_DESTINO + ");'>Encaminhar</button><button class='btn btn-danger' id='btnFinalizar_" + valores[i].CODIGO + "' name='btnFinalizar_" + valores[i].CODIGO + "' onclick='finalizarSenha(" + valores[i].CODIGO + ", " + codLocal + ");'>Finalizar</button></td>" +
						"<td style='text-align:center;color: red;'><b>" + valores[i].SENHA + "</b></td>" +
						"<td style='text-align:center'>" + valores[i].TIPO + "</td>" +
						"<td style='text-align:center'><b>" + valores[i].DATA_CADASTRO + "</b></td>" +
						"<td style='text-align:center; color:red'><b>" + valores[i].MOVIMENTACAO + "</b></td>" +
						"</tr>";
				}
			}

			$("#exibeSenhasInternacao").html(html);
			document.getElementById("exibeFilaInternacao").hidden = false;

		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});
}

function ajaxBuscaGuiches() {
	var dados = $("#form_pesquisa_guiche").serialize();
	var html = "";
	$.ajax({
		type: 'POST',
		url: 'guiches',
		data: dados,
		success: function (data) {
			var valores = JSON.parse(data);


			document.getElementById("exibeDivGuiche").hidden = false;

			for (var i = 0; i < valores.length; i++) {
				//console.log(valores[i]);
				html += "<tr>" +
					"<td  style='text-align:center;'>" + valores[i].LOCAL + "</td>" +
					"<td  style='text-align:center;'>" + valores[i].GUICHE + "</td>" +
					"<td  style='text-align:center;'>" + valores[i].DATA + "</td>" +
					"<td  style='text-align:center;'>" + valores[i].USUARIO + "</td>" +
					"<tr>";
			}

			$("#exibeTabelaGuiche").html(html);

			//window.history.pushState({url: "" + $(this).attr('href') + ""}, $(this).attr('title') , $(this).attr('href'));
			//window.history.pushState('Object', 'Categoria JavaScript', '/sistema/app/gestao_caixas_guardiao_novo/index.php?' + dados);
		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});
}

$("#formEncaminharSenha").submit(function (event) {
	var dados = $("#formEncaminharSenha").serialize();
	$.ajax({
		type: 'POST',
		data: dados,
		url: 'encaminharSenha',
		success: function (data) {

			$("#modal_encaminhar").modal("hide");
			ajaxSenhaRecepcao();


		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
		}
	});
	event.preventDefault();
});

$("#formEncaminharSenhaInternacao").submit(function (event) {
	var dados = $("#formEncaminharSenhaInternacao").serialize();
	$.ajax({
		type: 'POST',
		data: dados,
		url: 'encaminharSenha',
		success: function (data) {

			$("#modal_encaminhar_internacao").modal("hide");
			ajaxSenhaInternacao();

		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
		}
	});
	event.preventDefault();
});

$("#formEncaminharSenhaSAC").submit(function (event) {
	var dados = $("#formEncaminharSenhaSAC").serialize();
	$.ajax({
		type: 'POST',
		data: dados,
		url: 'encaminharSenha',
		success: function (data) {

			$("#modal_encaminhar_sac").modal("hide");
			ajaxSenhaSAC();

		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
		}
	});
	event.preventDefault();
});

$("#formEncaminharSenhaAssistencial").submit(function (event) {
	var dados = $("#formEncaminharSenhaAssistencial").serialize();
	$.ajax({
		type: 'POST',
		data: dados,
		url: 'encaminharSenha',
		success: function (data) {

			$("#modal_encaminhar_assistencial").modal("hide");
			ajaxSenhaAssistencial();

		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
		}
	});
	event.preventDefault();
});

$("#formCadastraGuiche").submit(function (event) {
	var dados = $("#formCadastraGuiche").serialize();
	$.ajax({
		type: 'POST',
		data: dados,
		url: 'cadastraGuiche',
		success: function (data) {

			$("#modal_cadastra").modal("hide");

		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});
	event.preventDefault();
});

$("#formSelecionaGuicheInternacao").submit(function (event) {
	//alert("Handler for .submit() called.");

	ajaxSenhaInternacao();

	const intervalInternacao = setInterval(ajaxSenhaInternacao, 5000);

	//ajaxSenhaInternacao();


	event.preventDefault();
});

$("#formSelecionaGuicheSAC").submit(function (event) {
	//alert("Handler for .submit() called.");
	ajaxSenhaSAC();

	const intervalInternacao = setInterval(ajaxSenhaSAC, 5000);

	event.preventDefault();
});

$("#formSelecionaGuicheRecepcao").submit(function (event) {
	//alert("Handler for .submit() called.");
	ajaxSenhaRecepcao();

	const intervalInternacao = setInterval(ajaxSenhaRecepcao, 5000);

	event.preventDefault();
});

$("#formSelecionaGuicheAssistencial").submit(function (event) {
	//alert("Handler for .submit() called.");
	ajaxSenhaAssistencial();

	const intervalAssistencial = setInterval(ajaxSenhaAssistencial, 5000);

	event.preventDefault();
});


$("#form_pesquisa_guiche").submit(function (event) {

	ajaxBuscaGuiches();
	event.preventDefault();

});


function chamarSenha(idSenha, guiche) {

	$.ajax({

		type: 'POST',
		url: 'chamaSenha',
		data: {
			idSenha: idSenha,
			guiche: guiche
		},
		success: function (data) {
			//document.getElementById("btnChamar" + idSenha).hidden = true;	
			var botao = "btnChamar_" + idSenha;
			console.log(document.getElementById(botao));
			document.getElementById(botao).removeAttribute("onclick");
			document.getElementById(botao).classList.remove('btn-primary');
			document.getElementById(botao).classList.add('btn-danger');
			document.getElementById(botao).innerHTML = "PARAR CHAMADA";
			document.getElementById(botao).setAttribute("onclick", "finalizarSenha(" + idSenha + ", " + guiche + ");");

			//console.log($("btnChamar_" + idSenha));

			//window.history.pushState({url: "" + $(this).attr('href') + ""}, $(this).attr('title') , $(this).attr('href'));
			//window.history.pushState('Object', 'Categoria JavaScript', '/sistema/app/gestao_caixas_guardiao_novo/index.php?' + dados);
		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});

}


function finalizarSenha(idSenha, guiche) {
	$.ajax({

		type: 'POST',
		url: 'finalizarSenha',
		data: {
			idSenha: idSenha,
			guiche: guiche
		},
		success: function (data) {
			var botao = "btnFinalizar_" + idSenha;

			document.getElementById(botao).disabled = true;

			document.getElementById(botao).removeAttribute("onclick");
			document.getElementById(botao).classList.remove('btn-danger');
			document.getElementById(botao).classList.add('btn-warning');
			document.getElementById(botao).innerHTML = "FINALIZADO";

			//console.log($("btnChamar_" + idSenha));

			//window.history.pushState({url: "" + $(this).attr('href') + ""}, $(this).attr('title') , $(this).attr('href'));
			//window.history.pushState('Object', 'Categoria JavaScript', '/sistema/app/gestao_caixas_guardiao_novo/index.php?' + dados);
		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});
}

function pararChamadaSenha(idSenha, guiche) {
	$.ajax({

		type: 'POST',
		url: 'pararSenha',
		data: {
			idSenha: idSenha,
			guiche: guiche
		},
		success: function (data) {
			var botao = "btnChamar_" + idSenha;

			document.getElementById(botao).disabled = true;

			document.getElementById(botao).removeAttribute("onclick");
			document.getElementById(botao).classList.remove('btn-danger');
			document.getElementById(botao).classList.add('btn-warning');
			document.getElementById(botao).innerHTML = "FOI CHAMADO";

			//console.log($("btnChamar_" + idSenha));

			//window.history.pushState({url: "" + $(this).attr('href') + ""}, $(this).attr('title') , $(this).attr('href'));
			//window.history.pushState('Object', 'Categoria JavaScript', '/sistema/app/gestao_caixas_guardiao_novo/index.php?' + dados);
		},
		error: function () {
			$("#validacao_retorno").append("<div class='alert alert-danger alert-dismissible fade show' role='alert'>"
				+ "<strong>Aviso: </strong>Erro ao buscar os dados"

				+ "</div>");
			$("#loading").dialog("close");
		}
	});
}


function encaminharSenha(idSenha, guiche, codLocalOrigem) {


	$("#codSenhaEncaminha").val(idSenha);
	$("#codGuicheEncaminha").val(guiche);
	$("#codLocalOrigem").val(codLocalOrigem);

	$("#modal-titulo").html("Encaminhar senha para outra fila");
	//$("#mensagem_detalhe").html(data);
	$("#modal_encaminhar").modal("show");

}

function encaminharSenhaSAC(idSenha, guiche, codLocalOrigem) {


	$("#codSenhaEncaminhaSAC").val(idSenha);
	$("#codGuicheEncaminhaSAC").val(guiche);
	$("#codLocalOrigemSAC").val(codLocalOrigem);

	$("#modal-titulo").html("Encaminhar senha para outra fila");
	//$("#mensagem_detalhe").html(data);
	$("#modal_encaminhar_sac").modal("show");

}

function encaminharSenhaAssistencial(idSenha, guiche, codLocalOrigem) {


	$("#codSenhaEncaminhaAssistencial").val(idSenha);
	$("#codGuicheEncaminhaAssistencial").val(guiche);
	$("#codLocalOrigemAssistencial").val(codLocalOrigem);

	$("#modal-titulo").html("Encaminhar senha para outra fila");
	//$("#mensagem_detalhe").html(data);
	$("#modal_encaminhar_assistencial").modal("show");

}

function encaminharSenhaInternacao(idSenha, guiche, codLocalOrigem) {


	$("#codSenhaEncaminhaInternacao").val(idSenha);
	$("#codGuicheEncaminhaInternacao").val(guiche);
	$("#codLocalOrigemInternacao").val(codLocalOrigem);

	$("#modal-titulo").html("Encaminhar senha para outra fila");
	//$("#mensagem_detalhe").html(data);
	$("#modal_encaminhar_internacao").modal("show");

}