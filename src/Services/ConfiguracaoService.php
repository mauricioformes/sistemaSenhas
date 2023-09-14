<?php

namespace Api\Services;

use Api\Repositories\ConfiguracaoRepository as ConfiguracaoRepository;
use Api\Services\MailService as MailService;


class ConfiguracaoService
{
    private $repo;
    private $serviceMail;

    function __construct()
    {
        $this->repo = new ConfiguracaoRepository();
    }

    public function buscaFilaSenha($tipo)
    {

        $retorno = $this->repo->buscaFilaSenha($tipo);


        return $retorno;
    }

    public function buscaGuiches($area)
    {
        $retorno = $this->repo->buscaGuiches($area);

        return $retorno;
    }

    public function buscaLocais()
    {
        $retorno = $this->repo->buscaLocais();

        return $retorno;
    }

    public function cadastraGuiche($local, $nomeGuiche)
    {
        $retorno = $this->repo->cadastraGuiche($local, $nomeGuiche);

        return $retorno;
    }
}
