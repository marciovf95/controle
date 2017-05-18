
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
					$fatura = new Controle();
					try{ 
						if($fatura->reset()){
							?>
							<script>
								swal("Reset feito com sucesso!", "", "success");
								window.setTimeout("location.href='../pages/fatura-listar.php'",1500);
							</script>
							<?php //header("location: ..\pages\fatura-listar.php");
						}
					}catch(Exception $e){
						echo "<h1>Erro: ".$e->getMessage()."</h1>"; 
					}	 
				
			?>
        </div>
    </div>
</div>

