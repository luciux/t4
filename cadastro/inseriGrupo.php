<?php 

	session_start();
	
	if(!isset($_SESSION['organizacao'])){
	
		$_SESSION['erro'] = "Faca seu login como administrador primeiro!";
		header("Location:index.php");
	
		exit();
	}
	
	include '../connection.php';
	include '../header.php';
	
		cabecalho("");
			
		$query = ("SELECT idModalidade FROM grupo"); //Seleciona uma tupla de um usuario...
		$grupo = mysql_query($query);//obtem resultado do banco
		
		if(Mysql_num_rows($grupo) > 0){
			$numRows = Mysql_num_rows($grupo);
		}
		if(isset($_POST['nome'])){
			
			$nome = addslashes($_POST['nome']);
		}
		if(isset($_POST['max'])){
				
			$maxInte = addslashes($_POST['max']);
		}
		
		
		$inserir = ("INSERT INTO grupo VALUES ('$nome','$maxInt',5)");
		$query = mysql_query($inserir);//obtem resultado do banco
		
		if($query == FALSE){
			$_SESSION['messege'] = "Erro na inclusao de registros".mysql_error();
			header("Location:../admSYS.php");
			exit();
		}
		else{
			mysql_affected_rows();
			header("Location:cadastraGrupo.php");
			exit();
		}
	rodape();
?>