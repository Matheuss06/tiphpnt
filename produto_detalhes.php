<?php 
include 'conn/connect.php';
$idproduto = $_GET['id_produto'];
$lista = $conn->query("select * from vw_tbprodutos where id_produto like '%$idproduto%';");
$row_destaque =  $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Document</title>
</head>
<body class="fundofixo">
<?php include 'menu_publico.php'?>
    <div class="container">
    <h2 class="breadcrumb alert-danger">
                <strong> Detalhe do produto - <?php echo $row_destaque ['descri_produto']?></strong>
            </h2>
            <div>   
                    <div>

                        <div class="thumbnail">

                            <div class="flexx margin_img">

                                    <img src="images/<?php echo $row_destaque ['imagem_produto']?>" class="img-responsive w-500">

                                <div class="margin_txt">

                                    <h3 class="text-danger">
                                        <strong><?php echo $row_destaque ['descri_produto']?></strong>
                                    </h3>
                                    
                                    <p class="text-warning">
                                        <strong><?php echo $row_destaque ['rotulo_tipo']?></strong>
                                    </p>

                                    <p class="margin_top">
                                        <span class="texto" style="cursor: default">
                                                <?php echo "R$ ".number_format($row_destaque['valor_produto'],2,",",".");?>
                                        </span>
                                    </p>
                                </div>

                            </div>


                                <p class="text-left texto">
                                    <?php echo mb_strimwidth($row_destaque ['resumo_produto'],0,500,'...');?>
                                </p>

                                <!-- Botão voltar página -->
                                <div class="text-left">

                                    <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-chevron-left"> Voltar </span>
                                    </a>

                                </div>

                        </div>
                        
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