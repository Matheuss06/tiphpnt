<?php
include '../conn/connect.php';

$cliente = $_GET['cliente'];

$lista = $conn->query("select * from vw_tbpedidos where cpf like '%$cliente%';");
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/estilo.css">
   <title>Área do cliente - <?php echo $row['nome']; ?></title>
</head>
<body class="fundofixo container">  



   <h2 class="breadcrumb">
      <a href="../index.php" class="btn btn-info">
         <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      Olá, <strong><?php echo $row['nome']; ?></strong>!
   </h2>

      
   <?php include 'reserva_cli.php'; ?>
</body>
</html>
