<?php 
// Tabela de Pedido de Reservas
include 'acesso_com.php';
include '../conn/connect.php';

if($_GET){
    $id = $_GET['id_clientes'];
}else{
    $id_form = 0;
}
$lista = $conn->query("select * from tbclientes where id_cliente = $id");
$row = $lista->fetch_assoc();
$numRows = $lista->num_rows;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Informações - <?php echo $row['nome'];?></title>
</head>
<body class="fundoadm">
    <?php include 'menu_adm.php';?>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
                <h2 class="breadcrumb">
                    <a href="reservas_lista.php">
                        <button class="btn btn-info">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Informações do Cliente - <?php echo $row['nome'];?>
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-info" role="alert">
                    
                        <input type="hidden" name="id_pedido" id="id_pedido" value="<?php echo $row['id_cliente']?>">

                        <label>Nome Completo:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                                <fieldset disabled>
                                <input type="" name="nome" id="nome" class="form-control disabled" value="<?php echo $row['nome']?>">
                        </div>

                        <hr>

                        <label for="cpf">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <fieldset disabled>
                                <input type="" name="cpf" id="cpf" class="form-control disabled" value="<?php echo $row['cpf']?>">
                            </div>
                    
                            <hr>

                            <label for="email">Email:</label>
                            <div class="input-group"> 
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                <fieldset disabled>
                                <input type="" name="email" id="email" class="form-control disabled" value="<?php echo $row['email']?>">
                            </div>
                    
                            <hr>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
