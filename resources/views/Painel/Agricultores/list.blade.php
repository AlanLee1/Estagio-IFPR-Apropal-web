@extends('Painel.Layout.index')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group" style="text-align: center;">
                            <a href="{{route('Painel.Agricultores.create')}}">
                                <button id="btn-salvar" type="button" class="btn btn-success btn-rounded w-md">
                                    Novo
                                </button>
                            </a>
                        </div>
                        <h3 class="card-title">Tabela de Agricultores</h3>

                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Busca">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CadPro</th>
                            <th>Telefone</th>
                            <th style="text-align: center">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_agricultor as $agricultor)
                                <tr>
                                    <td>{{$agricultor['id']}}</td>
                                    <td>{{$agricultor['nome']}}</td>
                                    <td>{{$agricultor['cadpro']}}</td>
                                    <td>{{$agricultor['telefone']}}</td>
                                    <td style="text-align: center">
                                        <a href="/Painel/Agricultores/list/edit/{{ $agricultor['id'] }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a class="btn">
                                            <form role="form" method="POST" action="/Painel/Agricultores/destroy/{{$agricultor['id']}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
