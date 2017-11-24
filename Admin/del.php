<?php 
		$pwd = "CSULoveWall".date("Ymd",time())."Admin";
		if(($pwd!=$_GET["pwd"])||!is_numeric($_GET['id'])){
			Header("Location: ../index.php"); exit;
		}
	include '../lib/phplib/Mysql.php';
	include '../lib/phplib/lib.php';
	$mysql = new Mysql();
	$sql="delete from lovecontent where id = '".$_GET['id']."'";
	$mysql->query($sql);
	Header("Location: index.php?pwd=".$pwd); exit;

 ?>