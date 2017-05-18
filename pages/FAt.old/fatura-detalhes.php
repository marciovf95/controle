<!--Alert Top Cheio de Viadagem mais e Top--> 
<script src="../sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../sweetalert-master/dist/sweetalert.css"> 

<?php
	include_once "menu.php";
	include_once "../conf/database.php";
	include_once "../conf/config.php";
	include_once "../pages/modal-confirmar-exclusao.php";

	if(count($_GET) > 0 && $_GET['id'] <> ""){
		$sql = "SELECT * FROM sistema WHERE Id = ".$_GET['id'];
		//$sql = "SELECT * FROM sistema left Join operadora ON sistema.id = operaradora.idsistema WHERE sistema.Id = ".$_GET['id'];

		 $resultado = listar($sql);
		 $id;
         $cliente;
         $duracao;
         $situacao;
         $mes;
         $operadora;

		 if($resultado){
		 	while($row = $resultado->fetch_assoc()){

                $id = $row["id"];
                $cliente = $row["nome"];
                $duracao = $row["prazo"];
                $situacao = $row["status"];
                $mes = $row["mes"];
                $operadora = $row["nome"];
                               
		 	}
		 	?>
		 	<div id="page-wrapper">
			    <div class="row">
			        <div class="col-lg-12">
			            <h1 class="page-header">Detalhes</h1>
			        </div>
			        <!-- /.col-lg-12 -->
			    </div>
			    <!-- /.row -->
			    <div class="row">
			        <div class="col-lg-12">
			            <div class="panel panel-default">
			                <div class="panel-heading">
			                    Detalhes do Cliente
			                </div>
			                <div class="panel-body">
			                    <div class="row">
			                        <div class="col-lg-8">
								       <form action=<?php echo "\"fatura-excluir.php\" method=\"post\">"; ?>
								       		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
								            <div class="form-group">
								                <label>Nome: <?php echo isset($cliente) ? $cliente : ''; ?></label>
								            </div>
								            <div class="form-group">
								                <label>Dia Maximo de Entrega: <?php echo isset($duracao) ? $duracao : ''; ?></label>
								            </div>
								            <div class="form-group">
								                <label>Situação : <?php if ($situacao == 1) {
								                	echo("Ativo");
								                }else{
								                	echo "Inativo";
								                } ?></label>
								            </div>

			                                <button class=\"btn btn-primary edit\" type="submit" title=\"Editar\" onclick=\"javascript: location.href='fatura-cadastro.php?id=".$id."&cliente=".$cliente."&duracao=".$duracao."';\"><i class=\"glyphicon glyphicon-edit\" title=\"Editar\"></i></button>			                                

			                                <button class="btn btn-danger delete" type="submit" name="btn-excluir-curso" title="Excluir"><i class="glyphicon glyphicon-trash" title="Excluir"></i></button>
								        </form>
							        </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php 
		}
	}
?>

<script>
	$('button[name="btn-excluir-curso"]').on('click', function (e) {
        var $form = $(this).closest('form');
        e.preventDefault();
        //$('#confirm').modal({
        //    backdrop: 'static',
        //    keyboard: false
        //})
        //  .one('click', '#btn-confirmar-exclusao', function (e) {
        //      $form.trigger('submit');
        //  });

        swal({
			  title: "Deseja excluir o Cliente ?",
			  text: "Clique em Excluir para confirmar ou em Cancelar para cancelar!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Excluir",
			  cancelButtonText: "Cancelar",
			  closeOnConfirm: false
			},
			function(){
				$form.trigger('submit');
			});
    });
</script>

