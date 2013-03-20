<?php 

	session_start();
	include'../connection.php';

	if(!isset($_SESSION['organizacao'])){
	
		$_SESSION['erro'] = "Faca seu login como administrador primeiro!";
		header("Location:index.php");
	
		exit();
	}
	
	if (isset($_SESSION['messege'])){
	
		$messege = $_SESSION['messege'];
		unset($_SESSION['messege']);
	}
	
	include'../header.php';
	echo"<!doctype html>";
	echo"<html>";
		echo"<head>";
			echo'<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>';
			echo"<title>Cadastro</title>";
			echo'<script type="text/javascript" src="app.js"></script>';
			echo'<link rel="stylesheet" type="text/css" href="../css/style.css"/>';
		echo"</head>";
		echo"<body>";
	
	
			$query = ("SELECT idModalidade FROM grupo"); //Seleciona uma tupla de um usuario...
			$grupo = mysql_query($query);//obtem resultado do banco
			
			if(Mysql_num_rows($grupo) > 0){
				$numRows = Mysql_num_rows($grupo);
			}
				echo'<p>'.@$messege.'</p>';
				
				echo'<div id="cabecalho">';
					echo'<div id="incluir">';
						echo'<img src="../imagens/incluir.png" />';
					echo'</div>';
					
					echo'<div id="excluir">';
						echo'<img src="../imagens/deletar.png" />';
					echo'</div>';
				echo'</div>';
		
			echo'<p><a href="../admSYS.php">Voltar</a></p>';
			echo '<div id="incluiB">';
				echo '<form method="post" action="inseriBolsista.php">';
					echo'<fieldset id="fieldsetCadastraB">';
						echo '<legend>Cadastra Bolsista:</legend>';
						echo '<label for="user">Matricula:</label>';
						echo '<input type="text" name="user" value="'.@$_SESSION['user'].'" id="user"/> <br/ id="brF">';
						echo'<label for="key">Senha</label>';
						echo '<input type="password" name="key" value="'.@$_SESSION['key'].'" id="key"/> <br/id="brF">';
						echo'<p class="selecao">Selecione o Grupo para o Bolsista';
						echo '<select name="grupo">';
						for($i = 0; $i < $numRows; $i++){
						
							echo'<option value="'.mysql_result($grupo, $i).'">'.mysql_result($grupo, $i).'</option>';
						}
						echo'</select></p>';
						echo'<label for="nome">Nome</label>';
						echo'<input type="text" name="nome" value="'.@$_SESSION['nome'].'" id="nome"/><br/class="brF">';
						echo'<label for="campus">Campus</label>';
						echo'<input type="text" name="campus" value="'.@$_SESSION['campus'].'" id="campus"/><br/class="brF">';
						echo'<label for="data">Data de nascimento:AAAA-MM-DD</label>';
						echo'<input type="text" name="data" value"'.@$_SESSION['data'].'" id="data"/><br/class="brF">';
						echo'<label for="cpf">CPF</label>';
						echo'<input type="text" name="cpf" value="'.@$_SESSION['cpf'].'" id="cpf"/><br/class="brF">';
						echo'<label for="curso">Curso</label>';
						echo'<input type="text" name="curso" value="'.@$_SESSION['curso'].'" id="curso"/> <br/class="brF">';
						echo'<label for="rede">Rede Social</label>';
						echo'<input type="text" name="rede" value="'.@$_SESSION['rede'].'"id="rede"/><br/class="brF">';
						echo'<p class="selecao"><input type ="radio" name="radiob" value="1">mas<br/>
								<input type ="radio" name="radiob" value="0">fem</p>';
						echo'<label for="rg">RG</label>';
						echo'<input type ="text" name="rg" value="'.@$_SESSION['rg'].'"id="rg"/> <br/id="brF">';
						echo'<label for="mail">E-mail</label>';
						echo'<input type ="text" name="email" value="'.@$_SESSION['email'].'"id="mail"/> <br/class="brF">';
						
					echo'</fieldset>';
					echo '<input type="submit" name="cadastro" value="cadastar"/><br/ class="brF">';
				
				echo '</form>';
			echo '</div>';
		
		//-------------------------
		
			$query = ("SELECT matricula,nome,idModalidade FROM bolsista"); //Seleciona uma tupla de um usuario...
			$bolsista = mysql_query($query);//obtem resultado do banco
			
			if(Mysql_num_rows($bolsista) > 0){
				$numRows = Mysql_num_rows($bolsista);
			}
			
		
			echo '<div id="deletaB">';
				echo '<form method="post" action="deletaBolsista.php">';
					echo'<fieldset id="fieldsetDeletaB">';
					echo '<legend>Deleta Bolsista:</legend>';
					
						echo '<p class="selecao">NOME(MATRICULA) MODALIDADE<select name="deletaBolsista">';
						for($i = 0; $i < $numRows; $i++){
							$nome = mysql_fetch_assoc($bolsista);
							
							echo '<option value="'.mysql_result($bolsista, $i).'">'.$nome['nome'].'('.mysql_result($bolsista, $i).') '.$nome['idModalidade'].'</option>'; // Coloca os grupos do banco com seleção e os envia
						}
						echo'</select></p>';
					echo '</fieldset>';
					echo'<input type="submit" name="enviar" value="deletar" />';
					
				
				echo '</form>';
			echo '</div>';
			echo'<script type="text/javascript">load()</script>';
		rodape();
		
	if (isset($_SESSION['nome'])){
		unset($_SESSION['nome']);
	}
	if(isset($_SESSION['campus'])){
		unset($_SESSION['campus']);
	}
	if (isset($_SESSION['data'])){
		unset($_SESSION['data']);	
	}
	if (isset($_SESSION['cpf'])){
		unset($_SESSION['cpf']);
	}
	if (isset($_SESSION['curso'])){
		unset($_SESSION['curso']);
	}
	if (isset($_SESSION['rede'])){
		unset($_SESSION['rede']);
	}
	if (isset($_SESSION['rg'])){
		unset($_SESSION['rg']);
	}
	if (isset($_SESSION['email'])){
		unset($_SESSION['email']);
	}
	if (isset($_SESSION['user'])){
		unset($_SESSION['user']);
	}
	if (isset($_SESSION['key'])){
		unset($_SESSION['key']);
	}
?>