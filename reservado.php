<?php 
    include 'conn/connect.php';
    // Iniciar a verificação do login
    if($_POST){
        $nome_user = $_POST['nome'];
        $senha_user = md5($_POST['senha_usuario']);
        $loginRes = $conn->query("select * from tbclientes where nome = '$nome_user' and senha_usuario = '$senha_user';");
        $rowLogin = $loginRes->fetch_assoc();
        $numRow = mysqli_num_rows($loginRes);

        // Se a sessão não existir
        if(!isset($_SESSION)){
            $sessaoAntiga = session_name('chulettaaa');
            session_start();
            $session_name_new = session_name();
        }
        if($numRow>0){
            $_SESSION['login_usuario'] = $login;
            $_SESSION['nivel_usuario'] = $rowLogin['nivel_usuario'];
            $_SESSION['nome_da_sessao'] = session_name();
            if($rowLogin['nivel_usuario']=='sup'){
                echo "<script>window.open('index.php','_self')</script>";
            }
            else{
                echo "<script>window.open('../cliente/index.php?cliente=".$login."','_self')</script>";
            }
        }else{
            echo "<script>window.open('invasor.php','_self')</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Mesa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body class="fundocadastro">
    <?php include 'menu_publico.php'; ?>

    <main ng-app="App" ng-controller="Controlador" class="container">
        <section style="margin-top: 15%;">
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        <h1 class="breadcrumb text-danger text-center">Faça seu login</h1>
                        <div class="thumbnail">
                           <br>
                            <div class="alert alert-danger" role="alert">
                                <form action="reservado.php" name="reserva_login" id="reserva_login" method="POST" enctype="multipart/form-data">
                                    <label for="login_usuario">Email:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="login_usuario" id="login_usuario" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
                                    </p>
                                    <label for="senha_usuario">Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" required autocomplete="off" placeholder="Digite seu CPF.">
                                    </p>
                                    <p class="text-right">
                                        <input type="submit" value="Entrar" class="btn btn-primary">
                                    </p>
                                </form>
                                <p class="text-center">
                                    <small>
                                        <br>
                                        <span ng-click="FuncaoRegistro()" class="link_registro">Não possui uma conta? Registre-se</span>
                                    </small>
                                </p>
                            </div><!-- fecha alert -->
                        </div><!-- fecha thumbnail -->
                    </div><!-- fecha dimensionamento -->
                </div><!-- fecha row -->
            </article>
        </section>

        <div ng-show="Registrar">
            <section>
                <article>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            <h1 class="breadcrumb text-danger text-center">Faça seu Registro</h1>
                            <div class="thumbnail">
                            <br>
                                <div class="alert alert-danger" role="alert">
                                    <form action="reservado.php" name="reserva_login" id="reserva_login" method="POST" enctype="multipart/form-data">
                                        <label for="login_usuario">Email:</label>
                                        <p class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" name="login_usuario" id="login_usuario" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
                                        </p>
                                        <label for="senha_usuario">Senha:</label>
                                        <p class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                            </span>
                                            <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" required autocomplete="off" placeholder="Digite seu CPF.">
                                        </p>
                                        <p class="text-right">
                                            <input type="submit" value="Entrar" class="btn btn-primary">
                                        </p>
                                    </form>
                                </div><!-- fecha alert -->
                            </div><!-- fecha thumbnail -->
                        </div><!-- fecha dimensionamento -->
                    </div><!-- fecha row -->
                </article>
            </section>
        </div>
    </main>







</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min-js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on('ready',function(){
        $(".regular").slick({
            dots: true,
            infinity: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick/slick.min.js"></script>

<script>
    var app = angular.module('App', []);
    app.controller ('Controlador', function($scope){
        $scope.Registrar = false;

        $scope.FuncaoRegistro = function(){
            $scope.Registrar = !$scope.Registrar;
        }
    })

</script>
</html>