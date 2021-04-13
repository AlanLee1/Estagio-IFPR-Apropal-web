@extends('Painel.Layout.index')

@section('content')
    <section class="content">
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Alterar Técnico</h3>
                      </div>
                      <form role="form" method="POST" action="/Painel/Tecnicos/edit/{{$tecnico['id']}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input value="{{ $tecnico['nome']}}" type="text" class="form-control" id="nome" name="nome" required>
                            </div>

                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input value="{{ $tecnico['cpf']}}" type="text" class="form-control" id="cpf" name="cpf" required>
                            </div>

                            <div class="form-group">
                                <label for="crea">Creas</label>
                                <input value="{{ $tecnico['crea']}}" type="text" class="form-control" id="crea" name="crea" required>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input value="{{ $tecnico['email']}}" type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input value="{{ $tecnico['telefone']}}" type="text" class="form-control" id="telefone" name="telefone" required>
                            </div>

                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input value="{{ $tecnico['senha']}}" type="password" class="form-control" id="senha" name="senha" required>
                            </div>

                        </div>
                        <div class="card-footer" style="text-align: center;">
                            <a href="{{ route('Painel.Tecnicos.list')}}" class="btn btn-danger btn-md">Voltar</a>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
