<?php
	ob_start();
	session_start();
	
	$myPDO = new PDO('pgsql:host=10.1.137.140;dbname=testdb','postgres','abcd1234');
	$sql = 'SELECT max(id) FROM login';
	$row = $myPDO->prepare($sql);
    $row->execute();
	if($result = $row->fetch()) {
		$id = $result[0] + 1;
	}
	echo('The ID is',$id);
	//$stid = oci_parse($conn, $sql);
	//oci_execute($stid);
    $loginID = 1;
    $name = 'Keiko';
    $address = 'tomang';
    $phoneNumber = '628595'
	
	$sql = 'INSERT INTO phonebook (id, loginId, name, address, phoneNumber) VALUES(3,\''.$loginID.'\', \''.$name.'\', \''.$address.'\', '.$phoneNumber.')';
	echo($sql);
	$row = $myPDO->prepare($sql);
	$row->execute();
    echo ('success add');
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