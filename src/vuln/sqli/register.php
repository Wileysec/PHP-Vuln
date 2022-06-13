<?php

require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_pass = $_POST['re_pass'];

    if($username == "" || $password == "" || $re_pass == ""){
        echo "<script>alert('表单数据不完整，请重新提交！');window.location.href='register.php';</script>";
        exit;
    }

    $sql = "insert into user(username,password) value(?,?)";

    $smt = $pdo->prepare($sql);

    $smt->bindParam(1,$username);
    $smt->bindParam(2,$password);

    $smt->execute();

    $result = $smt->rowCount();

    if($result){
        echo "<script>alert('注册成功，即将跳转登录页！');window.location.href='login.php';</script>";
    }else{
        echo "<script>alert('很抱歉，注册失败！');window.location.href='register.php';</script>";
    }

}

?>
<div class="am-container">
    <h1 class="am-margin-top-lg am-text-center">用户注册</h1>
    <form action="register.php" method="post" class="am-form">
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
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="password" name="re_pass" placeholder="请确认密码" class="am-input-sm">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4 am-text-right">
                <a href="login.php">已注册？前去登录</a>
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="submit" value="注 册" class="am-form-field am-btn am-btn-primary">
            </div>
        </div>
    </form>
</div>
