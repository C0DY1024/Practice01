<?php
require_once 'db.php';
require_once 'function.php';

$check = check_username($_POST['username']);

if ($check){
    echo 'exist';
}
else{
    echo 'nonexist';
}
?>