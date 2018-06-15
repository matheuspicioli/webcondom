<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 04/12/17
 * Time: 15:49
 */

namespace WebCondom\Traits;


trait UploadArquivos
{
    private function salvar_arquivo($arquivo, $pasta, $nome, $disco = 'public')
    {
        if($arquivo){
            $caminho = $arquivo->storeAs(
                $pasta,
                $nome.'.'.$arquivo->extension(),
                $disco
            );
            return $caminho;
        }
        return false;
    }
}