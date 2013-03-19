<?php  
		
	session_start();
	
	if(!isset($_SESSION['organizacao'])){
		
		$_SESSION['erro'] = "Faca seu login como administrador primeiro!";
		header("Location:index.php");
		
		exit();
	}
	if (isset($_SESSION['messege'])){
		
		$messege = $_SESSION['messege'];
		unset($_SESSION['messege']);
	}			
	
	include'header.php';
	
	cabecalho("administrador");
	
		echo'<p>'.@$messege.'</p>';
		
		echo'<p> Mother fucker you\'re logeed in</p>';
		echo'<p> <a href="cadastro/cadastraGrupo.php">Gerenciar os grupos</a></p>';
		echo'<p> <a href="cadastro/cadastraBolsista.php">Gerenciar os bolsistas </p></a>';
		echo'<p><a href="logoff.php">Sair </p></a>';
		
		
	rodape();
?>