<?php 
	session_start(); ob_start();
    require_once("settings.php");
    require_once("function.php");

	if(isset($_SESSION["user"]))
	{
		$sessionquery = $dbconnect->prepare("select * from user where Email = ?");
		$sessionquery->execute(array($_SESSION["user"]));
		$userr =$sessionquery->fetch(PDO::FETCH_ASSOC);
	}
	
	


?>