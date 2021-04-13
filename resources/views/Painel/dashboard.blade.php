@extends('Painel.Layout.index')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Caixa de Insumos -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- Caixa de Insumos -->
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3>{{$totalInsumo}}</h3>
                            <h4>Insumos</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <a href="{{ route('Painel.Insumos.index')}}" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Caixa de Agricultores -->
                    <div class="small-box bg-gradient-warning">
                        <div class="inner">
                            <h3>{{$totalAgricultor}}</h3>
                            <h4>Agricultores</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('Painel.Agricultores.index')}}" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- Caixa de Técnicos -->
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3>{{$totalTecnico}}</h3>
                            <h4>Técnicos</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="{{ route('Painel.Tecnicos.index')}}" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /Caixa -->
        </div>
    </section>
@endsection

