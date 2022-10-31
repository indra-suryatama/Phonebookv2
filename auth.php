<?php
	ob_start();
	session_start(); 
 //       $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=testdb','postgres','abcd1234');
 $myPDO = new PDO('pgsql:host=10.1.137.140;dbname=production','postgres','abcd1234');
	$username = $_POST['username'];
	$password = $_POST['password'];
	//echo $username;
	//change to capital
	$sql = 'SELECT "ID" FROM "ADMIN"."LOGIN" WHERE NAME= \''.$username.'\' and "PASSWORD" =\''.$password.'\'';
	//echo $sql;
	$row = $myPDO->prepare($sql);
    $row->execute();
	//testing
	if($result = $row->fetch()) {
		$loginId = $result[0];
		echo($loginId);
		var_dump($result);
	} else {
		$loginId = 0;
	}
	/*echo "auth:".$isAuthenticationSuccess;
	$id = $row[1];*/
	echo $loginId;
	if($loginId) {
		
		$_SESSION['user'] = $loginId;
		echo 'user: '.$_SESSION['user'];
		//Header("Location: login.php");
		Header("Location: main.php?user=".$username."&loginId=".$loginId);
		echo 'true';
	} 
	else {
		Header("Location: login.php?authenticationFailed=1");
		echo 'false';
	}

	 echo $_POST['username']; 
	 echo $_POST['password']; 
 
?>