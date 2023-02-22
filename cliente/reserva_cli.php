<?php 
include '../admin/acesso_com.php';
include '../conn/connect.php';
?>
        <h2 class="breadcrumb alert-info texto-negrito"><strong>Suas Reservas</strong></h2>
        <table class="table table-hover table-condensed tb-opacidade bg-info"> 
            <thead>
                <th class="hidden">ID</th>
                <th>DATA DO PEDIDO</th>
                <th>N° PESSOAS</th>
                <th>STATUS</th>
            </thead>
            
            <tbody> <!-- início corpo da tabela -->
           	<!-- início estrutura repetição -->

                    <tr>
                        <td class="hidden">
                            <?php echo $row['id_pedido'];?>
                        </td>

                        <td>
                            <?php  echo $row['data_pedido'] ?> 
                        </td>

                        <td>
                            <?php echo $row['pessoas'];?>
                        </td>

                        <td>
                            <?php  echo $row['status'] ?> 
                        </td>
                       
                        <td>
                            <button 
                                data-nome="<?php echo $row['pessoas'];?>" 
                                data-id="<?php echo $row['id_pedido'];?>"
                                class="delete btn btn-xs btn-block btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                <span class="hidden-xs">Arquivar</span>
                            </button>
                        </td>
                    </tr>

       
            </tbody><!-- final corpo da tabela -->
        </table>



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