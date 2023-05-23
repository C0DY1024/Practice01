<?php
require_once "../php/db.php";
require_once "../php/function.php";

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location:login.php");
};

$datas = get_all_member();

?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表-後台</title>
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
                    <a href="member_add.php" class="btn btn-primary">新增會員</a>  
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>帳號</th>
                                <th>名稱</th>
                                <th>管理動作</th>
                            </tr>  
                        </thead> 
                        <?php if(!empty($datas)): ?>
                            <?php foreach($datas as $data):?>
                                <tr>
                                    <td><?php echo $data['id'];?></td>
                                    <td><?php echo $data['username'];?></td>
                                    <td><?php echo $data['name'];?></td>
                                    <td>
                                        <a href="member_edit.php?i=<?php echo $data['id'];?>" class="btn btn-success">編輯</a>
                                        <a href="javascript:void(0);" class="btn btn-danger del_member" data-id="<?php echo $data['id'];?>">刪除</a>
                                    </td>
                                </tr>  
                            <?php endforeach;?>
                        <?php else: ?> 
                            <tr>
                                <td colspan="4">無資料</td>
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
            $("a.del_member").click(function(){
                var check = confirm("確定要刪除嗎?"),
                    this_tr = $(this).parent().parent();
                if(check){
                    $.ajax({
                    type : "POST",
                    url : "../php/del_member.php",
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