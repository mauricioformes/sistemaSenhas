<?php
require("../../sistema/lib/bd/bd_hosp.php");

$local = $_GET['local'] == "" ? "0" : $_GET['local'];


$cSQL = "SELECT w.senha,
	'NOVO ATENDIMENTO' nome,
	1 status,
	(SELECT a.guiche
	   FROM atend_cguiche_internacao a
	  where a.id = w.guiche) local,
	w.data_chamada
from web_atend_controle_internacao w
where w.data_chamada is not null
and w.chama_senha = 'F'
and rownum <= 3
order by w.data_chamada desc";
//echo $cSQL;
$oRS = OCIParse($oConBD, $cSQL);
OCIExecute($oRS);

while (OCIFetch($oRS)) {
	$senha = OCIResult($oRS, "SENHA");
	$nomePaciente = OCIResult($oRS, "NOME");
	$local = ucwords(mb_strtolower(OCIResult($oRS, "LOCAL")));

	if ($nomePaciente == "NOVO ATENDIMENTO") {
		$nomeExibir = $senha;
		$style = "font-size: 110px;";
	} else {
		$nomeExibir = ucwords(mb_strtolower($nomePaciente));
		$style = "";
	}

	if (OCIResult($oRS, "STATUS") == 4) {
		$statusPac = "<small style='color:red;'>(Ausente)</small>";
	} else {
		$statusPac = "";
	}


?>

	<tr>
		<td class="text-center dados-historico" style="<?php echo $style; ?>"><b><?php echo $nomeExibir . " " . $statusPac; ?></b></td>
		<td class="text-center dados-historico"><b><?php echo $local; ?></b></td>
	</tr>

<?php } ?>