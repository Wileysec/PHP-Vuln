<?php

session_start();
error_reporting(0);
require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];
    $session_captcha = $_SESSION['captcha'];

    // if($captcha != $session_captcha){
    //     echo "<script>alert('验证码错误！');window.location.href='login.php'</script>";
    //     die();
    // }

    $sql = "select * from user where username=:username and password=:password";

    $smt = $pdo->prepare($sql);

    $smt->bindParam(":username",$username);
    $smt->bindParam(":password",$password);

    $smt->execute();

    $result = $smt->fetch();

    if($result){
        $_SESSION['login_username'] = $username;
        echo "<script>alert('登录成功！');window.location.href='index.php';</script>";
        die();
    }else{
        echo "<script>alert('登录失败！');window.location.href='login.php';</script>";
    }

}

if(@$_SESSION['login_username']){
    echo "<script>window.location.href='index.php';</script>";
    die();
}


?>
<div class="am-container">
    <h1 class="am-margin-top-lg am-text-center">用户登录</h1>
    <form action="login.php" method="post" class="am-form">
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="text" name="username" placeholder="请输入用户名" class="am-form-field"></p>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="password" name="password" placeholder="请输入密码" class="am-form-field"></p>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="text" name="captcha" placeholder="请输入验证码" class="am-form-field">
            </div>
            <div class="am-u-md-4">
                <p><img src="../../include/captcha/captcha.php"></p>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="submit" value="登 录" class="am-form-field am-btn am-btn-primary">
            </div>
        </div>
    </form>
</div>
