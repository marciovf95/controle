<?php
	include_once "../conf/database.php";
	class Curso{

		public $crsId;
		public $crsDescricao;
		public $crsDuracao;

		public function __construct(){
			$this->crsId = 0;
			$this->crsDescricao = "";
			$this->crsDuracao = "";
		}

		function salvar(){
			$sql="";
			if($this->crsId > 0){
				$sql = "UPDATE tbCurso SET Descricao = '".$this->crsDescricao."', Duracao = ".$this->crsDuracao." WHERE Id = ".$this->crsId;
			}else{
				$sql = "INSERT INTO tbCurso (Descricao, Duracao) VALUES ('".$this->crsDescricao."', ".$this->crsDuracao.")";
			}
			insere($sql);
		}
	}
?>