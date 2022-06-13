<?php
header("Access-Control-Allow-Origin: null");
session_start();
include("../../config/config.php");

if($_SESSION['csrf_username']){
    $idCard = $_POST['idCard'];
    $money = $_POST['money'];
    $transferor = $_SESSION['csrf_username'];

    if($idCard == '' || $money == '' || $transferor == ''){
        echo "<script>alert('转账信息有误！');window.location.href='index.php'</script>";
        die();
    }

    if($_SESSION['money'] < $money && $_SESSION['csrf_username'] == $transferor){
        echo "<script>alert('余额不足，无法转账！');window.location.href='index.php'</script>";
        die();
    }

    $sql = "update bank set money = money - $money where username='$transferor'";
    $sql2 = "update bank set money = money + $money where idCard='$idCard'";
    $smt = $pdo->prepare($sql);
    $smt2 = $pdo->prepare($sql2);
    if($smt->execute() && $smt2->execute()){
        echo "<script>alert('转账成功！');window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('转账失败，扣款未成功！');window.location.href='index.php'</script>";
    }
}