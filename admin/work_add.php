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
    <title>新增作品-後台</title>
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
                    <h2>新增作品</h2>

                    <form id="work">
                        <div class="mb-3">
                            <label for="intro" class="form-label">簡介</label>
                            <textarea class="form-control" id="intro" rows="2" placeholder="請輸入標題"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">分類</label>
                            <select id="category" class="form-select" >   
                                <option value="圖片">圖片</option>
                                <option value="影片">影片</option>
                            </select>
                        </div>
                        

                        <div class="mb-3">
                            <input accept="image/gif, image/jpeg, image/png, video/mp4" type='file' id="upload_file" name='upload_file'/>
                            <input type="hidden" id="image_path" value="">
                            <input type="hidden" id="video_path" value="">
                            <div><img class="preview_img" id="preview_img" src="../files/images/圖片預覽.png" /></div>
                            <div><video class="preview_video" id="preview_video"src="" controls> </div>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="publish" value="1" checked>
                            <label class="form-check-label">發布</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="publish"  value="0">
                            <label class="form-check-label">不發布</label>
                        </div>
                        <div class="add_work _btn">
                            <button type="submit" class="btn btn-secondary">新增</button>
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
        $(upload_file).on("change", function() {
            let file_type = upload_file.files[0].type;
            if (upload_file.files[0] && file_type == "video/mp4") {
                $("#preview_video").show();
                $("#preview_img").hide();
                preview_video.src = URL.createObjectURL(upload_file.files[0]);
            }else{
                $("#preview_img").show();
                $("#preview_video").hide();
                preview_img.src = URL.createObjectURL(upload_file.files[0]);
            }
        });
                 
        $("#work").on("submit", function(){
            let file_data = new FormData();
            let file_type = upload_file.files[0].type;
            if($("#intro").val()==''){
                alert('請填妥標題簡介');
            }
            else if(($("#category").val()=="圖片"&& file_type == "video/mp4")||($("#category").val()=="影片" && file_type != "video/mp4")){
                alert('請確認檔案類型');
                }else{
                     
                    if(file_type == "video/mp4"){
                        save_path="files/videos/"+upload_file.files[0]['name'];
                    }else{
                        save_path="files/images/"+upload_file.files[0]['name'];   
                    };

                    file_data.append("file", upload_file.files[0]);
                    file_data.append("intro", $("#intro").val());
                    file_data.append("category", $("#category").val());
                    file_data.append("publish", $("input[name='publish']:checked").val());
                    file_data.append("save_path", save_path);
                    
                    $.ajax({
                        type : 'POST',
                        url : '../php/upload_file.php',
                        data : file_data,
                        cache : false, 
                        processData : false, 
                        contentType : false, 
                        dataType : 'html'
                    }).done(function(data) {
                        if (data == "yes") {
                            alert("新增成功，點擊確認回列表");
                            window.location.href = "work_list.php";
                        } else {
                            alert("更新錯誤");
                            console.log(data);
                        }

                    }).fail(function(data) {
                        //失敗的時候
                        alert("有錯誤產生，請看 console log");
                        console.log(jqXHR.responseText);
                    });
                    }
                    return false;
                }
        )});
</script>



</body>
</html>