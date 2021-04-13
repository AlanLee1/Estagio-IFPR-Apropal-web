<!DOCTYPE html>
<html>
    <!-- Cabeça -->
    @includeIf('Painel.Layout.head')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!------ Include the above in your HEAD tag ---------->

            <style>
                body {
                    margin: 0;
                    padding: 0;
                    background-color: #069e41;
                    height: 100vh;
                    }
                #login .container #login-row #login-column #login-box {
                    margin-top: 80px;
                    max-width: 600px;
                    height: 320px;
                    border: 1px solid #9C9C9C;
                    background-color: #EAEAEA;
                }
                #login .container #login-row #login-column #login-box #login-form {
                    padding: 20px;
                }
                #login .container #login-row #login-column #login-box #login-form #register-link {
                    margin-top: -85px;
                }
            </style>

            <body>
                <div id="login">
                    <h3 class="text-center text-white pt-5">APROPAL</h3>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">

                                    <form role="form" method="POST" action="{{ route('Autenticacao.logar') }}">
                                    @csrf
                                    @method('GET')
                                        <h3 class="text-center text-success">Login</h3>
                                        <div class="form-group">
                                            <label for="email" class="text-success">Usuário:</label><br>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="senha" class="text-success">Senha:</label><br>
                                            <input type="password" name="senha" id="senha" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ route('Autenticacao.registro')}}" class="text-success">Registrar-se</a>
                                            <div style="text-align: center;">
                                                <button class="btn btn-info btn-md" id="login">
                                                    Login
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </div>

        <!-- JavaScript-->
        @includeIf('Painel.Layout.javascript')
    </body>
</html>
