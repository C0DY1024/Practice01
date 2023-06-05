<?php
require_once "../php/db.php";
require_once "../php/function.php";

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location:login.php");
};

$data = get_edit_user($_GET['i']);

?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員編輯-後台</title>
    <meta name="description" content="公司網站">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once 'menu.php'; ?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="col-12 offset-sm-0">
                <form id="user_update_form" >
                    <input type="hidden" id="id" value="<?php echo $data['id'];?>">
                    <div class="row mb-4 justify-content-center">
                        <label for="username" class="col-sm-2 col-form-label">帳號</label>

                        <div class="col-sm-4">
                            <input type="text" name="username" id="username" class="form-control" placeholder="請輸入您的帳號" aria-describedby="usernameHelpInline"required value="<?php echo $data['username'] ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                這個使用者名稱已有人使用，請試試其他名稱。
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-4 justify-content-center">
                        <label for="password" class="col-sm-2 col-form-label">密碼</label>
            
                        <div class="col-sm-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="請輸入您的密碼" aria-describedby="passwordHelpInline">
                        </div>
                    </div>

                    <div class="row mb-4 justify-content-center">
                        <label for="confirm_password" class="col-sm-2 col-form-label">確認密碼</label>

                        <div class="col-sm-4">
                            <input type="password" id="confirm_password" class="form-control" placeholder="再次輸入您的密碼" aria-describedby="passwordHelpInline">
                        </div>
                    </div>

                    <div class="row mb-4 justify-content-center">
                            <label for="name" class="col-sm-2 col-form-label">暱稱</label>

                        <div class="col-sm-4">
                            <input type="text" name="name" id="name" class="form-control" placeholder="請輸入您的暱稱" aria-describedby="usernameHelpInline"required value="<?php echo $data['name'] ?>">
                        </div>
                    </div>

                    
                    <div class="d-flex justify-content-center"> 
                        <button type="submit" class="btn btn-primary">確認儲存</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#username').on("keyup", function(){
            if($(this).val() != '' && $(this).val()!="<?php echo $data['username'] ?>"){
                $.ajax({
                    type : "POST",
                    url : "../php/check_username.php",
                    data : {
                        'username':$(this).val()
                    },
                    dataType :'html' 
                }).done(function(data){
                    if(data =="exist"){
                        $("#username").removeClass('is-valid').addClass('is-invalid');

                        $("#register_form button").attr('disabled',true);
                    }
                    else{
                        $("#username").removeClass('is-invalid').addClass('is-valid');
                        $("#register_form button").attr('disabled',false);
                    }

                }).fail(function(jqXHR, textStatus, errorThrown){
                    alert("有錯誤發生，請看console log");
                    console.log(jqXHR.responseText);
                });
            }
            else
            {
                $("#username").removeClass('is-valid').removeClass('is-invalid')
                $("#register_form button").attr('disabled',false);
            }
        });

        $("#user_update_form").on("submit", function(){
            if($("#password").val() != $("#confirm_password").val()){
                
                $("#password").addClass('is-invalid');
                $("#confirm_password").addClass('is-invalid');
                alert("密碼有誤，請再次確認");
            }
            else{
                $.ajax({
                    type : "POST",
                    url : "../php/update_user.php",
                    data : {
                        id:$("#id").val(),
                        un:$("#username").val(),
                        pw:$("#password").val(),
                        n:$("#name").val(),
                    },
                    dataType :'html' 
                }).done(function(data){
                    if(data == "yes"){
                        alert("更新成功，請按確認轉跳列表頁");
                        window.location.href="member_list.php";
                    }
                    else{
                        alert("更新失敗。"+ data)
                    }

                }).fail(function(jqXHR, textStatus, errorThrown){
                    alert("有錯誤發生，請看console log");
                    console.log(jqXHR.responseText);
                });
            }
            return false;
        });
    });
</script>



</body>
</html>