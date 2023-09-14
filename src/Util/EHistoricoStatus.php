<?php
/**
 * Created by PhpStorm.
 * User: ghenrique
 * Date: 12/08/2015
 * Time: 14:34
 */

namespace Api\Util;


abstract class EHistoricoStatus
{
    const Aberta_Ocorrencia=1;
    const Resp_Define_Prazo=2;
    const Resp_Transfere_Dep_Correto=3;
    const Resp_Transfere_Dep_Abertura=4;
    const Coord_Abertura_Transfere=5;
    const Resp_Parecer_Final=6;
    const Finalizacao_Recusada=7;
    const Finalizacao_Aceita=8;
}