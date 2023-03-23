<?php 
@session_start();

// 取得已發布文章(文章概覽) 用於 article list.php
function get_publish_article()
{
    $datas = array();
    $sql ="SELECT * FROM `article` WHERE `publish` = 1";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        // 執行成功
        if(mysqli_num_rows($query)>0)
        {
            while ($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else
    {
        // 執行失敗
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $datas;
}

// 取得被點擊的此文章(進入被點擊的文章) 用於article.php
function get_article($id)
{
    $result = null;
    $sql ="SELECT * FROM `article` WHERE `publish` = 1 AND `id` ={$id}";
    $query = mysqli_query($_SESSION['link'], $sql);
    if($query)
    {
        // 執行成功
        if(mysqli_num_rows($query)==1)
        {
            $result = mysqli_fetch_assoc($query);
        }
    }
    else
    {
        // 執行失敗
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
        // 執行成功
        if(mysqli_num_rows($query)>0)
        {
            while ($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else
    {
        // 執行失敗
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
        // 執行成功
        if(mysqli_num_rows($query)==1)
        {
            $result = mysqli_fetch_assoc($query);
        }
    }
    else
    {
        // 執行失敗
        echo "{$sql}語法請求失敗:<br/>". mysqli_error($_SEESION['link']);
    }
    return $result;
}

?>