
<?php 
	include_once "menu.php";
	include_once "fatura.php";


    $fatura = new controle();	
	//$fatura->ctrId = $_GET['id'];


	if(!empty($_GET['id'])){
		$fatura->ctrId = $_GET['id'];
		$fatura->carregarDados();		
	}else if(isset($_POST['id'])){
		$fatura->ctrId = $_POST['id'];		
	}if(!empty($_GET['operadora'])){
		$fatura->operadora = $_GET['operadora'];
	}
	


	
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
                    <?php echo !empty($fatura->crsId) ? "Alterar Cliente" : "Cadastrar Cliente";?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
					       <form role="form" id="formcadastrar" action="fatura-salvar.php" method="post">
					            <div class="form-group">
					                <input type="hidden" class="form-control" name="ctrId" id="ctrId" value="<?php echo $fatura->ctrId; ?>">
					            </div>
					            
					            <div class="form-group">
					                <label for="crsDescricao">Nome</label>					                
					                <input type="text" class="form-control obrigatorio" name="ctrNome" id="ctrNome" placeholder="Nome Do Cliente" value="<?php echo $fatura->ctrNome; ?>">
					                <span class='msg-crsDescricao'></span>
					            </div>
					            <div class="form-group">					           
					                <label for="crsDuracao">Prazo</label>
					                <input type="number" class="form-control obrigatorio" name="ctrPrazo" id="ctrPrazo" placeholder="Qual o Dia Maximo de Entrega" value="<?php echo $fatura->ctrPrazo; ?>">
					                <span class='msg-crsDuracao'></span>
					            </div>
								<?php if (!empty($fatura->ctrId)) { ?>
					            <div class="form-group">					           
					                <label for="ctrStatus">Status</label>
					                <select class="form-control" name="ctrStatus" id="ctrStatus">
                                    		<option value="1">Entregue</option>
                                    		<option value="0">Pendente</option>
									</select>
					            </div>
					            <?php } ?>
					            <div class="form-group">
                                        <label for="ctrOperadora">Operadora</label>
                                    	<select class="form-control" name="ctrOperadora" id="ctrOperadora">
                                    		<option value="Vivo">Vivo</option>
                                    		<option value="Tim">Tim</option>			
                                    		<option value="Claro">Claro</option>			
                                    		<option value="Oi">Oi</option>											
                                    		<option value="Telemar">Telemar</option>											
                                    		<option value="Oi Fixo">Oi Fixo</option>											
                                    		<option value="IPSOLU">IPSO</option>											
                                    													
									    </select>
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

<script type="text/javascript" src="../js/js-validacao-generica.js"></script>


