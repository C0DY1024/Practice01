<?php
require_once 'db.php';
require_once 'function.php';

if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	$edit_result = update_article($_POST['id'],$_POST['title'], $_POST['category'], $_POST['content'], $_POST['publish']);
	
	if($edit_result)
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