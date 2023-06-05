<?php
require_once "../php/db.php";

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location:login.php");
};

?>


<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增文章-後台</title>
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
                    <form id="article">
                        <div class="mb-3">
                            <label for="title" class="form-label">標題</label>
                            <input type="text" class="form-control" id="title" placeholder="請輸入標題">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">分類</label>
                            <select id="category" class="form-select" >   
                                <option value="新聞">新聞</option>
                                <option value="心得">心得</option>
                                <option value="讀者投稿">讀者投稿</option>
                            </select>
                        </div>
                        

                        <div class="mb-3">
                            <label for="content" class="form-label">內文</label>
                            <textarea class="form-control" id="content" rows="8"></textarea>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="publish" value="1" checked>
                            <label class="form-check-label">發布</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="publish"  value="0">
                            <label class="form-check-label">不發布</label>
                        </div>
                        <div class="add_article_btn">
                            <button type="submit" class="btn btn-secondary">儲存</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
    $(document).ready(function () {
        
        $("#article").on("submit", function(){
            if($("#title").val()=='' || $("#content").val() ==''){
                alert('請填妥標題或內文');
            }
            else{
                $.ajax({
                type : "POST",
                url : "../php/add_article.php",
                data : {
                    'title':$("#title").val(),
                    'category':$("#category").val(),
                    'content':$("#content").val(),
                    'publish':$("input[name='publish']:checked").val(),
                },
                dataType :'html' 
            }).done(function(data){
                if(data == "yes")
                {
                    alert("新增成功!點擊確認回到列表頁。");
                    window.location.href="article_list.php";
                }
                else{
                    alert("新增失敗。")
                }

            }).fail(function(jqXHR, textStatus, errorThrown){
                alert("有錯誤發生，請看console log");
                console.log(jqXHR.responseText);
            });
            return false;
            }

        });
    });
</script>



</body>
</html>