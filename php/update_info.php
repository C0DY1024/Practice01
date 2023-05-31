<?php
require_once 'db.php';
require_once 'function.php';

if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	$data = update_info($_POST['id'],$_POST['intro'],$_POST['category'],$_POST['publish'],$_POST['save_path']);
	
	if($data)
	{
		echo 'yes';
	}
	else
	{
		echo 'no';	
	}
}
else
{
	echo 'no';	
}
?>