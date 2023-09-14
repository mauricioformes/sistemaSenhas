<?php

namespace Api\Services;

use Api\Repositories\LoginRepository as LoginRepository;



class LoginService
{
    private $repo;

    function __construct()
    {
        $this->repo = new LoginRepository();
    }

    public function autenticar($dados)
    {

        $usuario = $this->repo->verificarAcesso(strtoupper($dados['usuario']),$dados['senha']);

        // echo "<pre>";
        // print_r($usuario);
        // echo "</pre>";
        if(isset($usuario))
        {
            session_cache_expire(1720);
            session_start();
            //$aplicacoes = $this->repo->buscarAplicacoes($usuario[0]['CODIGO']);


            $_SESSION["usuario"] = array("usuario"    => $usuario[0]);
        }
        else
        {
            throw new \Exception("Usuario ou senha incorreta.");
            
        }
    }

}
