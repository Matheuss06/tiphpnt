<?php 
include 'acesso_com.php';
include '../conn/connect.php';
$lista = $conn->query("select * from tbpedido_reserva");
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;
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
<body class="fundofixo"> 
    <?php include "menu_adm.php"; ?>
    <main class="container">
        <h2 class="breadcrumb alert-success" >Lista de Reservas </h2>
        <table class="table table-hover table-condensed tb-opacidade bg-success"> 
            <thead>
                <th class="hidden">ID</th>
                <th>N° PESSOAS</th>
                <th>DATA DO PEDIDO</th>
                <th>STATUS</th>
            </thead>
            
            <tbody> <!-- início corpo da tabela -->
           	<!-- início estrutura repetição -->
                <?php do{?>
                    <tr>
                        <td class="hidden">
                            <?php echo $row['id_pedido'];?>
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
                            <button class="info btn btn-warning btn-block btn-xs"> 
                                <span class="glyphicon glyphicon-plus"></span>
                                <span class="hidden-xs">INFORMAÇÕES</span>
                            </button>
                            <button 
                                data-nome="<?php echo $row['pessoas'];?>" 
                                data-id="<?php echo $row['id_pedido'];?>"
                                class="delete btn btn-xs btn-block btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                <span class="hidden-xs">Arquivar</span>
                            </button>
                        </td>
                    </tr>
                    <?php }while($row = $lista->fetch_assoc());?>
       
            </tbody><!-- final corpo da tabela -->
        </table>
    </main>
    <!-- inicio do modal para excluir... -->
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

        <!-- inicio do modal de informações... -->
        <div class="modal fade" id="modalinfo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="font-weight: bold;">Informações do Cliente</h4>
                </div>
                <div class="modal-body">
                    
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-success">
                        Confirmar
                    </a>
                    <button class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
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

<script type="text/javascript">
    $('.info').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('#modalinfo').modal('show'); // chamar o modal
    });
</script>

</html>