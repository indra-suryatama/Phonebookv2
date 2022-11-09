<?php
	ob_start();
	session_start();
	$loginID = $_SESSION['user'];
	$name = $_POST["name"];
	$address = $_POST["address"];
	$phoneNumber = $_POST["phoneNumber"];
	
	//echo($name);
 //       $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=testdb','postgres','abcd1234');
 $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=production','postgres','abcd1234');
 	$sql = 'SELECT max("ADMIN"."ID") FROM "ADMIN"."PHONEBOOK"';
	$row = $myPDO->prepare($sql);
    $row->execute();
	if($result = $row->fetch()) {
		$id = $result[0] + 1;
	}
	else $id = 1;
	//echo('The ID is',$id);
	//$stid = oci_parse($conn, $sql);
	//oci_execute($stid);
	
	$sql2 = 'INSERT INTO "ADMIN"."PHONEBOOK" VALUES('.$id.', \''.$name.'\', \''.$address.'\', \''.$phoneNumber.'\', '.$loginID.')';
	//insert into phonebook values (3,'levana','jln mandala aa,','08555555',1);
	//$sql= 'UPDATE phonebook set name=\''.$name.'\', address=\''.$address.'\', phoneNumber=\''.$phoneNumber.'\' WHERE id = '.$id;
	//$sql2 = 'INSERT INTO phonebook VALUES('.$id.', \''.$name.'\', \''.$address.'\', \''.$phoneNumber.'\', '.$loginID.')';
    $row = $myPDO->prepare($sql2);
	$row->execute();


	/*
	$stid = oci_parse($conn, 'INSERT INTO phonebook (id, loginId, name, address, phoneNumber) VALUES(:id, :loginid, :myname, :myaddress, :myphonenumber)');

	oci_bind_by_name($stid, ':id', $id);
	oci_bind_by_name($stid, ':loginid', $loginID);
	
	oci_bind_by_name($stid, ':myname', $name);
	oci_bind_by_name($stid, ':myaddress', $address);
	oci_bind_by_name($stid, ':myphonenumber', $phoneNumber);

	$r = oci_execute($stid);  // executes and commits

	if ($r) {
		print "One row inserted";
	}

	oci_free_statement($stid);
	oci_close($conn);*/
	//header("HTTP/1.1 200 OK");
	//var_dump($data);
?>