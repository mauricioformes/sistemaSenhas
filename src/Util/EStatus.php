<?php

namespace Api\Util;

abstract class EStatus
{

    const Aberto=1;
    const Analise=2;
    const Aguardando_Finalizacao=3;
    const Finalizado=4;
    const Solucao_Nao_Aceita=5;
}