<?php

session_start();
require "../../config/config.php";
require "../../include/header.php";

if(!isset($_SESSION['sqli_session'])){
    echo "<script>alert('未登录，请重新登录！');window.location.href='login.php';</script>";
    die;
}

?>
<div class="am-container">
    <h1 class="am-margin-top-lg am-text-center">Hi, <?php echo $_SESSION['sqli_session']; ?></h1>
    <p class="am-margin-top-lg am-text-center am-text-lg">请重新修改密码</p>
    <form action="user_edit.php" method="post" class="am-form">
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="text" name="current_pass" placeholder="请输入当前密码" class="am-input-sm">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="password" name="password" placeholder="请输入新密码" class="am-input-sm">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="password" name="re_pass" placeholder="请再次确认新密码" class="am-input-sm">
            </div>
        </div>

        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="submit" value="修 改" class="am-form-field am-btn am-btn-primary">
            </div>
        </div>
    </form>
</div>
