<?php 

	session_start();
	include'../connection.php';
	
	if(!isset($_SESSION['organizacao'])){
	
		$_SESSION['erro'] = "Faca seu login como administrador primeiro!";
		header("Location:index.php");
	
		exit();
	}
	
	include '../header.php';
	cabecalho("deletar um grupo");
	
		if(isset($_POST['grupo'])){
			
			$grupo = $_POST['grupo'];
			echo $grupo;
			
		}
		else{
			
			$_SESSION['messege'] = "erro de selecao com o grupo";
			header("Location:../admSYS.php");
			exit();
		}
		
		
		$query = ("DELETE FROM grupo WHERE idModalidade = '$grupo'");
		
		$query = mysql_query($query);//obtem resultado do banco
		
		if($query == FALSE){
			$_SESSION['messege'] = "Erro na exclusao de registros".mysql_error();
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