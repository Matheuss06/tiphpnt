<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if($_POST){ 

    $id_usuario = $_POST['id_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = md5($_POST ['senha_usuario']);
    $nivel_usuario = $_POST['nivel_usuario'];

    $id = $_POST['id_usuario'];
    
    $updateSql = "update tbusuarios
                  set id_usuario = '$id_usuario',
                  login_usuario = '$login_usuario',
                  senha_usuario = '$senha_usuario',
                  nivel_usuario = '$nivel_usuario'
                  where id_usuario = $id;";

    $resultado = $conn->query($updateSql);
    if($resultado){
        header('location: usuarios_lista.php');
    }
}



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Usuarios - insere</title>
</head>
<body>
    <?php include 'menu_adm.php';?>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-primary">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Alterando o Usuario
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-primary" role="alert">
                        <form action="usuario_atualiza.php" method="post" name="form_usuario_insere" enctype="multipart/form-data" id="form_usuario_insere" value="<?php echo $row['id_usuario']?>">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row['id_usuario']?>">
                            <label for="id_usuario">Login:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>

                                <input type="text" name="id_usuario" id="id_usuario" class="form-control" placeholder="Digite o tipo do produto" maxlength="100" required value="<?php echo $row['id_usuario']?>">
                            </div>

                            <label for="sigla_tipo">Sigla:</label>     
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="sigla_tipo" id="sigla_tipo" class="form-control" placeholder="Digite a descrição do produto" maxlength="3" required value="<?php echo $row['sigla_tipo']?>">
                            </div>
                    

                            <hr>
                            <input type="submit" id="atualizar" name="atualizar" class="btn btn-danger btn-block" value="Atualizar">
                        
                        </form>
                    </div>
                </div>
            </div>
         </div>
    </main>

</body>
</html>