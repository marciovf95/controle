
<?php 

   	require_once "fatura.php";
    include_once '../conf/database.php';
    include_once '../conf/config.php';	
	//header('Content-type: text/html; charset=utf-8');
	//header('Content-type: text/html; charset=ISO-8859-1');

	/* VERIFICO SE HOUVE UM POST */
	if(count($_POST) > 0 && $_POST["id"] > 0) {
		try{         
			print_r($_POST["id"]);
			$Sis = new Controle();
			$Sis->ctrId = addslashes($_POST["id"]);
			
			if($Sis->excluirFisicamente()){
				echo json_encode(true);
			}else{
				echo json_encode(false);
			}
		}catch(Exception $e){
			echo json_encode($e->getMessage()); 
		}		 
	}else{
		echo json_encode("Cliente não encontrado!");
	}
?>


