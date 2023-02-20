<?php 
    include 'conn/connect.php';

    // Inserir o Registro do usuario no banco
    if($_POST){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $insereregistro = "INSERT INTO tbusuarios (login_usuario, senha_usuario, nivel_usuario) VALUES ('$cpf','$senha', 'com');";
        $resultadoRegistro = $conn->query($insereregistro);

    // Fim registro do usuario
    } 

    // Inserir o Registro do usuario no banco na tabela de cliente
    if($_POST){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $inserecliente = "INSERT INTO tbclientes (nome, cpf, email) VALUES ('$nome','$cpf', '$email');";
        $resultadocliente = $conn->query($inserecliente);
    
    // Fim registro do usuario
    }     
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body class="fundocadastro">
    <?php include 'menu_publico.php'; ?>

    <main class="container">

        <div>
            <section>
                <article>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            <h1 class="breadcrumb text-danger text-center">Faça seu Registro</h1>
                            <div class="thumbnail">
                            <br>
                                <div class="alert alert-danger" role="alert">
                                    <form action="reservado.php" name="reserva_login" id="reserva_login" method="POST" enctype="multipart/form-data">

                                        <label for="id">Nome Completo:</label>
                                        <p class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" name="nome" id="nome" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu Nome." maxlength="50">
                                        </p>

                                        <label for="cpf">CPF:</label>
                                        <p class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" name="cpf"  class="form-control" required placeholder="Digite seu CPF." maxlength="11">
                                        </p>

                                        <label for="email">Email:</label>
                                        <p class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" name="email"  class="form-control" required placeholder="Digite seu Email.">
                                        </p>
                                        
                                        <label for="email">Senha:</label>
                                        <p class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" name="senha"  class="form-control" required placeholder="Digite sua Senha.">
                                        </p>
                                        <p class="text-center mt-3">
                                            <input type="submit" value="Registrar" class="btn btn-primary">
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

</script>
</html>