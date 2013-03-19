<?php 
	
	include'../connection.php';
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
	
	include'../header.php';
	cabecalho("Cadastro");
	
	$query = ("SELECT idModalidade FROM grupo"); //Seleciona uma tupla de um usuario...
	$grupo = mysql_query($query);//obtem resultado do banco
	
	if(Mysql_num_rows($grupo) > 0){
		$numRows = Mysql_num_rows($grupo);
	}
	
	echo '<p>'.@$messege.'</p';
	
	echo '<div id="incluiG">';
		echo '<form method="post" action="inseriGrupo.php">';
		
			echo '<p>Nome do Grupo <input type="text" name="nome" value="" /> </p>';
			echo '<p>Numero Maximo de Integrantes <input type="numerical" name="max" value="" /> </p>';
			echo '<p> <input type="submit" name="cadastro" value="cadastar" /> </p>';
		echo "</form>";
	echo'</div>';
	
	echo '<div id="deletaG">';
		echo '<form method="post" action="deletaGrupo.php">';
			echo '<p> <select name="grupo">';
				for($i = 0; $i < $numRows; $i++){
				
					echo'<option value="'.mysql_result($grupo, $i).'">'.mysql_result($grupo, $i).'</option>'; // Coloca os grupos do banco com seleção e os envia
				}
				echo'<input type="submit" name="enviar" value="deletar" />';
			echo'</select></p>';
		echo'</form>';
	echo'</div>';
	rodape()
?>