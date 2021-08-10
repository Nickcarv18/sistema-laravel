<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';

    protected $primaryKey = 'idpessoas';

    public $timestamps = false;

    protected $fillable = [
       'tipo_pessoa', 'nome', 'tipo_documento',	'numero_doc', 'endereco', 'telefone', 'email'	
    ];

    protected $guarded = [];
}
