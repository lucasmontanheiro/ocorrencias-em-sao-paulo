<?php
	$username = "lucasmontan";
	$password = "zaqxsw123";
	$hostname = "mysql.montanheiro.com.br";
	$database = "ocorrencias_staging";
	$url = "http://ocorrenciasemsaopaulo.com.br";
	$block = "";

	$conn = mysql_connect($hostname, $username, $password)
	or die ("Connecting to MySQL failed");

	mysql_select_db($database, $conn)
	or die ("Selecting MySQL database failed");
?>