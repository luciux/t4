<?php
	session_start();
	include 'header.php';
	if(!isset($_SESSION['bolsista'])){
		
		$_SESSION['erro'] = "Voc� n�o esta logado como um bolsista, fa�a login primeiro, apos isso feito isso";
		header("Location:index.php");
		exit();
	}
	if (isset($_SESSION['messege'])){
		
		$mensagem = $_SESSION['messege'];
	}
	
	cabecalho('Bolsista');
		
		echo @$mensagem;
		
		echo'<div id="cadastroA">';
		
			echo'<form method="post" action"cadastraAluno.php">';
				
			echo'</form>';
		echo'</div>';
		
	rodape();
?>