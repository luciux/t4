<?php 
	session_start();
	include'header.php';
	
	cabecalho("");
		
		session_destroy();
		header('Location:index.php');	
	
	rodape();
?>