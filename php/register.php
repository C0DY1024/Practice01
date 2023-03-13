<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>公司網站</title>
    <meta name="description" content="公司網站">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="top">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center">註冊</h1>

                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="../index.php">首頁</a></li>   
                                <li class="nav-item"><a class="nav-link" href="article_list.php">所有文章</a></li>
                                <li class="nav-item"><a class="nav-link" href="work_list.php">所有作品</a></li>
                                <li class="nav-item"><a class="nav-link" href="about.php">關於我們</a></li>
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="register.php">註冊</a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" role="alert">歡迎來到XX公司網站!</div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                       <p class="text-center"> &copy; <?php echo date("Y");?> XX公司版權所有</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>