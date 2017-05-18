<?php 
	//include_once 'menu.php';
	include_once '../conf/database.php';
	include_once '../conf/config.php'; 
?>

<script src="../sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../sweetalert-master/dist/sweetalert.css"> 

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
			<?php

				/* VERIFICO SE HOUVE UM POST */
				if(count($_POST) > 0 && $_POST["id"] > 0) {

			    	try{         
			 			
		 				$sql = "update tbCurso set Ativo = 0 where Id = ".addslashes($_POST["id"]);
			 			//echo $sql;
			            $excluiu = insere($sql);
						if($excluiu){
							?>
							<script>
								swal("Curso excluído com sucesso!", "", "success");
				        		window.setTimeout("location.href='../pages/curso-listar.php'",2000);
							</script>	
							<?php							
						}
    					//header("location: ..\pages\curso-listar.php");
    					
		            }catch(Exception $e){
						echo "<h1>Erro: ".$e->getMessage()."</h1>"; 
					}		 
				}
			?>
        </div>
    </div>
</div>

