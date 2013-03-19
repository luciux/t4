<?php 

	session_start();
	
	if(!isset($_SESSION['organizacao'])){
	
		$_SESSION['erro'] = "Faca seu login como administrador primeiro!";
		header("Location:index.php");
	
		exit();
	}
	
	include '../connection.php';
	include '../header.php';
	
	$_SESSION['nome'] = $_POST['nome'];
	$_SESSION['campus'] = $_POST['campus'];
	$_SESSION['data'] = $_POST['data'];
	$_SESSION['cpf'] = $_POST['cpf'];
	$_SESSION['curso'] = $_POST['curso'];
	$_SESSION['rede'] = $_POST['rede'];
	$_SESSION['rg'] = $_POST['rg'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['user'] = $_POST['user'];
	$_SESSION['key'] = $_POST['key'];
	
	
	if(isset($_POST['user'])){
		
		if (strlen($_POST['user']) == 10){
			$matricula = addslashes($_POST['user']);
			
		}else{
			
			$_SESSION['messege'] = "A matricula deve conter exatamente 10 digitos";
			header("Location: cadastraBolsista.php");
			exit();
		}
	}
	if(isset($_POST['key'])){
		
		if(strlen($_POST['key']  < 6)){ // no minimo 5 caracteres como senha
			
			$key = addslashes($_POST['key']);
		}else{
			
			$_SESSION['messege'] = "A senha deve conter ao menos 4 caracteres";
			header("Location: cadastraBolsista.php");
			exit();
		}
	}
	if(isset($_POST['cpf'])){
		$num = strlen($_POST['cpf']);
		if(strlen($_POST['cpf'])  == 11){ // no minimo 5 caracteres como senha
				
			$cpf = addslashes($_POST['cpf']);
		}else{
				
			$_SESSION['messege'] = "$num";
			header("Location: cadastraBolsista.php");
			exit();
		}
	}
	
	if (isset($_POST['nome']) && isset($_POST['campus']) && isset($_POST['data']) && isset($_POST['curso']) && isset($_POST['radiob']) && isset($_POST['radiob']) && isset($_POST['rg']) && isset($_POST['email']) && isset($_POST['grupo'])){
		
		$nome = addslashes($_POST['nome']);
		$campus = addslashes($_POST['campus']);
		$data = addslashes($_POST['data']);
		$curso = addslashes($_POST['curso']);
		if(addslashes($_POST['radiob']) == 1){
			$naipe = true;
		}else{
			$naipe = false;
		}
		$rg = addslashes($_POST['rg']);
		$email = addslashes($_POST['email']);
		$idModalidade = addslashes($_POST['grupo']);
	}else{
		
		$_SESSION['messege'] = "Todos os campos do formulario são obrigatorios";
		header("Location:cadastraBolsista.php");
		exit();
	}
	
	$social = $_POST['rede'];
	cabecalho("");
		
		$insert = ("INSERT INTO bolsista VALUES('$matricula', '$idModalidade', '$nome', '$campus', '$data', '$cpf', '$curso', '$social', '$naipe', '$rg', '$idade', '$email', '$key')");
		$query = mysql_query($insert);
		
		if($query == FALSE){
			$_SESSION['messege'] = "Erro na inclusao de registros".mysql_error();
			header("Location:../admSYS.php");
			exit();
		}
		else{
			mysql_affected_rows();
			header("Location:cadastraBolsista.php");
			exit();
		}
?>