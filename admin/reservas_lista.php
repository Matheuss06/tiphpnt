<?php 
// Tabela de Pedido de Reservas
include 'acesso_com.php';
include '../conn/connect.php';

$lista = $conn->query("select id_pedido, id_clientes, pessoas, data_pedido, status, nome, cpf, email, mesa, hash_code
from tbpedido_reserva inner join tbclientes
ON tbpedido_reserva.id_clientes = tbclientes.id_cliente");
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;

if(isset($_GET['id_pedido'])){
    $lista = $conn->query("update tbpedido_reserva set status = 'Recusado' where id_pedido = ".$_GET['id_pedido'].";");
header('location: reservas_lista.php');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body class="fundoadm"> 
    <?php include "menu_adm.php"; ?>
    <main class="container">
        <h2 class="breadcrumb alert-info" >Lista de Reservas </h2>
        <table class="table table-hover table-condensed tb-opacidade bg-info"> 
            <thead>
                <th class="hidden">ID</th>
                <th>CÓDIGO DA RESERVA</th>
                <th>N° PESSOAS</th>
                <th>DATA DO PEDIDO</th>
                <th>STATUS</th>
                <th>MESA</th>
            </thead>
            
            <tbody> <!-- início corpo da tabela -->
           	<!-- início estrutura repetição -->
                <?php do{?>
                    <tr>
                        <td class="hidden">
                            <?php echo $row['id_pedido'];?>
                        </td>

                        <td>
                            <?php echo $row['hash_code'];?>
                        </td>

                        <td>
                            <?php echo $row['pessoas'];?>
                        </td>
                        
                        <td>
                            <?php  echo $row['data_pedido'] ?> 
                        </td>

                        <td>
                            <?php  echo $row['status'] ?> 
                        </td>

                        <td>
                            <?php echo $row['mesa'] ?>
                        </td>
                       
                        <td>
                        
                            <a href="reservas_info.php?id_clientes=<?php echo $row['id_clientes']?>" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                                <span class="glyphicon glyphicon-plus"></span>
                                <span class="hidden-xs">INFORMAÇÕES</span>
                            </a> 
                                
                            <?php if ($row['status'] == 'Cancelado' | $row['status'] == 'Confirmado' | $row['status'] == 'Recusado'){ ?>
                            <a class="btn btn-block btn-danger btn-xs" role="button" disabled>
                                <span class="glyphicon glyphicon-cog"></span>
                                <span class="hidden-xs">CONCLUIR</span>
                            </a>

                            <a class="btn btn-block btn-danger btn-xs" role="button" disabled>
                                <span class="glyphicon glyphicon-cog"></span>
                                <span class="hidden-xs">RECUSAR</span>
                            </a>
                            <?php }else{ ?>

                            <a href="reservas_concluir.php?id_pedido=<?php echo $row['id_pedido']?>" class="btn btn-block btn-success btn-xs" role="button">
                                <span class="glyphicon glyphicon-cog"></span>
                                <span class="hidden-xs">CONCLUIR</span>
                            </a>

                            <a href="reservas_lista.php?id_pedido=<?php echo $row['id_pedido']?>" class="btn btn-block btn-danger btn-xs" role="button">
                                <span class="glyphicon glyphicon-cog"></span>
                                <span class="hidden-xs">RECUSAR</span>
                            </a>
                            <?php };?>
                        </td>
                    </tr>
                    <?php }while($row = $lista->fetch_assoc());?>
       
            </tbody><!-- final corpo da tabela -->
        </table>
    </main>



    <!-- inicio do modal para excluir -->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo excluir o item?
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-success delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- fim do modal para excluir -->


<!-- inicio do modal de Excluir -->

</div>  

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','usuario_excluir.php?id_usuario='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>
</html>