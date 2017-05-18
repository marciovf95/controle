<?php //include_once 'menu.php'; 
	 include_once '../conf/database.php'; 
	 include_once '../conf/config.php'; 
	 include_once 'curso.php'; 

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
					    $curso = new Curso();

					    if(isset($_POST["crsId"])){
							$curso->crsId = $_POST["crsId"];
						}
						if(isset($_POST["crsDescricao"])){
							$curso->crsDescricao = $_POST["crsDescricao"];
						}
						if(isset($_POST["crsDuracao"])){
							$curso->crsDuracao = $_POST["crsDuracao"];	
						}						

						if(empty($curso->crsDescricao) || empty($curso->crsDuracao)){
							header('location: ..\pages\curso-cadastro.php?id='.$curso->crsId.'&descricao='.$curso->crsDescricao.'&duracao='.$curso->crsDuracao);
							die;
						}		

				    	try{ 				 			

				 			$sql = "";

				 			if($curso->crsId > 0){
				 				$sql = "update tbCurso set Descricao = '".addslashes($curso->crsDescricao)."', Duracao = '".addslashes($curso->crsDuracao). "' where Id = ".addslashes($curso->crsId);
				 			}else{
				 				$sql = "INSERT INTO tbCurso(Descricao, Duracao, Ativo) VALUES ('".addslashes($curso->crsDescricao)."', '".addslashes($curso->crsDuracao)."', 1)";
				 			}
				 			
				            $insert = insere($sql);

				            if($insert){
			            		?>
				            	<script>
				            		swal("Dados salvos com sucesso!", "", "success");
				            		window.setTimeout("location.href='../pages/curso-listar.php'",2000);
				            	</script>
            					<?php //header("location: ..\pages\curso-listar.php");
            				}else{
            					header('location: ..\pages\curso-cadastro.php?id='.$curso->crsId.'&descricao='.$curso->crsDescricao.'&duracao='.$curso->crsDuracao);
            				}
			            }catch(Exception $e){
							echo "<h1>Erro: ".$e->getMessage()."</h1>"; 
						}	 
					}
				?>
        </div>
    </div>
</div>

