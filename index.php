<?php
	session_start();
	
	if(isset($_SESSION["erro"])){
		echo'<p>'.$_SESSION['erro'].'</p>';
		unset($_SESSION['erro']);
	}
	
	if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
		
		header("Location:system.php");
		exit();
	}
	
	include 'header.php';
	
	cabecalho("Feed");
			
		echo'<div id="logar">';
			echo '<form method="post" action="bdQuery.php">';
				echo'<fieldset id="fieldsetIndex">';
					echo '<legend>Login:</legend>';
					echo'<label for="user">Usuário:</label>';
					echo '<input type="text" name="user" value="'.@$_SESSION['user'].'" id="user"/> <br/class="brF">';
					echo'<label for="key">Senha:</label>';
					echo '<input type="password" name="key" value="'.@$_SESSION['key'].'" id="key"/> <br/class="brF">';
				echo'</fieldset>';
				echo '<p> <input type="submit" name="Logar" value="Logar" /> </p>';
			echo'</form>';
		echo'</div>';
			
	rodape();
			
		if(isset($_SESSION['user'])){
			
			unset($_SESSION['user']);
		}
		
		if(isset($_SESSION['key'])){
			unset($_SESSION['key']);
		}
		
		echo'</body>';
	echo'</html>';

?>