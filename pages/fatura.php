
<?php

    include_once '../conf/database.php';
	include_once '../conf/config.php';

	class Controle{
		public $ctrId;
		public $ctrNome;
		public $ctrPrazo;
		public $ctrAtivo;
		public $ctrStatus;
		public $ctrOperadora;	

		public function __construct(){
			$this->ctrId = "";
			$this->ctrNome = "";
			$this->ctrPrazo = 0;
			$this->ctrAtivo = 1;
			$this->ctrOperadora ="";
			}

		function carregarDados(){
			$resultado = listar("SELECT id, nome,status, prazo, COALESCE(Ativo, 1) Ativo,operadora FROM sistema WHERE Id = ".$this->ctrId);
            if ($resultado && $resultado->num_rows > 0) {
                $row = $resultado->fetch_assoc();                                                                                    
                $this->ctrId = $row["id"];
                $this->ctrNome = $row["nome"];
                $this->ctrPrazo = $row["prazo"];
                $this->ctrAtivo = $row["Ativo"];
                $this->ctrStatus = $row["status"];
                $this->ctrOperadora = $row["operadora"];
                return true;
            }else{
                return false;
            }
		}

		function excluirLogicamente(){
			return insere("UPDATE sistema SET Ativo = 0 WHERE Id = ".$this->ctrId);
		}

		function excluirFisicamente(){
			return insere("DELETE FROM sistema WHERE Id = ".$this->ctrId);
		}

		function salvar(){
			print_r($this->ctrId);
			if($this->ctrId > 0){
				return insere ("UPDATE sistema SET Nome = '".$this->ctrNome."', Prazo = '".$this->ctrPrazo."',Status = '".$this->ctrStatus."',Operadora='".$this->ctrOperadora."' WHERE Id = '".addslashes($this->ctrId)."'");
			}else{
			return insere ("INSERT INTO Sistema (Nome,Prazo,Status,Ativo,Operadora) VALUES ('".$this->ctrNome."','".$this->ctrPrazo."',0,1,'".$this->ctrOperadora."')");
			}
		}

		function listar(){
			return listar("SELECT Id,Nome,Prazo,Operadora,Ativo, CASE WHEN Status = 0 THEN 'Pendente' ELSE 'Entregue' END As Situacao FROM sistema where Ativo != 0 ORDER BY Prazo");
			
		}
		function reset(){
			return insere ("UPDATE sistema SET Status = 0");
		}
	}
?>