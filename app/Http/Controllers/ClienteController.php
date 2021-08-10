<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaFormRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('searchText'));
            $pessoas = DB::table('pessoa')
                    ->where('nome', 'LIKE', '%' .$query. '%')
                    ->where('tipo_pessoa', '=', 'Cliente')
                    ->orWhere('numero_doc', 'LIKE', '%' .$query. '%')
                    ->where('tipo_pessoa', '=', 'Cliente')
                    ->orderBy('idpessoas', 'desc')
                    ->paginate(7);

            return view('venda.cliente.index', [
                'pessoas' => $pessoas, 'searchText' => $query
            ]);
        }
    }

    public function create()
    {
        return view('venda.cliente.create');
    }

    public function store(PessoaFormRequest $request)
    {
        $pessoa = new Pessoa();

        $pessoa->nome= $request->get('nome');
        $pessoa->tipo_documento= $request->get('tipo_documento');
        $pessoa->numero_doc = $request->get('numero_doc');
        $pessoa->endereco = $request->get('endereco');
        $pessoa->telefone = $request->get('telefone');
        $pessoa->email = $request->get('email');
        $pessoa->tipo_pessoa = 'Cliente';

        $pessoa->save();

        return Redirect::to('venda/cliente');
    }

    public function show($id)
    {
        return view("venda.cliente.show", 
            ["pessoa" => Pessoa::findOrFail($id)]
        );
    }

    public function edit($id)
    {
        return view("venda.cliente.edit", 
            ["pessoa" => Pessoa::findOrFail($id)]
        );
    }

    public function update(pessoaFormRequest $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);

        $pessoa->nome = $request->get('nome');
        $pessoa->tipo_documento = $request->get('tipo_documento');
        $pessoa->numero_doc = $request->get('numero_doc');
        $pessoa->endereco = $request->get('endereco');
        $pessoa->telefone = $request->get('telefone');
        $pessoa->email = $request->get('email');
        $pessoa->tipo_pessoa = 'Cliente';

        $pessoa->update();

        return Redirect::to('venda/cliente');
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        
        $pessoa->tipo_pessoa = 'Inativo';

        $pessoa->update();

        return Redirect::to('venda/cliente');
    }
}
