<?php
	
	session_start();
	
	include'connection.php';
	
	if(isset($_SESSION['organizacao'])){
		$_SESSION['messege'] = "Vocъ esta logado como organizaчуo para acessar atleta ou bolsista faчa logoff e entre com seu cadastro de atleta ou bolsista!";
		header("Location:admSYS.php");
		exit();
	}
	elseif(isset($_SESSION['atleta'])){
		$_SESSION['messege'] = "Vocъ esta logado como atleta para acessar bolsista ou administracao faчa logoff e entre com seu cadastro de bolsista ou administracao!";
		header("Location:atleta.php");
		exit();
	}
	elseif(isset($_SESSION['bolsista'])){
		$_SESSION['messege'] = "Vocъ esta logado como bolsista para acessar atleta ou administracao faчa logoff e entre com seu cadastro de atleta ou administracao!";
		header("Location:bolsista.php");
		exit();
	}
	
	if(isset($_POST['user'])){
		
		$user = addslashes($_POST['user']);
		
	}else{
		
		header("Location: index.php");
	}
	
	if(isset($_POST['key'])){
		
		$key = addslashes($_POST['key']);
		
	}else{
	
		header("Location: index.php");
	}
	
	$query = ("SELECT senha FROM bolsista WHERE matricula='$user'"); //Seleciona uma tupla de um usuario...
	$resultadoBolsista = mysql_query($query);//obtem resultado do banco
	//.....................
	$query = ("SELECT senha FROM atleta WHERE matricula='$user'"); //Seleciona uma tupla de um usuario...
	$resultadoAtleta = mysql_query($query);//obtem resultado do banco
	//.....................
	$query = ("SELECT senha FROM organizacao WHERE nome='$user'"); //Seleciona uma tupla de um usuario...
	$resultadoOrganizacao = mysql_query($query);//obtem resultado do banco
	
	if(Mysql_num_rows($resultadoBolsista) > 0){
		
		$senhaValida = mysql_fetch_array($resultadoBolsista); //coloca em um array o resultado sendo que a senha щ unica e estara na pos[0] // recupera senha
		
		if($senhaValida[0] == $key){ // Testa senha do banco com a do usuario
			$_SESSION['bolsista'] = true;
			$_SESSION['messege'] = "Vocъ esta logado como bolsista";
			header('Location:bolsista/bolsistaSYS.php');
			exit();
		}
	}
	elseif(Mysql_num_rows($resultadoAtleta) > 0){
	
		$senhaValida = mysql_fetch_array($resultadoAtleta); //coloca em um array o resultado sendo que a senha щ unica e estara na pos[0] // recupera senha
	
		if($senhaValida[0] == $key){ // Testa senha do banco com a do usuario
			$_SESSION['atleta'] = true;
			$_SESSION['messege'] = "Vocъ esta logado como atleta";
			header('Location:atleta/atletaSYS.php');
			exit();
		}
	}
	elseif(Mysql_num_rows($resultadoOrganizacao) > 0){
	
		$senhaValida = mysql_fetch_array($resultadoOrganizacao); //coloca em um array o resultado sendo que a senha щ unica e estara na pos[0] // recupera senha
	
		if($senhaValida[0] == $key){ // Testa senha do banco com a do usuario
			$_SESSION['organizacao'] = true;
			$_SESSION['messege'] = "Vocъ esta logado como membro da equipe de organizaчуo";
			header('Location:admSYS.php');
			exit();
		}
	}
	else{
		$_SESSION['erro'] = 'Usuсrio nуo presente na base de dados';
		header("Location:index.php");
		
	}
	
	
?>