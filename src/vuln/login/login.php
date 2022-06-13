<?php

session_start();
require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captcha = $_POST['captcha'];
    $session_captcha = $_SESSION['captcha'];

    if($captcha != $session_captcha){
        echo "<script>alert('验证码错误！');window.location.href='login.php'</script>";
        die();
    }

    $sql = "select * from user where username=:username";

    $smt = $pdo->prepare($sql);

    $smt->bindParam(":username",$username);

    // $smt->bindParam(":username",$username);
    // $smt->bindParam(":password",$password);

    // $smt->execute();

    // $result = $smt->fetch();

    // $selectUser = $pdo->query("select * from user where username='{$username}'")->fetch();

    // if((time() >= (int)$selectUser['lock_time']) && !empty($selectUser['lock_time'])){
    //     $pdo->query("update user set lock_num=0,lock_time=NULL where username='{$username}'");
    //     $selectUser = $pdo->query("select * from user where username='{$username}'")->fetch();
    // }

    // if($selectUser['lock_num'] == 3){
    //     $pdo->query("update user set lock_num=".($selectUser['lock_num']+1)." where username='{$username}'");
    //     $pdo->query("update user set lock_time=".(time()+600)." where username='{$username}'");
    //     echo "<script>alert('登录失败次数过多！请等待10分钟后再试！');window.location.href='login.php'</script>";
    //     die();
    // }

    // if(($selectUser['lock_num'] > 3) && (time() < $selectUser['lock_time'])){
    //     echo "<script>alert('账号已锁定！请等待10分钟后再试！');window.location.href='login.php'</script>";
    //     die();
    // }

    // if($result){
    //     $pdo->query("update user set lock_num=0 where username='{$username}'");
    //     $pdo->query("update user set lock_time=NULL where username='{$username}'");
    //     $_SESSION['username'] = $username;
    //     echo "<script>alert('登录成功！');window.location.href='index.php'</script>";
    // }else{
    //     $pdo->query("update user set lock_num=".($selectUser['lock_num']+1)." where username='{$username}'");
    //     echo "<script>alert('用户名或密码错误！还可尝试".(3-$selectUser['lock_num'])."次！');window.location.href='index.php'</script></script>";
    //     die();
    // }

    if($result){
        $pass_sql = "select * from user where username='".$result['username']."' and password=:password";

        $pass_smt = $pdo->prepare($pass_sql);

        $pass_smt->bindParam(":password",$password);

        $pass_smt->execute();

        $pass_res = $pass_smt->fetch();

        if($pass_res){
            $_SESSION['username'] = $pass_res['username'];
            echo "<script>alert('登录成功！');window.location.href='index.php'</script>";
        }else{
            echo "<script>alert('密码错误！');</script>";
        }
    }else{
        echo "<script>alert('用户名错误！');</script>";
    }

}

?>
<div class="am-container">
    <h1 class="am-margin-top-lg am-text-center">用户登录</h1>
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
                <input type="text" name="captcha" placeholder="请输入验证码" class="am-form-field">
            </div>
            <div class="am-u-md-4">
                <p><img src="../../include/captcha/captcha.php"></p>
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="submit" value="登 录" class="am-form-field am-btn am-btn-primary">
            </div>
        </div>
    </form>
</div>
