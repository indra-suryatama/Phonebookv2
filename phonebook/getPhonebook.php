<?php
	ob_start();
    $id = $_POST['id']; 
 //       $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=testdb','postgres','abcd1234');
 $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=production','postgres','abcd1234');
	$sql = 'SELECT * FROM "ADMIN"."PHONEBOOK" WHERE ID = '.$id;
	
	$result = $myPDO->prepare($sql);
	$result->execute();
	
	if($row=$result->fetch()) {
        $data = array("id"=> $row[0], "name"=> $row[1], "address"=>  $row[2], "phoneNumber" => $row[3]);
        echo json_encode($data);
	}
	//Berhasil
?>