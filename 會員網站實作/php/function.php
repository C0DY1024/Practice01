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

function del_work($id)
{
    $result = null;

    $work = get_edit_work($id);
    if(file_exists('../'.$work['save_path'])){
        unlink('../'.$work['save_path']);
    }

    $sql = "DELETE FROM `works` WHERE `id`=$id";

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

function get_all_works()
{
    $datas = array();
    $sql ="SELECT * FROM `works`";
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

function add_work($intro, $category, $save_path, $publish)
{
    $result = null;

	$intro = htmlspecialchars($intro);
	$create_user_id = $_SESSION['login_user_id'];
	$upload_date = date("Y-m-d H:i:s");


    $sql = "INSERT INTO `works` (`intro`, `category`,`save_path`, `publish`, `upload_date`, `create_user_id`)
                    VALUE ('{$intro}','{$category}','{$save_path}', {$publish}, '{$upload_date}', '{$create_user_id}');";

    $query = mysqli_query($_SESSION['link'], $sql);
    
    if ($query)
    {
        
        if(mysqli_affected_rows($_SESSION['link']) == 1)
        {
        
        $result = true;
        }
    }
    else
    {
        echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
    }
    return $result;
    }

function get_edit_work($id)
{
    $result = null;
    $sql ="SELECT * FROM `works` WHERE `id` ={$id}";
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

function update_work($id,$intro,$category,$publish,$save_path)
{
    $result = null;

    $work = get_edit_work($id);
    if(file_exists('../'.$work['save_path'])){
        if($save_path != $work['save_path']){
            unlink('../'.$work['save_path']);
            }
        }
        $sql = "UPDATE `works`
                SET `intro`='{$intro}',
                `category`='{$category}', 
                `publish`= $publish,
                `save_path`='{$save_path}'
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

function update_info($id,$intro,$category,$publish,$save_path)
{
    $result = null;
    

    $sql = "UPDATE `works`
            SET `intro`='{$intro}',
             `category`='{$category}', 
             `publish`= $publish,
             `save_path`='{$save_path}'
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