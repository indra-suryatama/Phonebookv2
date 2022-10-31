<?php
	ob_start();
	session_start();
	$id = $_POST["id"];
 //       $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=testdb','postgres','abcd1234');
 $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=production','postgres','abcd1234');
	$sql= 'DELETE FROM "ADMIN"."PHONEBOOK" WHERE id ='.$id;
	$row= $myPDO->prepare($sql);
	$row->execute();
	//Berhasil
?>

