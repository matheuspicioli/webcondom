<?php

namespace WebCondom\Models\Financeiros;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebCondom\Models\Entidades\Fornecedor;

class ContaCorrenteLancamento extends Model
{
    use SoftDeletes;

    protected $table = "conta_corrente_lancamentos";
    protected $fillable = [
        'nota_fiscal', 'parcela', 'documento', 'tipo', 'valor', 'compensado',
        'cheque', 'enviado_em', 'retorno_em', 'assinado',
        'fornecedor_id', 'conta_corrente_id', 'tipo_conta_id'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    public function conta_corrente()
    {
        return $this->belongsTo(ContaCorrente::class, 'conta_corrente_id');
    }

    public function tipo_conta()
    {
        return $this->belongsTo(Tipo::class, 'tipo_conta_id');
    }
}