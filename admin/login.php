<?php
require_once "../php/db.php";
if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
    header("Location: index.php");
};
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <meta name="description" content="會員登入">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-sm-0">
                    <div class="login_h1">會員登入</div>
                <form id="login_form" method="post" action="../php/verify_user.php">
                
                    <div class="row mb-4 justify-content-center">
                        <label for="username" class="col-sm-2 col-form-label">帳號</label>

                        <div class="col-sm-4">
                            <input type="text" name="username" id="username" class="form-control" placeholder="請輸入您的帳號" aria-describedby="usernameHelpInline"required>
                        </div>
                    </div>
              
                    <div class="row mb-4 justify-content-center">
                        <label for="password" class="col-sm-2 col-form-label">密碼</label>
            
                        <div class="col-sm-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="請輸入您的密碼" aria-describedby="passwordHelpInline" required>
                        </div>
                    </div>
               
                    <div class="d-flex justify-content-center"> 
                        <button type="submit" class="btn btn-primary">登入</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>

<script>
    $(document).ready(function () {
        
        $("#login_form").on("submit", function(){
            
            $.ajax({
                type : "POST",
                url : "../php/verify_user.php",
                data : {
                    'un':$("#username").val(),
                    'pw':$("#password").val(),
                },
                dataType :'html' 
            }).done(function(data){
                if(data == "yes")
                {
                    window.location.href="index.php";
                }
                else{
                    alert("登入失敗，請確認您的帳號密碼是否正確。")
                }

            }).fail(function(jqXHR, textStatus, errorThrown){
                alert("有錯誤發生，請看console log");
                console.log(jqXHR.responseText);
            });
            return false;
        });
    });
</script>
</body>
</html>