<?php
	$host 		= 'localhost';
	$user 		= 'Grevane';
	$pass 		= 'Grevane3250';
	$database 	= 'booklender';

	$db = new PDO('mysql:host='.$host.'; dbname='.$database, $user, $pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>