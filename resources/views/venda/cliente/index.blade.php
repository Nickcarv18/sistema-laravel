@extends('layouts.admin')

@section('conteudo')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista de Clientes 
                <a href="cliente/create"><button class="btn btn-success">Novo</button></a>
            </h3>
            @include('venda.cliente.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Tipo documento</th>
                        <th>Nº documento</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                    </thead>
                    @foreach ($pessoas as $pes)
                        <tr>
                            <td>{{ $pes->idpessoas }}</td>
                            <td>{{ $pes->nome }}</td>
                            <td>{{ $pes->tipo_documento }}</td>
                            <td>{{ $pes->numero_doc }}</td>
                            <td>{{ $pes->endereco}}</td>
                            <td>{{ $pes->telefone }}</td>
                            <td>{{ $pes->email }}</td>
                            <td>
                                <a href="{{ route('cliente.edit', $pes->idpessoas)}}"><button class="btn btn-info">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{ $pes->idpessoas }}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
                            </td>
                        </tr>
                        @include('venda.cliente.modal')
                    @endforeach
                </table>
            </div>
            {{ $pessoas->render()}}
        </div>
    </div>
@endsection