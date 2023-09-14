<?php
/**
 * Created by PhpStorm.
 * User: ghenrique
 * Date: 27/08/2015
 * Time: 09:57
 */

namespace Api\Util;


abstract class ETipoAcesso
{
    const Via_Forms=0;
    const Via_Login=1;
    const Via_Externo=2;
}