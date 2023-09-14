<?php
namespace Api\Controllers;

use Api\Rest as Rest;
use Api\Services\LoginService;
use PDOOCI as PDOOCI;


class LoginController extends Rest\Rest
{
	private $service;

	function __construct()
	{
		$this->service = new LoginService();
	}

	function index()
	{
		
		// var_dump($_SESSION["usuario"]);
		// exit;
		$this->validate_request("GET");
		
		if (isset($_SESSION["usuario"]))
		{
			$this->redirect("painel", "index");
		}

		$this->view("Login/index");
	}

	public function autenticar()
	{
		$this->validate_request('POST');
		try
		{
			$this->service->autenticar($_POST);
			
			$this->redirect("painel", "index");
		} catch (\Exception $e) 
		{
			$data = array("usuario" => $_POST["usuario"], "erro" => $e->getMessage());

			$_SESSION['erro'] = $e->getMessage();

			$this->view("Login/index", $data);
		}
	}
	public function sair()
	{
		// var_dump("entrou");
		// exit;
		$this->changeCookie("off");
		session_cache_expire(720);
		session_start();

		unset($_SESSION);
		unset($_COOKIE);
		
		session_destroy();
		$this->redirect("login", "index");
	}
}

$controller=new LoginController();
$controller->processApi();
