<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Reservas</title>
</head>
<body class="fundofixo">
    <?php include 'menu_publico.php'; ?>
<div class="container">

    <!-- Botão para voltar á página anterior -->
    <h2 class="breadcrumb alert-danger">
        <a href="javascript:window.history.go(-1)" class="btn btn-danger">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <strong> Regras da Reserva </strong>
    </h2>

    <!-- Regras da Reserva -->
    <div class="breadcrumb">
        <h5>• Para cadastrar uma reserva o tempo mínimo será 48 horas de antecedência</h5>
        <h5>• Apenas um pedido de reserva por dia para um mesmo cpf </h5>
        <h5>• A reserva pode ser feita em até 90 dias</h5>
        <h5>• Para efetuar a reserva o usuario deverá utilizar o nome completo, CPF e email</h5>

        <div class="flex-center mt-3">
            <a class="btn btn-danger" href="reservado.php">
                <span class="glyphicon glyphicon-pencil">&nbsp;RESERVAR</span>
            </a>
        </div>
    </div>
</div>
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

</html>