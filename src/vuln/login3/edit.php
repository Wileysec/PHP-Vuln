<?php

require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $new_pass = $_POST['new_pass'];
    $re_pass = $_POST['re_pass'];

    if($new_pass != $re_pass){
        echo "<script>alert('两次密码不一致！');window.location.href='index.php';</script>";
        die();
    }

    $sql = "update user set password=? where username=?";

    $smt = $pdo->prepare($sql);

    $smt->bindParam(1,$new_pass);
    $smt->bindParam(2,$username);

    $smt->execute();

    $result = $smt->rowCount();

    if($result){
        echo "<script>alert('密码修改成功！');window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('密码修改失败！');window.location.href='index.php';</script>";
    }



}