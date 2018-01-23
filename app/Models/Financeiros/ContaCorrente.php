<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Traits\Datas;
use WebCondom\Traits\Financeiros\ContaCorrente as ContaCorrenteTrait;

/**
 * Class ContasCorrente.
 *
 * @package namespace WebCondom\Models;
 */
class ContaCorrente extends Model
{
    use Datas, SoftDeletes, ContaCorrenteTrait;

    protected $table = 'contas_corrente';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'condominio_id', 'codigo', 'banco_id', 'agencia', 'conta', 'inicio', 'principal',
        'nome', 'boleto_agencia', 'boleto_conta', 'cedente', 'carteira',
        'aceite', 'nosso_numero', 'prazo_baixa', 'multa', 'juros', 'tipo_juros', 'protestar',
        'mensagem1', 'mensagem2', 'mensagem3', 'mensagem4'
    ];

    protected $dates = [ "inicio" ];

    public function getinicioFormatadoAttribue()
    {
        return $this->inicio;
    }

    public function condomonio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class);
    }

}
