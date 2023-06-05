<?php
$file_name = basename($_SERVER['PHP_SELF'], ".php"); 
    switch($file_name){

        case'article_list':
        case'article_edit':
        case'article_add':
            $page_index = 1;
            $title = "文章管理";
            break;  

        case'work_list':
        case'work_edit':
        case'work_add':
            $page_index = 2;
            $title = "作品管理";
            break;

        case'member_list':
        case'member_edit':
        case'member_add':
            $page_index = 3;
            $title = "會員管理";
            break;

        default:
            $page_index = 0;
            $title = "XX公司網站";
            break;
    }
?>

<div class="top">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                <div class="d-flex justify-content-end"> 
                    <a href="logout.php" class="btn btn-primary">登出</a>  
                </div>
                    <h1 class="text-center"><?php echo $title;?></h1>
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="../index.php">回前台首頁</a></li> 
                        <li class="nav-item"><a <?php echo ($page_index==0)?'class="nav-link active"':'class="nav-link"'?> href="index.php">後台首頁</a></li>   
                        <li class="nav-item"><a <?php echo ($page_index==1)?'class="nav-link active"':'class="nav-link"'?> href="article_list.php">文章管理</a></li>
                        <li class="nav-item"><a <?php echo ($page_index==2)?'class="nav-link active"':'class="nav-link"'?> href="work_list.php">作品管理</a></li>
                        <li class="nav-item"><a <?php echo ($page_index==3)?'class="nav-link active"':'class="nav-link"'?> href="member_list.php">會員管理</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

