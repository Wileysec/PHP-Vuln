<?php

session_start();
require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from user where username=:username and password=:password";

    $smt = $pdo->prepare($sql);

    $smt->bindParam(":username",$username);
    $smt->bindParam(":password",$password);

    $smt->execute();

    $result = $smt->fetch();

    if($result){
        $_SESSION['login3_username'] = $username;
        echo "<script>alert('登录成功！');window.location.href='index.php';</script>";
        die();
    }else{
        echo "<script>alert('登录失败！');window.location.href='login.php';</script>";
    }

}

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">越权</p>
        <p>任务目标：修改alice账号并登录该账号完成越权操作</p>
    </div>
    <h1 class="am-margin-top-lg am-text-center">系统提示：默认账号为admin密码123456</h1>
    <form action="login.php" method="post" class="am-form">
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="text" name="username" placeholder="请输入用户名" class="am-form-field">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="password" name="password" placeholder="请输入密码" class="am-form-field">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="submit" value="登 录" class="am-form-field am-btn am-btn-primary">
            </div>
        </div>
    </form>
</div>
