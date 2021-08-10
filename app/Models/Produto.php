<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';

    protected $primaryKey = 'idproduto';

    public $timestamps = false;

    protected $fillable = [
        'idcategoria', 'codigo', 'nome', 'estoque', 'descricao', 'imagem', 'estado'
    ];

    protected $guarded = [];
}
