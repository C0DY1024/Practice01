<?php
require_once 'db.php';
require_once 'function.php';

$data = update_user($_POST['id'],$_POST['un'],$_POST['pw'],$_POST['n']);

if ($data){
    echo 'yes';
}
else{
    echo 'no';
}
?>