<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$_GET[senha] = 'IF007@14/09/2023 09:37:06@';

	$handle = printer_open("MP-2500 TH");

	$valor = explode("@",$_GET[senha]);

	printer_start_doc($handle, "");
	printer_start_page($handle);

	$texto = $valor[0];
	printer_draw_text($handle, $texto, 0, 0);

	$texto = "            ".$valor[1];
	printer_draw_text($handle, $texto, 20, 10);

	$texto = " Atendimento Hospital AUSTA";
	printer_draw_text($handle, $texto, 140, 30);

	$font = printer_create_font("Arial", 100, 0, PRINTER_FW_MEDIUM, false, false, false, 0);
	printer_select_font($handle, $font);
	printer_draw_text($handle, $valor[0], 140, 50);
	printer_delete_font($font);


	$font = printer_create_font("C39HrP48DmTt", 100, 0, PRINTER_FW_MEDIUM, false, false, false, 0);
	printer_select_font($handle, $font);
	printer_draw_text($handle, "*".$valor[0]."*", 180, 180);
	printer_delete_font($font);


	$tipo_atendimento[2] = "PROCEDIMENTOS AMBULATÓRIOS";
	$tipo_atendimento[3] = "VISITA QUARTO";
	$tipo_atendimento[4] = "VISITA UTI";
	$tipo_atendimento[5] = "INTERNAÇÃO";
	$tipo_atendimento[6] = "INFORMAÇÕES";	
	$tipo_atendimento[7] = "INTERNAÇÃO PRÉVIA";
	$tipo_atendimento[8] = "AUTORIZAÇÃO";


	$font = printer_create_font("Verdana", 30, 0, PRINTER_FW_MEDIUM, false, false, false, 0);
	printer_select_font($handle, $font);
	printer_draw_text($handle, $tipo_atendimento[$_GET[tipo]], 140, 300);
	printer_delete_font($font);


	$font = printer_create_font("Verdana", 20, 0, PRINTER_FW_MEDIUM, false, false, false, 0);
	printer_select_font($handle, $font);
	printer_draw_text($handle, "Tenha em mãos um documento de identificação e o cartão do plano de saúde", 0, 350);
	printer_delete_font($font);

	printer_end_page($handle);
	printer_end_doc($handle);

	printer_close($handle);

?>