<?php 
include 'admin/acesso_com.php';
include 'conn/connect.php';

if($_POST){

    $id_pedido = $_POST['id_pedido'];
    $pessoas = $_POST['pessoas'];
    $data_pedido = $_POST ['data_pedido'];


    $inserepedido ="INSERT INTO tbpedido_reserva
                  (id_pedido, pessoas, data_pedido)
                  VALUES
                  ('$id_pedido','$pessoas','$data_pedido');
                  ";

    $resultado = $conn->query($inserepedido);

    // Após a gravação bem sucedida do produto, volta (Atualiza) lista

    if(mysqli_insert_id($conn)){
        header('location: registro_nome.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Reservar</title>
</head>
<body class="fundofixo">
    <?php include 'menu_publico.php';?>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb text-success">
                    <a href="reservas.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Fazer a Reserva
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-success" role="alert">
                        <form action="reservas.php" method="post" name="form_reservas" enctype="multipart/form-data" id="form_reservas">
                            <label for="id_pedido">NÚMERO DE PESSOAS:</label>
                            <select name="pessoas" id="pessoas" class="form-control" required>
                                    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>

                            </select>

                            <label for="data_pedido">DATA:</label>     
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="date" name="data_pedido" id="data_pedido" class="form-control" required>
                            </div>

                            <br>
                            <hr>
                            <input type="submit" id="enviar" name="enviar" class="btn btn-danger btn-block" value="Reservar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main> 
</body>
</html>
