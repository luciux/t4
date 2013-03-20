<?php
	
	session_start();
	
	include'connection.php';
	
	if(isset($_SESSION['organizacao'])){
		$_SESSION['messege'] = "Você esta logado como organização para acessar atleta ou bolsista faça logoff e entre com seu cadastro de atleta ou bolsista!";
		header("Location:admSYS.php");
		exit();
	}
	elseif(isset($_SESSION['atleta'])){
		$_SESSION['messege'] = "Você esta logado como atleta para acessar bolsista ou administracao faça logoff e entre com seu cadastro de bolsista ou administracao!";
		header("Location:atletaSYS.php");
		exit();
	}
	elseif(isset($_SESSION['bolsista'])){
		$_SESSION['messege'] = "Você esta logado como bolsista para acessar atleta ou administracao faça logoff e entre com seu cadastro de atleta ou administracao!";
		header("Location:bolsistaSYS.php");
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
		
		$senhaValida = mysql_fetch_array($resultadoBolsista); //coloca em um array o resultado sendo que a senha é unica e estara na pos[0] // recupera senha
		
		if($senhaValida[0] == $key){ // Testa senha do banco com a do usuario
			$_SESSION['bolsista'] = true;
			$_SESSION['messege'] = "Você esta logado como bolsista";
			header('Location:bolsistaSYS.php');
			exit();
		}
	}
	elseif(Mysql_num_rows($resultadoAtleta) > 0){
	
		$senhaValida = mysql_fetch_array($resultadoAtleta); //coloca em um array o resultado sendo que a senha é unica e estara na pos[0] // recupera senha
	
		if($senhaValida[0] == $key){ // Testa senha do banco com a do usuario
			$_SESSION['atleta'] = true;
			$_SESSION['messege'] = "Você esta logado como atleta";
			header('Location:atletaSYS.php');
			exit();
		}
	}
	elseif(Mysql_num_rows($resultadoOrganizacao) > 0){
	
		$senhaValida = mysql_fetch_array($resultadoOrganizacao); //coloca em um array o resultado sendo que a senha é unica e estara na pos[0] // recupera senha
	
		if($senhaValida[0] == $key){ // Testa senha do banco com a do usuario
			$_SESSION['organizacao'] = true;
			$_SESSION['messege'] = "Você esta logado como membro da equipe de organização";
			header('Location:admSYS.php');
			exit();
		}
	}
	else{
		$_SESSION['erro'] = 'Usuário não presente na base de dados';
		header("Location:index.php");
		
	}
	
	
?>