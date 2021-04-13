@extends('Painel.Layout.index')

@section('content')
    <section class="content">
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Cadastrar Técnico</h3>
                      </div>
                      <form role="form" method="POST" action="{{ route('Painel.Tecnicos.store') }}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="cpf" id="cpf" maxlength="14" placeholder="___.___.___-__" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="crea">Crea</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="crea" id="crea" placeholder=" " required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="telefone" name="telefone" maxlength="15" placeholder="(__) _____-____" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                                    </div>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer" style="text-align: center;">
                            <a href="{{ route('Painel.Tecnicos.list')}}" class="btn btn-danger btn-md">Voltar</a>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
