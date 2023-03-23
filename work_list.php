<?php
require_once 'php/db.php';
require_once 'php/function.php';
$datas = get_publish_works();
?>



<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>所有作品</title>
    <meta name="description" content="公司網站">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once 'php/menu.php'; ?>

    <div class="main">
        <div class="container">
            <div class="row">

                    <?php if(!empty($datas)):?>
                        <?php foreach($datas as $works):?>
                            <div class="col-xs-12 col-sm-4">
                                <div class="card" style="width: 18rem;">
                                    <?php if($works['image_path']):?>
                                        <img src="<?php echo $works['image_path']; ?>".class="card-img-top">
                                    <?php else:?>
                                        <video src="<?php echo $works['video_path']; ?>".class="card-img-top" controls></video>

                                    <?php endif;?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $works['intro'];?></h5>
                                        <a href="work.php?i=<?php echo $works['id']; ?>" class="btn btn-primary">查看</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>  
                    
                    <?php else:?>
                        <h1>沒有作品</h1>
                    <?php endif;?>
                
            </div>
        </div>
    </div>

    <?php include_once 'php/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>