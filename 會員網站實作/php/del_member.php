<?php
require_once 'db.php';
require_once 'function.php';

if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	$result = del_member($_POST['id']);
	
	if($result)
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