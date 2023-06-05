<?php
	require_once 'db.php';
	require_once 'function.php';
	


	if(file_exists($_FILES['file']['tmp_name']))
	{
		if(move_uploaded_file($_FILES['file']['tmp_name'], "../" . $_POST['save_path']))
		{
			$add_result = add_work($_POST['intro'],$_POST['category'], $_POST['save_path'], $_POST['publish']);
		
			if($add_result)
			{
				echo 'yes';
			}
		}	
	
		}else{
			echo "no";
	}
?>