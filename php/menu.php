<?php
$file_name = basename($_SERVER['PHP_SELF'], ".php"); 
    switch($file_name){
        case'article_list':
            $page_index = 1;
            $title = "文章列表";
            break;
        case'article':
            $page_index = 1;
            $title = "文章列表";
            break;    
        case'work_list':
            $page_index = 2;
            $title = "作品列表";
            break;
        case'work':
            $page_index = 2;
            $title = "作品列表";
            break;
        case'about':
            $page_index = 3;
            $title = "關於我們";
            break;
        case'register':
            $page_index = 4;
            $title = "會員註冊";
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
                        登入
                    </button>
                </div>
                    <h1 class="text-center"><?php echo $title;?></h1>
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

<div class="modal" id="login" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>