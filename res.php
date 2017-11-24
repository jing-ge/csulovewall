<?php
	include 'lib/phplib/lib.php';
	include 'lib/phplib/Mysql.php';
	$mysql2 =new Mysql();
	$data2['lid']=quotes(safe_replace($_POST['lid']));
	$data2['content']=quotes(safe_replace($_POST['content']));
	$data2['time']=time();
	if (!is_numeric($data2['lid'])) {
		Header("Location: index.php"); exit;
	}
	if (empty($data2['content'])) {
		Header("Location: index.php?id=".$data2['lid']); exit;
	}
	if ($mysql2->Exec($data2,'comments','insert')) {
		Header("Location: index.php?id=".$data2['lid']); exit;
	}else{
		include '404.html';exit;
	}