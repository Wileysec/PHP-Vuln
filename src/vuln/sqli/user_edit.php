<?php

session_start();
require "../../config/config.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $current_pass = $_POST['current_pass'];
    $password = $_POST['password'];
    $re_pass = $_POST['re_pass'];
    $username = $_SESSION['sqli_session'];

    if($current_pass == "" || $password == "" || $re_pass == ""){
        echo "<script>alert('表单数据不完整，请重新提交！');window.location.href='user.php';</script>";
        exit;
    }

    if($password != $re_pass){
        echo "<script>alert('两次密码不一致！');window.location.href='user.php';</script>";
        exit;
    }

    $sql = "update user set password='{$password}' where username='{$username}' and password='{$current_pass}'";

    $smt = $pdo->query($sql);

    $result = $smt->rowCount();

    if($result){
        echo "<script>alert('密码修改成功！');</script>";
    }else{
        echo "<script>alert('旧密码错误，密码修改失败！');</script>";
    }

    echo "<script>window.location.href='user.php';</script>";

}