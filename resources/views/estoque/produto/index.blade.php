@extends('layouts.admin')

@section('conteudo')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Lista de Produtos 
                <a href="produto/create"><button class="btn btn-success">Novo</button></a>
            </h3>
            @include('estoque.produto.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                      <th>Id</th>               
                      <th>Imagem</th>
                      <th>Nome</th>
                      <th>Codigo</th>
                      <th>Categoria</th>
                      <th>Estoque</th> 
                      <th>Descrição</th>                  
                      <th>Estado</th>                  
                      <th>Opções</th>                  
                    </thead>
                    @foreach ($produtos as $prod)
                        <tr>
                            <td>{{ $prod->idproduto }}</td>
                            <td>
                                <img src="{{asset('imagens/produtos/' . $prod->imagem)}}" alt="{{ $prod->nome }}" width="100px" height="100px" class="img-thumbnail">
                            </td>
                            <td>{{ $prod->nome }}</td>
                            <td>{{ $prod->codigo }}</td>
                            <td>{{ $prod->categoria }}</td>
                            <td>{{ $prod->estoque }}</td>
                            <td>{{ $prod->descricao }}</td>
                            <td>{{ $prod->estado }}</td>
                            <td>
                                <a href="{{ route('produto.edit', $prod->idproduto)}}"><button class="btn btn-info">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{ $prod->idproduto }}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
                            </td>
                        </tr>
                        @include('estoque.produto.modal')
                    @endforeach
                </table>
            </div>
            {{ $produtos->render()}}
        </div>
    </div>
@endsection