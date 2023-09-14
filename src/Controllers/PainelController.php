<?php

/**
 * Created by PhpStorm.
 * User: ghenrique
 * Date: 04/08/2015
 * Time: 08:00
 */

namespace Api\Controllers;


use Api\Rest\Rest as Rest;
use Api\Services\PainelService;
use Api\Services\ConfiguracaoService;


class PainelController extends Rest
{
    private $service;


    public function __construct()
    {
        $this->service = new PainelService();
    }

    public function  index()
    {
        $this->openSession();
        $this->validate_request('GET');

        if ($_SESSION['usuario']['usuario']['STATUS'] == 2) {
            $this->view_with_masterpage("Shared/master", "Painel/usuario");
        }

        $this->view_with_masterpage("Shared/master", "Painel/index");
    }

    public function recepcao()
    {

        $this->openSession();

        $configuracaoService = new ConfiguracaoService();

        $dados['locais'] = $configuracaoService->buscaLocais();
        $dados['guiches'] = $configuracaoService->buscaGuiches(25);

        //$dados = $this->service->buscaFilaSenha("'I', 'C', 'P'");

        $this->view_with_masterpage("Shared/master", "Painel/recepcao", $dados);
    }

    public function internacoes()
    {

        $this->openSession();

        $configuracaoService = new ConfiguracaoService();

       $dados['locais'] = $configuracaoService->buscaLocais();
       $dados['guiches'] = $configuracaoService->buscaGuiches(26);

        //$dados = $this->service->buscaFilaSenha("'I', 'C', 'P'");

        $this->view_with_masterpage("Shared/master", "Painel/internacoes", $dados);
    }

    public function assistencial()
    {

        $this->openSession();

        $configuracaoService = new ConfiguracaoService();

        $dados['locais'] = $configuracaoService->buscaLocais();
        $dados['guiches'] = $configuracaoService->buscaGuiches(28);

        //$dados = $this->service->buscaFilaSenha("'I', 'C', 'P'");

        $this->view_with_masterpage("Shared/master", "Painel/assistencial", $dados);
    }

    public function sac()
    {
        $this->openSession();

        $configuracaoService = new ConfiguracaoService();

       $dados['locais'] = $configuracaoService->buscaLocais();
       $dados['guiches'] = $configuracaoService->buscaGuiches(27);

        //$dados = $this->service->buscaFilaSenha("'I', 'C', 'P'");

        $this->view_with_masterpage("Shared/master", "Painel/sac", $dados);
    }

    public function buscaSenhaRecepcao()
    {

        $this->openSession();


        $dados = $this->service->buscaFilaSenha("'B', 'Q', 'A', 'I', 'C', 'P', 'S'", 25);

        echo json_encode($dados);
    }

    public function buscaSenhaInternacoes()
    {

        $this->openSession();


        $dados = $this->service->buscaFilaSenha("'I', 'C', 'P'", 26);

        echo json_encode($dados);
    }

    public function buscaSenhaAssistencial()
    {

        $this->openSession();


        $dados = $this->service->buscaFilaSenha("'C'", 28);

        echo json_encode($dados);
    }

    public function buscaSenhaSAC()
    {

        $this->openSession();

        $dados = $this->service->buscaFilaSenha("'S'", 27);

        // $this->view_with_masterpage("Shared/master", "Painel/sac", $dados);
        echo json_encode($dados);
    }

    public function chamaSenha()
    {
        $dados = $this->service->chamaSenha($_POST["idSenha"], $_POST["guiche"]);

        echo json_encode($dados);
    }

    public function finalizarSenha()
    {

        $dados = $this->service->finalizarSenha($_POST["idSenha"], $_POST["guiche"]);

        echo json_encode($dados);
    }

    public function pararSenha()
    {

        $dados = $this->service->pararSenha($_POST["idSenha"], $_POST["guiche"]);

        echo json_encode($dados);
    }

    public function encaminharSenha()
    {
        // var_dump($_POST);
        // exit;
        switch ($_POST["codTipo"]) {
            case 1:
                $dados = $this->service->encaminharSenha($_POST["codSenhaEncaminha"], $_POST["codGuicheEncaminha"], $_POST["codLocalOrigem"], $_POST["codLocalEncaminha"]);
                break;
            case 2:
                $dados = $this->service->encaminharSenha($_POST["codSenhaEncaminhaAssistencial"], $_POST["codGuicheEncaminhaAssistencial"], $_POST["codLocalOrigemAssistencial"], $_POST["codLocalEncaminhaAssistencial"]);
                break;
            case 3:
                $dados = $this->service->encaminharSenha($_POST["codSenhaEncaminhaInternacao"], $_POST["codGuicheEncaminhaInternacao"], $_POST["codLocalOrigemInternacao"], $_POST["codLocalEncaminhaInternacao"]);
                break;
            case 4:
                $dados = $this->service->encaminharSenha($_POST["codSenhaEncaminhaSAC"], $_POST["codGuicheEncaminhaSAC"], $_POST["codLocalOrigemSAC"], $_POST["codLocalEncaminhaSAC"]);
                break;
        }



        echo json_encode($dados);
    }
}

$controller = new PainelController();
$controller->processApi();
