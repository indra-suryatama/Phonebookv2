<?php
	session_start();
	
	$data = $_POST;
	header("HTTP/1.1 200 OK");
	 return $data;
?>