<?php

session_start();
require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password == ""){
        echo "<script>alert('表单数据不完整，请重新提交！');window.location.href='login.php';</script>";
        exit;
    }

    $sql = "select * from user where username=? and password=?";

    $smt = $pdo->prepare($sql);

    $smt->bindParam(1,$username);
    $smt->bindParam(2,$password);

    $smt->execute();

    $result = $smt->fetch();

    if($result){
        $_SESSION['sqli_session'] = $username;
        echo "<script>window.location.href='user.php';</script>";
    }else{
        echo "<script>alert('账号或密码错误！');window.location.href='login.php';</script>";
    }

}

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">二次注入</p>
        <p>任务目标：修改admin账号的密码并登录</p>
    </div>
    <h1 class="am-margin-top-lg am-text-center">用户登录</h1>
    <form action="login.php" method="post" class="am-form">
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="text" name="username" placeholder="请输入用户名" class="am-input-sm">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="password" name="password" placeholder="请输入密码" class="am-input-sm">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4 am-text-right">
                <a href="register.php">未注册？前去注册</a>
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="submit" value="登 录" class="am-form-field am-btn am-btn-primary">
            </div>
        </div>
    </form>
</div>
