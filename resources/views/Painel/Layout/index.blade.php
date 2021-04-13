<!DOCTYPE html>
<html>
    <!-- Cabeça -->
    @includeIf('Painel.Layout.head')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Cabeçalho -->
            @includeIf('Painel.Layout.header')

            <!-- Barra de menu lateral esquerda-->
            @includeIf('Painel.Layout.sidebar_lateral')

            <!-- Conteudo da pagina -->
            <div class="content-wrapper">

                <!-- Cabeçalho do conteudo -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                            {{-- botão voltar --}}
                            <div class="col-sm-5">
                                @if(isset($urlAnterior2))
                                        <a href="/Painel/{{ $urlAnterior2}}/{{ $urlAnterior }}">Voltar</a>
                                    @elseif(isset($urlAnterior))
                                        <a href="/Painel/{{ $urlAnterior}}">Voltar</a>
                                    @elseif(isset($urlAtual))
                                        <a href="/Painel/{{ $urlAnterior ?? '' }}">Voltar</a>
                                    @else

                                    @endif
                            </div>

                            {{-- Titulo --}}
                            <div class="col-sm-3">
                                <h1 class="m-0 text-dark">
                                    @if(isset($urlAtual))
                                        @if( $urlAtual == 'list')
                                            Lista
                                        @elseif($urlAtual == 'create')
                                            Cadastrar
                                        @elseif($urlAtual == 'edit')
                                            Editar
                                        @elseif($urlAtual == 'relatorio')
                                            Relatório
                                        @elseif($urlAtual == 'mapa')
                                            Mapa
                                        @elseif($urlAtual == 'graficos')
                                            Gráficos
                                        @else
                                            {{ $urlAtual }}
                                        @endif
                                    @else
                                        Painel de Controle
                                    @endif
                                </h1>
                            </div>

                            {{-- breadcrumbs - hierarquia de navegação --}}
                            <div class="col-sm-4">
                                <ol class="breadcrumb float-sm-right">

                                    {{-- MENU DE NAVEGAÇÃO 1 --}}
                                    <li class="breadcrumb-item"><a href="{{ route('Painel.index')}}">Painel</a></li>

                                    @if(isset($urlAnterior2))
                                        {{-- MENU DE NAVEGAÇÃO 2 e 3 --}}
                                        <li class="breadcrumb-item"><a href="/Painel/{{ $urlAnterior2 }}">{{ $urlAnterior2 }}</a></li>
                                        <li class="breadcrumb-item"><a href="/Painel/{{ $urlAnterior2 }}/{{ $urlAnterior }}">Lista</a></li>
                                    @elseif(isset($urlAnterior))
                                        {{-- MENU DE NAVEGAÇÃO 2 --}}
                                        <li class="breadcrumb-item"><a href="/Painel/{{ $urlAnterior }}">{{ $urlAnterior }}</a></li>
                                    @else
                                    @endif

                                    {{-- MENU DE NAVEGAÇÃO 4 --}}
                                    @if(isset($urlAtual))
                                        <li class="breadcrumb-item">
                                            @if( $urlAtual == 'list')
                                                Lista
                                            @elseif($urlAtual == 'create')
                                                Cadastrar
                                            @elseif($urlAtual == 'edit')
                                                Editar
                                            @elseif($urlAtual == 'mapa')
                                                Mapa
                                            @elseif($urlAtual == 'graficos')
                                                Gráficos
                                            @else
                                                {{ $urlAtual ?? '' }}
                                            @endif
                                        </li>
                                    @else

                                    @endif
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Conteudo -->
                @yield('content')

            </div>

            <!-- Rodapé -->
            @includeIf('Painel.Layout.footer')

            <!-- SIDEBAR DIREITO -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.SIDEBAR DIREITO -->

        </div>

        <!-- JavaScript-->
        @includeIf('Painel.Layout.javascript')
    </body>
</html>
