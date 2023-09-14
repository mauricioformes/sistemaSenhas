<?php

namespace Api\Repositories;

class ConfiguracaoRepository extends Conexao
{

	public function buscaGuiches($area)
	{

		$sql = "SELECT * FROM atend_cguiche_internacao where local = " . $area;

		//   var_dump($sql);
		//  exit;

		$rows = $this->executeQuery($sql);

		return $rows;
	}

	public function buscaLocais()
	{

		$sql = "SELECT * FROM atend_clocal_internacao";



		$rows = $this->executeQuery($sql);

		// 	  var_dump($rows);
		//  exit;

		return $rows;
	}

	public function cadastraGuiche($local, $nomeGuiche)
	{
		session_start();

		$sql = "SELECT max(id) + 1 codigo FROM atend_cguiche_internacao";



		$rows = $this->executeQuery($sql);

		$insert = "INSERT INTO atend_cguiche_internacao (ID, LOCAL, GUICHE, DATA, USUARIO) VALUES
														(" . $rows[0]["CODIGO"] . ", " . $local . ", '" . $nomeGuiche . "', sysdate, '" . $_SESSION["usuario"]["usuario"]["LOGIN"] . "')";

		// var_dump($_SESSION["usuario"]["usuario"]["LOGIN"]);
		// exit;
		$result = $this->executeQuery($insert);

		return $result;
	}
}
