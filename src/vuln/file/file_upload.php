<?php

require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_FILES){
        $file_type = $_FILES['filename']['type'];
        $arr_type = ['image/jpeg','image/png','image/jpg','image/gif'];
        // 允许上传的文件后缀
        // $allow_suffix = ['jpg','png','jpeg','gif'];

        // 获取文件后缀，若有多个后缀则取最后一个
        // $suffix_arr = explode('.',$_FILES['filename']['name']);
        // $file_suffix = strtolower(array_pop($suffix_arr));

        if(in_array($file_type,$arr_type)){
            $tmp_file = $_FILES["filename"]["tmp_name"];
            $file_name = $_FILES['filename']['name'];

            // 判断文件后缀是否是在允许上次文件后缀白名单内
            // if(!in_array($file_suffix,$allow_suffix)){
            //     echo "<script>alert('不允许上传的文件类型！');window.location.href='file_upload.php';</script>";
            //     exit;
            // }

            

            $upload_file = "./uploads/".$file_name;

            if(move_uploaded_file($tmp_file,$upload_file)){
                $file_status = [
                        "status" => 0,
                        "info" => "文件上传成功！文件地址：".$upload_file
                ];
            }else{
                $file_status = [
                    "status" => 1,
                    "info" => "文件上传失败！"
                ];
            }


        }else{
            echo "<script>alert('上传文件类型错误！');window.location.href='file_upload.php';</script>";
            exit;
        }

    }else{
        echo "<script>alert('没有上传文件，请重新上传！');</script>";
    }
}

?>
<div class="container">
    <h1 class="am-margin-top-lg am-text-center">上传图片</h1>
    <div class="am-g am-margin-top">
        <div class="am-u-md-4 am-u-md-push-4">
            <div class="am-alert am-alert-warning" data-am-alert>
                <button type="button" class="am-close">&times;</button>
                <p>仅限上传*.jpg/*.png/*.jpeg/*.gif文件</p>
            </div>
        </div>
    </div>
    <form action="./file_upload.php" method="post" class="am-form" enctype="multipart/form-data">
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="file" name="filename" class="am-form-file">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="submit" value="上 传" class="am-form-field am-btn am-btn-primary">
            </div>
        </div>
    </form>
    <?php if(isset($file_status)){ ?>
    <div class="am-g am-margin-top">
        <div class="am-u-md-4 am-u-md-push-4">
            <?php $status = $file_status?'success':'danger';  echo "<div class='am-alert am-alert-{$status}' data-am-alert>"; ?>
                <button type="button" class="am-close">&times;</button>
                <p><?php echo $file_status['info']; ?></p>
            </div>
        </div>
    <?php } ?>
</div>
