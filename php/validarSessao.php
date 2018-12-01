<?php
	session_start();
	if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])){
		header ("Location: ../errodesessao.php");
		exit;
	}
?>