<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if($_POST){ 

    $id_pedido = $_POST['id_pedido'];
    $status = $_POST['status'];
    $mesa = $_POST['mesa'];
    
    $update = "update tbpedido_reserva SET 
                mesa = '$mesa',
                status = 'Confirmado'
                WHERE id_pedido = $id_pedido;";

    $resultado = $conn->query($update);
    if($resultado){
        header('location: reservas_lista.php');
    }
}

if($_GET){
    $id = $_GET['id_pedido'];
}else{
    $id_form = 0;
}
$lista = $conn->query("select * from tbpedido_reserva where id_pedido = $id");
$row = $lista->fetch_assoc();
$numRows = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Confirmando Reserva</title>
</head>
<body class="fundoadm">
<?php include 'menu_adm.php';?>
<main class="container">
    
    <<div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-primary">
                    <a href="reservas_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Confirmando a Reserva
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-primary" role="alert">
                        <form action="reservas_concluir.php" method="post" name="form_reservas_atualiza" enctype="multipart/form-data" id="form_reservas_atualiza">
                            <input type="hidden" name="id_pedido" id="id_pedido" value="<?php echo $row['id_pedido']?>">


                            <div class="input-group">
                            <label for="mesa">Mesa:</label>
                                <input type="number" name="mesa" id="mesa" class="form-control" placeholder="Digite a mesa desejada" maxlength="100" required value="<?php echo $row['mesa']?>">
                            </div>

                            <div class="input-group">
                                <input type="hidden" name="id_clientes" id="id_clientes" class="form-control" placeholder="Digite o tipo do produto" maxlength="100" required value="<?php echo $row['id_clientes']?>">
                            </div>

                            <div class="input-group">
                                <input type="hidden" name="status" id="status" class="form-control" placeholder="Digite o tipo do produto" maxlength="100" required value="Confirmado">
                            </div>

                            <div class="input-group">
                                <input type="hidden" name="pessoas" id="pessoas" class="form-control" placeholder="Digite o tipo do produto" maxlength="100" required value="<?php echo $row['pessoas']?>">
                            </div>

                            <div class="input-group">
                                <input type="hidden" name="data_pedido" id="data_pedido" class="form-control" placeholder="Digite o tipo do produto" maxlength="100" required value="<?php echo $row['data_pedido']?>">
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