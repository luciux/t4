<?php
	
	function cabecalho($t){
		echo"<!doctype html>";
		echo"<html>";
		echo"<head>";
		echo'<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>';
		echo"<title> $t </title>";
		echo'<script type="text/javascript" src="js/app.js"> </script>';
		echo'<link rel="stylesheet" type="text/css" href="css/style.css"/>';
		echo"</head>";
		echo"<body>";
	}
	
	function rodape(){
		echo"</body>";
		echo"</html>";
	}
?>