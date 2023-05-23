<?php
@session_start();

function get_publish_article()
{
    $datas = array();
    $sql ="SELECT * FROM `article` WHERE `publish` = 1";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)>0)
        {
            while ($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $datas;
}

function get_article($id)
{
    $result = null;
    $sql ="SELECT * FROM `article` WHERE `publish` = 1 AND `id` ={$id}";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)==1)
        {
            $result = mysqli_fetch_assoc($query);
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function get_publish_works()
{
    $datas = array();
    $sql ="SELECT * FROM `works` WHERE `publish` = 1";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)>0)
        {
            while ($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $datas;
}

function get_work($id)
{
    $result = null;
    $sql ="SELECT * FROM `works` WHERE `publish` = 1 AND `id` ={$id}";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)==1)
        {
            $result = mysqli_fetch_assoc($query);
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function check_username($username)
{
    $result = null;
    $sql ="SELECT * FROM `user` WHERE `username` = '{$username}'";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)>=1)
        {
            $result = true;
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function add_user($username,$password,$name)
{
    $result = null;
    $password = md5($password);
    $sql ="INSERT INTO `user` (`username`, `password`, `name`)
    VALUE ('{$username}','{$password}','{$name}')";
    $query = mysqli_query($_SESSION['link'], $sql);

    if($query)
    {
        
        if(mysqli_affected_rows($_SESSION['link'])==1)
        {
            $result = true;
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function verify_user($username, $password)
{
    $result = null;
    $password = md5($password);
    $sql ="SELECT * FROM `user` WHERE `username` = '{$username}' AND  `password` = '{$password}'";
    $query = mysqli_query($_SESSION['link'], $sql);

    if($query)
    {
        
        if(mysqli_num_rows($query)==1)
        {
            $user = mysqli_fetch_assoc($query);
            $_SESSION['is_login'] = true;
            $_SESSION['login_user_id'] = $user['id'];
            $result = true;
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function get_all_article()
{
    $datas = array();
    $sql ="SELECT * FROM `article`";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)>0)
        {
            while ($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $datas;
}

function add_article($title,$category,$content,$publish)
{
    $result = null;
    $create_date = date("Y-m-d H:i:s");
    $creater_id = $_SESSION['login_user_id'];

    $sql ="INSERT INTO `article` (`title`, `category`, `content`,`publish`,`create_date`,`creater_id`)
    VALUE ('{$title}','{$category}','{$content}',{$publish},'{$create_date}',{$creater_id})";

    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_affected_rows($_SESSION['link'])==1)
        {
            $result = true;
        }
    }
    else
    {
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function get_edit_article($id)
{
    $result = null;
    $sql ="SELECT * FROM `article` WHERE `id` ={$id}";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)==1)
        {
            $result = mysqli_fetch_assoc($query);
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function update_article($id,$title,$category,$content,$publish)
{
    $result = null;
    $modify_date = date("Y-m-d H:i:s");

    $sql = "UPDATE `article`
            SET `title`='{$title}',
             `category`='{$category}', 
             `content`='{$content}',
             `publish`= $publish,
             `modify_date`='{$modify_date}'
             WHERE `id`=$id";

    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_affected_rows($_SESSION['link'])==1)
        {
            $result = true;
        }
    }
    else
    {
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function del_article($id)
{
    $result = null;

    $sql = "DELETE FROM `article` WHERE `id`=$id";

    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_affected_rows($_SESSION['link'])==1)
        {
            $result = true;
        }
    }
    else
    {
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function get_all_member()
{
    $datas = array();
    $sql ="SELECT * FROM `user`";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)>0)
        {
            while ($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $datas;
}

function del_member($id)
{
    $result = null;

    $sql = "DELETE FROM `user` WHERE `id`=$id";

    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_affected_rows($_SESSION['link'])==1)
        {
            $result = true;
        }
    }
    else
    {
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function get_edit_user($id)
{
    $result = null;
    $sql = "SELECT * FROM `user` WHERE `id` = {$id};";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_num_rows($query)==1)
        {
            $result = mysqli_fetch_assoc($query);
        }
    }
    else
    {
        
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

function update_user($id,$username,$password,$name)
{
    $result = null;

    $password_sql = "";
    if($password !=""){
        $password= md5($password);
        $password_sql="`password`='{$password}',";
    }
    $sql = "UPDATE `user`
            SET `username`='{$username}', 
             {$password_sql}
             `name`= '{$name}'
             WHERE `id`=$id";

    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        
        if(mysqli_affected_rows($_SESSION['link'])==1)
        {
            $result = true;
        }
    }
    else
    {
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

?>