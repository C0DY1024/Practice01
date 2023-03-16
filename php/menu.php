<?php
$file_name = basename($_SERVER['PHP_SELF'], ".php"); 
    switch($file_name){
        case'article_list':
            $page_index = 1;
            break;
        case'article':
            $page_index = 1;
            break;    
        case'work_list':
            $page_index = 2;
            break;
        case'work':
            $page_index = 2;
            break;
        case'about':
            $page_index = 3;
            break;
        case'register':
            $page_index = 4;
            break;

        default:
            //預設index.php為首頁
            $page_index = 0;
            break;
    }
?>

<div class="top">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">公司網站</h1>

                    <ul class="nav nav-pills">
                        <li class="nav-item"><a <?php echo ($page_index==0)?'class="nav-link active"':'class="nav-link"'?> href="index.php">首頁</a></li>   
                        <li class="nav-item"><a <?php echo ($page_index==1)?'class="nav-link active"':'class="nav-link"'?> href="article_list.php">所有文章</a></li>
                        <li class="nav-item"><a <?php echo ($page_index==2)?'class="nav-link active"':'class="nav-link"'?> href="work_list.php">所有作品</a></li>
                        <li class="nav-item"><a <?php echo ($page_index==3)?'class="nav-link active"':'class="nav-link"'?> href="about.php">關於我們</a></li>
                        <li class="nav-item"><a <?php echo ($page_index==4)?'class="nav-link active"':'class="nav-link"'?> href="register.php">註冊</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>