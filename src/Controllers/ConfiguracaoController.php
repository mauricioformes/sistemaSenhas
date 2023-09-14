<?php

/**
 * Created by PhpStorm.
 * User: ghenrique
 * Date: 04/08/2015
 * Time: 08:00
 */

namespace Api\Controllers;


use Api\Rest\Rest as Rest;
use Api\Services\ConfiguracaoService;

class ConfiguracaoController extends Rest
{
    private $service;

    public function __construct()
    {
        $this->service = new ConfiguracaoService();
    }

    public function  index()
    {
        $this->openSession();
        $this->validate_request('GET');

        if ($_SESSION['usuario']['usuario']['STATUS'] == 2) {
            $this->view_with_masterpage("Shared/master", "Configuracao/usuario");
        }

        $this->view_with_masterpage("Shared/master", "Configuracao/index");
    }

    public function locais()
    {

        $this->openSession();

        $dados = $this->service->buscaLocais();

        // var_dump($dados);
        // exit;

        //  $dados["guiches"] = $this->service->buscaGuiches();

        $this->view_with_masterpage("Shared/master", "Configuracao/guiches", $dados);
    }

    public function guiches()
    {

        $dados = $this->service->buscaGuiches($_POST["locais"]);
        // echo "<pre>";
        // print_r($dados);
        // echo "</pre>";
        // exit;
        echo json_encode($dados);
    }

    public function cadastraGuiche()
    {      

        // var_dump($_POST);
        // exit;

        $dados = $this->service->cadastraGuiche($_POST["cadlocais"], $_POST["cadNomeGuiche"]);

        echo json_encode($dados);
    }
}

$controller = new ConfiguracaoController();
$controller->processApi();
