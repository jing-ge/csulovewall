<?php 
	include 'lib/phplib/lib.php';
	include 'lib/phplib/Mysql.php';
	$mysql1 =new Mysql();
	$data['name']=quotes(safe_replace($_POST['name']));

	$data['content']=quotes(safe_replace($_POST['content']));
	$data['image']=rand(1,40).".png";
	$data['time']=time();	
	if (empty($data['name'])) {
		$data['name']="CSU匿名爱恋者";
	}
	if (empty($data['content'])) {
		Header("Location: index.php"); exit;
	}
	if ($mysql1->Exec($data,'lovecontent','insert')) {
		Header("Location: index.php"); 
	}else{
		include '404.html';
	}

 ?>