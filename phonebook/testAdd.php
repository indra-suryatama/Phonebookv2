<?php
	ob_start();
	session_start();
	
 //       $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=testdb','postgres','abcd1234');
 $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=production','admin','abcd1234');
	$sql = 'SELECT max(id) FROM login';
	$row = $myPDO->prepare($sql);
    $row->execute();
	if($result = $row->fetch()) {
		$id = $result[0] + 1;
        
	}
    else $id=1;
	echo('The ID is'.$id);
    var_dump($result);
    echo('<br>'.$result);
/*
    $loginID = 1;
    $name = 'Keiko';
    $address = 'tomang';
    $phoneNumber = '628595';
	
	$sql2 = 'INSERT INTO phonebook VALUES('.$id.', \''.$name.'\', \''.$address.'\', \''.$phoneNumber.'\', '.$loginID.')';
    $row = $myPDO->prepare($sql2);
	$row->execute();
    echo ('success add');
    //Berhasil*/
	
?>