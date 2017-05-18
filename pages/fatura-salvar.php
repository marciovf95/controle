
<?php //include_once 'menu.php'; 
	
    include_once 'menu.php';
    require_once 'fatura.php';

 ?>
<!--Alert Top Cheio de Viadagem mais e Top--> 
<script src="../sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../sweetalert-master/dist/sweetalert.css">  

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
			<?php

				/* VERIFICO SE HOUVE UM POST */
				if(count($_POST) > 0) {
					$fatura = new Controle();

					if(isset($_POST["ctrId"])){
						$fatura->ctrId = $_POST["ctrId"];
					}
					if(isset($_POST["ctrNome"])){
						$fatura->ctrNome = $_POST["ctrNome"];
					}
					if(isset($_POST["ctrStatus"])){
						$fatura->ctrStatus = $_POST["ctrStatus"];	
					}
					if(isset($_POST["ctrPrazo"])){
						$fatura->ctrPrazo = $_POST["ctrPrazo"];	
					}						
					if(isset($_POST["ctrOperadora"])){
						$fatura->ctrOperadora = $_POST["ctrOperadora"];	
					}

					if(empty($fatura->ctrNome) || empty($fatura->ctrPrazo)|| empty($fatura->ctrOperadora)){
	header('location: ..\pages\fatura-cadastro.php?id='.$fatura->ctId.'&nome='.$fatura->ctrNome.'&prazo='.$fatura->ctrPrazo.'&ctrOperadora='.$fatura->ctrOperadora);
						die;
					}		

					try{ 	

					var_dump($fatura);			 			

						if($fatura->salvar()){
							?>
							<script>
								swal("Dados salvos com sucesso!", "", "success");
								window.setTimeout("location.href='../pages/fatura-listar.php'",1500);
							</script>
							<?php //header("location: ..\pages\fatura-listar.php");
						}else{
							header('location: ..\pages\fatura-cadastro.php?id='.$fatura->ctrId.'&Nome='.$fatura->ctrNome.'&Status='.$fatura->ctrStatus.'&Operadora='.$fatura->ctrOperadora.'&Prazo='.$fatura->ctrPrazo);
						}
					}catch(Exception $e){
						echo "<h1>Erro: ".$e->getMessage()."</h1>"; 
					}	 
				}
			?>
        </div>
    </div>
</div>

