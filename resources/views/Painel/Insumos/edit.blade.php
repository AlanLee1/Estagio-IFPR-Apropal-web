@extends('Painel.Layout.index')

@section('content')
    <section class="content">
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">Alterar Insumo</h3>
                      </div>
                      <form role="form" method="POST" action="/Painel/Insumos/edit/{{$insumo['id']}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input value="{{ $insumo['descricao']}}" type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
                            </div>

                            <div class="form-group">
                                <label for="quantidade">Quantidade</label>
                                <input value="{{ $insumo['quantidade']}}" type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" required>
                            </div>

                        </div>
                        <div class="card-footer" style="text-align: center;">
                            <a href="{{ route('Painel.Insumos.list')}}" class="btn btn-danger btn-md">Voltar</a>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
