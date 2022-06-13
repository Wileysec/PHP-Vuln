<?php

session_start();
require "../../include/header.php";

if(!$_SESSION['login_username']){
    echo "<script>alert('未登录，请重新登录！');window.location.href='login.php';</script>";
    die();
}

?>
<div class="am-container">
    <h1 class="am-margin-top-lg">欢迎您，<?php echo $_SESSION['login_username']; ?></h1>
</div>
