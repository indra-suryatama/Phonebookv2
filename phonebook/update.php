<?php
	ob_start();
	session_start();

    echo 'haloo';
	$id = $_POST["id"];
	$name = $_POST["name"];
	$address = $_POST["address"];
	$phoneNumber = $_POST["phoneNumber"];


 //       $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=testdb','postgres','abcd1234');
 	$myPDO = new PDO('pgsql:host=10.1.137.140;dbname=production','postgres','abcd1234');
	$sql= 'UPDATE "ADMIN"."PHONEBOOK" set name=\''.$name.'\', address=\''.$address.'\', phoneNumber=\''.$phoneNumber.'\' WHERE id = '.$id;
	//$sql2 = 'INSERT INTO phonebook VALUES('.$id.', \''.$name.'\', \''.$address.'\', \''.$phoneNumber.'\', '.$loginID.')';
	$row= $myPDO->prepare($sql);
	$row->execute();

	// Berhasil
?>