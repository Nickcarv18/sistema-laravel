<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $primarykey = 'idcategoria';

    public $timestamps = false;

    protected $fillable = [
        'nome', 'descricao', 'condicao'
    ];

}
