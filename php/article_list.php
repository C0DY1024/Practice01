<?php
require_once 'db.php';
require_once 'function.php';
$datas = get_publish_article();
?>



<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>所有文章</title>
    <meta name="description" content="公司網站">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <<?php include_once 'menu.php'; ?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php if(!empty($datas)):?>
                    <?php foreach($datas as $article):?>
                        <?php 
                                $absract = strip_tags($article['content']);
                                $absract = mb_substr($absract,0,100,"UTF-8");
                        ?>

                        <div class="card border-primary mb-3">
                        <div class="card-header text-bg-primary mb-3 fw-bold">
                            <a href="article.php?i=<?php echo $article["id"];?>"><?php echo $article['title']?></a>
                        
                        </div>
                        <div class="card-body">
                            <p class="card-text">    
                                <span class="badge text-bg-success"><?php echo $article['category']?></span>
                                <span class="badge text-bg-danger"><?php echo $article['create_date']?></span>   
                            </p>
                            <?php echo $absract."...更多";?>
                        </div>
                    </div>  
                    <?php endforeach;?>      
                    <?php endif;?>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>