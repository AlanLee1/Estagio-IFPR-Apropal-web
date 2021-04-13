@extends('Painel.Layout.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Caixa de Incidentes -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- Caixa de Incidentes -->
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3 class="invisible">0</h3>
                            <h4>Lista</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list-alt"></i>
                        </div>
                        <a href="{{ route('Painel.Tecnicos.list')}}" class="small-box-footer">Acessar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Caixa de Relatório -->
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3 class="invisible">0</h3>
                            <h4>Relatório</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file"></i>
                        </div>
                        <a href="#" class="small-box-footer">Gerar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Caixa -->
        </div>
    </section>
@endsection
