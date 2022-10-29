<?php
	ob_start();
	session_start();
	$id = $_POST["id"];
	$myPDO = new PDO('pgsql:host=10.1.137.140;dbname=testdb','postgres','abcd1234');
	
		
	$sql= 'DELETE phonebook WHERE id = '.$id ;
	$row = $myPDO->prepare(sql2);
	$row->execute();
?>