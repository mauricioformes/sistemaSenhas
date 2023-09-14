<?php

	$banco = "(DESCRIPTION = (ADDRESS_LIST=(ADDRESS = (PROTOCOL = TCP)(HOST = austa-scan.austa.local)(PORT = 1521)))(LOAD_BALANCE = yes)(CONNECT_DATA = (SERVER = DEDICATED)(SERVICE_NAME = prd) (FAILOVER_MODE =(TYPE = SELECT) (METHOD = BASIC)(RETRIES = 180) (DELAY = 5))))";

	$oConBD=ocilogon("HOSPPRD_WEB","tIl!8470t98pRa32&", $banco);

	if ($oConBD == false){
		echo "<font class=destaque>Extranet Austa</font><br>";
		echo "<font class=textov>Você não está conectado na Base de Dados!!!</font><br>";
	}

?>
