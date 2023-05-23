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
                <h5 class="modal-title">會員登入</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="login_form" method="post" action="php/verify_user.php">
                <!-- 帳號 -->
                    <div class="btn_login_un">
                        <label for="username">帳號</label>
                        <div>
                            <input type="text" name="login_username" id="login_username" class="form-control" placeholder="請輸入您的帳號" aria-describedby="usernameHelpInline"required>
                        </div>
                    </div>
                <!-- 密碼 -->
                    <div class="btn_login_pw">
                        <label for="password">密碼</label>
                        <div>
                            <input type="password" name="login_password" id="login_password" class="form-control" placeholder="請輸入您的密碼" aria-describedby="passwordHelpInline" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">登入</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $("#login_form").on("submit", function(){
            
            $.ajax({
                type : "POST",
                url : "php/verify_user.php",
                data : {
                    un:$("#login_username").val(),
                    pw:$("#login_password").val(),
                },
                dataType :'html' 
            }).done(function(data){
                if(data == "yes")
                {
                    window.location.href="admin/index.php";
                }
                else{
                    alert("登入失敗，請確認您的帳號密碼是否正確。"+data)
                }

            }).fail(function(jqXHR, textStatus, errorThrown){
                alert("有錯誤發生，請看console log");
                console.log(jqXHR.responseText);
            });
            return false;
        });
    });
</script>