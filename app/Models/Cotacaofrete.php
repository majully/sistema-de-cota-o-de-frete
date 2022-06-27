<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacaofrete extends Model
{
    use HasFactory;

    protected $table = "cotacao_frete";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uf',
        'percentual_cotacao',
        'valor_extra',
        'transportadora_id'
    ];
    
}
