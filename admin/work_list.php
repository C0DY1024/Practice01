<?php
require_once "../php/db.php";
require_once "../php/function.php";

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location:login.php");
};

$datas = get_all_works();

?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作品列表-後台</title>
    <meta name="description" content="公司網站">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include_once 'menu.php'; ?>

    <div class="main">
        <div class="container">
            <div class="row add_btn_area">
                <div class="col-xs-12">
                    <a href="work_add.php" class="btn btn-primary">新增作品</a>  
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th>簡介</th>
                                <th>分類</th>
                                <th>路徑</th>
                                <th>是否發布</th>
                                <th>上傳時間</th>
                                <th>管理動作</th>
                            </tr>  
                        </thead> 
                        <?php if(!empty($datas)): ?>
                            <?php foreach($datas as $data):?>
                                <tr>
                                    <td><?php echo $data['intro'];?></td>
                                    <td><?php echo $data['category'];?></td>
                                    <td><?php echo $data['save_path'];?></td>
                                    <td><?php echo ($data['publish'])?'是':'否';?></td>
                                    <td><?php echo $data['upload_date'];?></td>
                                    <td>
                                        <a href="work_edit.php?i=<?php echo $data['id'];?>" class="btn btn-success">編輯</a>
                                        <a href="javascript:void(0);" class="btn btn-danger del_work" data-id="<?php echo $data['id'];?>">刪除</a>
                                    </td>
                                </tr>  
                            <?php endforeach;?>
                        <?php else: ?> 
                            <tr>
                                <td colspan="5">無資料</td>
                            </tr>  
                        <?php endif; ?>
                    </table>  
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>
    

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    
    
    <script>
        $(document).ready(function () {
            $("a.del_work").click(function(){
                var check = confirm("確定要刪除嗎?"),
                    this_tr = $(this).parent().parent();
                if(check){
                    $.ajax({
                    type : "POST",
                    url : "../php/del_work.php",
                    data : {
                        id : $(this).attr("data-id")
                    },
                    dataType :'html' 
                }).done(function(data){
                    if(data == "yes")
                    {
                        alert("刪除成功!");
                        this_tr.fadeOut();
                    }
                    else
                    {
                        alert("刪除失敗。");
                    }

                }).fail(function(jqXHR, textStatus, errorThrown){
                    alert("有錯誤發生，請看console log");
                    console.log(jqXHR.responseText);
                });
                }
                    
            });
        });
    </script>

</body>
</html>