@extends('Painel.Layout.index')

@section('content')
    <section class="content">
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">Cadastrar Insumo</h3>
                      </div>
                      <form role="form" method="POST" action="{{ route('Painel.Insumos.store') }}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input  type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
                            </div>

                            <div class="form-group">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" required>
                            </div>

                        </div>
                        <div class="card-footer" style="text-align: center;">
                            <a href="{{ route('Painel.Insumos.list')}}" class="btn btn-danger btn-md">Voltar</a>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
