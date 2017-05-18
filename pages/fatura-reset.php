
<?php 
	include_once "menu.php";
	include_once "fatura.php";
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo !empty($fatura->ctrId) ? "Alteração" : "Cadastro";?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo !empty($fatura->crsId) ? "Alterar Cliente" : "Resetar Status dos Clientes";?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
					       <form role="form" id="formcadastrar" action="reset.php" method="post">
					            <button type="submit" class="btn btn-primary" id="botao-salvar">Resetar</button>
                                
					        </form>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../js/js-validacao-generica.js"></script>

<script>

	//$(document).ready(function($) {
	//	faturacadastrar.Init();
	//});
	$(document).ready(function($) {
		//$("#crsDuracao").number();
	});
</script>
