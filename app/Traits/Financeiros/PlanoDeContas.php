<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 07/03/18
 * Time: 10:45
 */

namespace WebCondom\Traits\Financeiros;


trait PlanoDeContas
{
    public function FormatarConta($conta)
    {
        if($conta < 10)
            return '000'.$conta;
        else if($conta < 100)
            return '00'.$conta;
        else if($conta < 1000)
            return '0'.$conta;
        else
            return $conta;
    }

    public function FormatarGrupo($grupo)
    {
        if($grupo < 10)
            return '00'.$grupo;
        else if($grupo < 100)
            return '0'.$grupo;
        else
            return $grupo;
    }

    public function FormatarProximaConta($conta)
    {
        if($conta < 10)
            return '000'.($conta+1);
        else if($conta < 100)
            return '00'.($conta+1);
        else if($conta < 1000)
            return '0'.($conta+1);
        else
            return $conta+1;
    }

    public function FormatarProximoGrupo($grupo){
        if($grupo < 10)
            return '00'.($grupo+1);
        else if($grupo < 100)
            return '0'.($grupo+1);
        else
            return $grupo+1;
    }
}