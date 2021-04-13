@extends('Painel.Layout.index')

@section('content')
    <section class="content">
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-warning">
                      <div class="card-header">
                        <h3 class="card-title">Alterar Agricultor</h3>
                      </div>
                      <form role="form" method="POST" action="/Painel/Agricultores/edit/{{$agricultor['id']}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input value="{{ $agricultor['nome']}}" type="text" class="form-control" id="nome" name="nome" required>
                            </div>

                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input value="{{ $agricultor['cpf']}}" type="text" class="form-control" id="cpf" name="cpf" required>
                            </div>

                            <div class="form-group">
                                <label for="cadpro">CadPro</label>
                                <input value="{{ $agricultor['cadpro']}}" type="text" class="form-control" id="cadpro" name="cadpro" required>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input value="{{ $agricultor['email']}}" type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input value="{{ $agricultor['telefone']}}" type="text" class="form-control" id="telefone" name="telefone" required>
                            </div>

                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input value="{{ $agricultor['senha']}}" type="password" class="form-control" id="senha" name="senha" required>
                            </div>

                        </div>
                        <div class="card-footer" style="text-align: center;">
                            <a href="{{ route('Painel.Agricultores.list')}}" class="btn btn-danger btn-md">Voltar</a>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
