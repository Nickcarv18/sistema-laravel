@extends('layouts.admin')

@section('conteudo')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Cliente: {{ $pessoa->nome}}</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!!Form::model($pessoa, ['method'=>'PATCH', 'route'=>['cliente.update', $pessoa->idpessoas]])!!}
              {!!Form::token()!!}

              <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" value="{{ $pessoa->nome }}">
                    </div>
                </div>
        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="tipo_documento">Tipo Documento</label>
                       <select name="tipo_documento" class="form-control">
                            <option value="{{ $pessoa->tipo_documento }}">{{ $pessoa->tipo_documento }}</option>
                            <option value="CPF">CPF</option>
                            <option value="RG">RG</option>
                       </select>
                    </div>
                </div>
        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="numero_doc">Número do Documento</label>
                        <input type="text" name="numero_doc" class="form-control" value="{{ $pessoa->numero_doc }}">
                    </div>
                </div>
        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" class="form-control" value="{{ $pessoa->endereco }}">
                    </div>
                </div>
        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control" value="{{ $pessoa->telefone }}">
                    </div>
                </div>
        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" class="form-control" value="{{ $pessoa->email }}">
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection