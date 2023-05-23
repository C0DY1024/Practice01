<?php
require_once 'db.php';
require_once 'function.php';

if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	$add_result = add_article($_POST['title'], $_POST['category'], $_POST['content'], $_POST['publish']);
	
	if($add_result)
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