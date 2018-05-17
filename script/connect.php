<?php
	$iniParse = parse_ini_file("blend.ini", true);
	
	$db_host = $iniParse['db_host'];
	$db_user = $iniParse['db_user'];
	$db_pass = $iniParse['db_pass'];
	$db_data = $iniParse['db_database'];

	$db = new PDO('mysql:host=' . $db_host . '; dbname=' . $db_data, $db_user, $db_pass);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
