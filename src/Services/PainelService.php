<?php

namespace Api\Services;

use Api\Repositories\PainelRepository as PainelRepository;
use Api\Services\MailService as MailService;


class PainelService
{
    private $repo;
    private $serviceMail;

    function __construct()
    {
        $this->repo = new PainelRepository();
    }

    public function buscaFilaSenha($tipo, $codLocalDestino)
    {

        $retorno = $this->repo->buscaFilaSenha($tipo, $codLocalDestino);


        return $retorno;
    }

    public function chamaSenha($idSenha, $guiche)
    {

        $retorno = $this->repo->chamaSenha($idSenha, $guiche);


        return $retorno;
    }

    public function finalizarSenha($idSenha, $guiche)
    {

        $retorno = $this->repo->finalizarSenha($idSenha, $guiche);


        return $retorno;
    }

    public function pararSenha($idSenha, $guiche)
    {

        $retorno = $this->repo->pararSenha($idSenha, $guiche);


        return $retorno;
    }

    public function encaminharSenha($codSenha, $codGuicheEncaminha, $codLocalOrigem, $codLocalEncaminha)
    {

        $retorno = $this->repo->insereMovimentacao($codSenha, $codGuicheEncaminha, $codLocalOrigem, $codLocalEncaminha);


        return $retorno;
    }

  
}
