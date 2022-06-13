<?php

// 设置数据库信息
$db_host = "127.0.0.1";
$db_name = "bachang";
$db_user = "root";
$db_pass = "root";

// PDO连接数据库，驱动PDO
try{
    $pdo = new PDO("mysql:host=".$db_host.";dbname=".$db_name.";charset=utf8",$db_user,$db_pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (Exception $e){
    die("Error: ".$e->getMessage());
}