<?php
	session_start();
	include 'header.php';
	include 'connection.php';
	if(!isset($_SESSION['bolsista'])){
		
		$_SESSION['erro'] = "Você não esta logado como um bolsista, faça login primeiro, apos isso feito isso";
		header("Location:index.php");
		exit();
	}
	if (isset($_SESSION['messege'])){
		
		$mensagem = $_SESSION['messege'];
	}
	
	echo"<!doctype html>";
	echo"<html>";
	echo"<head>";
		echo'<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>';
		echo"<title>bolsista</title>";
		echo'<script type="text/javascript" src="app.js"></script>';
		echo'<link rel="stylesheet" type="text/css" href="css/style.css"/>';
	echo"</head>";
	echo"<body>";
	
		$query = ("SELECT idModalidade FROM grupo"); //Seleciona uma tupla de um usuario...
		$grupo = mysql_query($query);//obtem resultado do banco
		
		if(Mysql_num_rows($grupo) > 0){
			$numRows = Mysql_num_rows($grupo);
		}
		echo @$_SESSION['messege'];
		
		echo'<div id="cabecalho">';
			echo'<div id="incluir">';
				echo'<img src="imagens/incluir.png" />';
			echo'</div>';
	
			echo'<div id="excluir">';
				echo'<img src="imagens/deletar.png" />';
			echo'</div>';
		echo'</div>';
		
		
	rodape();
?>