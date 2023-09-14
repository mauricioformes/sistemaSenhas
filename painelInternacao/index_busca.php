<?php
//session_start();

//$horaSaida = date("H:i:s");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//if($_SESSION['HoraEntrada'] == ""){
//	$_SESSION['HoraEntrada'] = date("H:i:s");
//}

//$diffHoras = (strtotime($horaSaida) - strtotime($_SESSION['HoraEntrada']));

$local = $_GET['local'] == "" ? "0" : $_GET['local'];


if ($local == "1") {
	$LB = "";
} 
// elseif($local == "2"){
// 	$LB = "INTERNA��O:";
// }elseif($local == "3"){
// 	$LB = "";
// }elseif($local == "4"){
// 	$LB = "";
// }elseif($local == "5"){
// 	$LB = "";
// }elseif($local == "6"){
// 	$LB = "";
// }elseif($local == "7"){
// 	$LB = "";
// }elseif($local == "8"){
// 	$LB = "";
// } else {
// 	$LB = "";
// }


//if($diffHoras > 20){
//$_SESSION['HoraEntrada'] = date("H:i:s");

require("../../sistema/lib/bd/bd_hosp.php");

$cSQL = "SELECT w.senha,
	   'NOVO ATENDIMENTO' nome,
	   (SELECT a.guiche
		  FROM atend_cguiche_internacao a
		 where a.id = w.guiche) local,
		 w.local cod_local_atend
  from web_atend_controle_internacao w
 where w.chama_senha = 'S'";

#echo $cSQL;
$oRS = OCIParse($oConBD, $cSQL);
OCIExecute($oRS);
$nCount = 1;
while (OCIFetch($oRS)) {
	
	$aFila[$nCount][senh] =  Trim(OCIResult($oRS, 1));
	$aFila[$nCount][nome] =  (Trim(OCIResult($oRS, 2)));
	$aFila[$nCount][loca] =  (OCIResult($oRS, 3));
	$aFila[$nCount][codl] =  Trim(OCIResult($oRS, 4));
	$nCount++;
}


OCIFreeStatement($oRS);

OCILogOff($oConBD);


// echo "<pre>";
// print_r($aFila);
// echo "</pre>";

/*
			$aFila[1][senh] = "C007";
			$aFila[1][nome] = ("JO�O PEREIRA FRANCISCO");
			$aFila[1][loca] = "MEDICO ADULTO";

			$aFila[2][senh] = "C008";
			$aFila[2][nome] = "GUILHERME MULLER COLETTI";
			$aFila[2][loca] = "MEDICO ADULTO";

			$aFila[3][senh] = "C009";
			$aFila[3][nome] = "MARIA DA SILVA";
			$aFila[3][loca] = "MEDICO ADULTO";

			$aFila[4][senh] = "C010";
			$aFila[4][nome] = ("JO�O DA SILVA");
			$aFila[4][loca] = "MEDICO ADULTO";

			$aFila[5][senh] = "C011";
			$aFila[5][nome] = "NELSON DA SILVA";
			$aFila[5][loca] = "MEDICO ADULTO";
		*/

if ($nCount > 1) {
	echo json_encode($aFila);
}
	//}
