<?php

namespace Api\Util;

class EFunctions
{

    public function convertData($date,$format)
    {
        $date = str_replace('/', '-', $date);
        $newDate='';
        switch ($format) {
            case 'BR': $newDate=date("d/m/Y H:i:s", strtotime($date));
                break;
            case 'US': $newDate=date("Y/m/d H:i:s", strtotime($date));
                break;
            case 'DATA': $newDate=date("d/m/Y", strtotime($date));
                break;

            default:
                $newDate=$date;
                break;
        }
        return $newDate;
    }


    public function interacaoDemanda($codigo)
    {
        $retorno="";
        switch ($codigo){
            case 1: $retorno="CADASTROU NIP";
                break;
            case 2: $retorno="RESPONDEU NIP";
                break;
            case 3: $retorno="RECEBEU REQUISICAO DE INFORMAÇÃO";
                break;
            case 4: $retorno="RESPONDEU REQUISIÇÃO DE INFORMACAO";
                break;
            case 5: $retorno="RECEBEU CONTINUIDADE DA APURAÇÃO";
                break;
            case 6: $retorno="RESPONDEU CONTINUIDADE DA APURAÇÃO";
                break;

            case 7: $retorno="RECEBEU AUTO DE INFRAÇÃO";
                break;
            case 8: $retorno="RESPONDEU AUTO DE INFRAÇÃO";
                break;
            case 9: $retorno="RECEBEU MULTA PECUNIÁRIA";
                break;
            case 10: $retorno="RESPONDEU MULTA PECUNIÁRIA";
                break;

            case 11: $retorno="RECEBEU DESCRIMINAÇÃO DE DÉBITO";
                break;
            case 12: $retorno="RECEBEU MANDADO";
                break;
            case 13: $retorno="RECEBEU ARQUIVAMENTO DE DEMANDA";
                break;
            default: $retorno="NOVA INTERAÇÃO";
                break;
        }
        return $retorno;
    }

    public function adicionarDias($data,$dias)
    {
        if($dias=="")
            $dias=0;

        if($data=="")
            $retorno="";
        else
        {
           $datas=explode("/",$data);
           $retorno=date("d/m/Y", mktime(0,0, 0, $datas[1], $datas[0]+$dias ,$datas[2]));
        }

        return $retorno;
    }

    public function converterMoeda($valor,$formato='SYS'){

        switch($formato){
            case "SYS": $retorno = str_replace(".","",$valor);
                        $retorno = str_replace(",",".",$retorno);
                        $retorno = number_format($retorno,2,'.','');
                break;
            case "BR":  $retorno = str_replace(",","",$valor);
                        $retorno = str_replace(".",",",$retorno);
                        $retorno = number_format($retorno,2,',','.');
                break;
            default:    $retorno=$valor;
                break;
        }
        return $retorno;
    }

    public function removeAcentos($string){
        return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }

}