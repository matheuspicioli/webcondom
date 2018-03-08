<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Models\Entidades\Fornecedor;
use WebCondom\Traits\Datas;

class ContaCorrenteLancamento extends Model
{
    use SoftDeletes, Datas;

    protected $table = "conta_corrente_lancamentos";
    protected $fillable = [
        'nota_fiscal', 'parcela', 'documento', 'tipo', 'valor', 'compensado',
        'data_lancamento', 'cheque', 'enviado_em', 'retorno_em', 'assinado',
        'historico', 'fornecedor_id', 'conta_corrente_id', 'plano_conta_id'
    ];
    protected $dates = [ 'data_lancamento' ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    public function conta_corrente()
    {
        return $this->belongsTo(ContaCorrente::class, 'conta_corrente_id');
    }

    public function plano_conta()
    {
        return $this->belongsTo(Conta::class, 'plano_conta_id');
    }
}