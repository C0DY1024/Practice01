<?php
require_once 'db.php';
require_once 'function.php';

if (verify_user($_POST['un'], $_POST['pw'])){
    echo 'yes';
}
else{
    echo 'no';
}
?>