<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <meta name="description" content="會員註冊">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once 'php/menu.php'; ?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-sm-0">
                <form id="register_form" method="post" action="php/add_member.php">
                <!-- 帳號 -->
                    <div class="row mb-4 justify-content-center">
                        <label for="username" class="col-sm-2 col-form-label">帳號</label>

                        <div class="col-sm-4">
                            <input type="text" name="username" id="username" class="form-control" placeholder="請輸入您的帳號" aria-describedby="usernameHelpInline"required>
                        </div>
                    </div>
                <!-- 密碼 -->
                    <div class="row mb-4 justify-content-center">
                        <label for="password" class="col-sm-2 col-form-label">密碼</label>
            
                        <div class="col-sm-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="請輸入您的密碼" aria-describedby="passwordHelpInline" required>
                        </div>
                    </div>
                <!-- 確認密碼 -->
                    <div class="row mb-4 justify-content-center">
                        <label for="confirm_password" class="col-sm-2 col-form-label">確認密碼</label>

                        <div class="col-sm-4">
                            <input type="password" id="confirm_password" class="form-control" placeholder="再次輸入您的密碼" aria-describedby="passwordHelpInline"required>
                        </div>
                    </div>
                <!-- 暱稱 -->
                    <div class="row mb-4 justify-content-center">
                            <label for="name" class="col-sm-2 col-form-label">暱稱</label>

                        <div class="col-sm-4">
                            <input type="text" name="name" id="name" class="form-control" placeholder="請輸入您的暱稱" aria-describedby="usernameHelpInline"required>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="d-flex justify-content-center"> 
                        <button type="submit" class="btn btn-primary">確認註冊</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'php/footer.php'; ?>
<script>
    $(document).ready(function () {
        $("#register_form").on("submit", function(){
            if($("#password").val() != $("#confirm_password").val()){
                
                $("#password").addClass('is-invalid');
                $("#confirm_password").addClass('is-invalid');
                alert("密碼有誤，請再次確認");
                return false;
            }
        });
    });
</script>
</body>
</html>