<?php 
    include_once 'menu.php';
    include_once 'fatura.php';

    $id = "";
    $cliente ="";
	$descricao = "";
	

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	if(isset($_GET['descricao'])){
		$descricao = $_GET['descricao'];
	}
	if(isset($_GET['cliente'])){
		$cliente = $_GET['cliente'];
	}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php if(!empty($id)) echo "Alteração"; else echo "Cadastro";?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if(!empty($id)) echo "Alterar Cliente"; else echo "Cadastrar Cliente";?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
					       <form role="form" id="formcadastrar" action="curso-salvar.php" method="post">
					            <div class="form-group">
					                <input type="hidden" class="form-control" name="crsId" id="crsId" value="<?php if(!empty($id)) echo $id; ?>">
					            </div>
					            
					            <div class="form-group">
					                <label for="crsDescricao">Cliente</label>
					                <input type="text" class="form-control obrigatorio" name="crsDescricao" id="crsDescricao" placeholder="Informe a descrição do curso" value="<?php if(!empty($descricao)) echo $descricao; ?>">
					                <span class='msg-crsDescricao'></span>
					            </div>
					            <div class="form-group">
					                <label for="crsDuracao">Duração (horas)</label>
					                <input type="number" class="form-control obrigatorio" name="crsDuracao" id="crsDuracao" placeholder="Informe a duração do curso em horas" value="<?php echo $duracao; ?>">
					                <span class='msg-crsDuracao'></span>
					            </div>
                                <button type="submit" class="btn btn-primary" id="botao-salvar">Salvar</button>
                                <button type="reset" class="btn btn-default">Limpar</button>
					        </form>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--<script type="text/javascript" src="../js/curso/curso-valida.js"></script>-->
<!--<script src="../js/curso/cadastrar.js" type="text/javascript"></script>-->
<script type="text/javascript" src="../js/js-validacao-generica.js"></script>
<script>

	//$(document).ready(function($) {
	//	cursocadastrar.Init();
	//});
</script>
