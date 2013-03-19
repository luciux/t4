<?php 
	
	session_start();
	include '../connection.php';
	include 'header.php';
	
	if(!isset($_SESSION['organizacao'])){
	
		$_SESSION['erro'] = "Faca seu login como administrador primeiro!";
		header("Location:index.php");
	
		exit();
	}
	
	cabecalho("");
	
	if(isset($_POST['deletaBolsista'])){
			
		$idBolsista = $_POST['deletaBolsista'];
	}
	else{
			
		$_SESSION['messege'] = "erro de selecao com o bolsista";
		header("Location:../admSYS");
		exit();
	}	
	
	$query = ("DELETE FROM bolsista WHERE idModalidade = '$idBolsista'");
	
	$query = mysql_query($query);//obtem resultado do banco
	
	if($query == FALSE){
		$_SESSION['messege'] = "Erro na exclusao de registros".mysql_error();
		header("Location:../admSYS.php");
		exit();
	}
	else{
		mysql_affected_rows();
		header("Location:cadastraBolsista.php");
		exit();
	}
	
	
?>