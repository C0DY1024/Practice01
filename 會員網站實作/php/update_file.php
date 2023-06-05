<?php
	require_once 'db.php';
	require_once 'function.php';
	


	if(file_exists($_FILES['file']['tmp_name']))
	{
		if(move_uploaded_file($_FILES['file']['tmp_name'], "../" . $_POST['save_path']))
		{
			$data = update_work($_POST['id'],$_POST['intro'],$_POST['category'],$_POST['publish'],$_POST['save_path']);

			if ($data){
				echo 'yes';
			}
			else{
				echo 'no';
			}
		}	
	
		}else{
			echo "no";
	}
?>