<?php

require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = @$_POST['username'];
    $password = @$_POST['password'];

    try{
        $sql = "select * from user where username='{$username}' and password='{$password}'";

        $smt = $pdo->query($sql);

        $result = $smt->fetch();
    }catch (Exception $e){
        echo $e->getMessage();
        die();
    }

}

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">报错注入</p>
        <p>任务目标：使用数据库的报错函数对数据库进行注入</p>
    </div>
    <h1 class="am-margin-top-lg am-text-center">用户登录</h1>
    <?php

    if(isset($result)){
        echo $result?"<div class='am-alert am-alert-success am-margin-top-lg' data-am-alert>
        <button type='button' class='am-close'>&times;</button>
        <p>登录成功</p>
    </div>":"<div class='am-alert am-alert-danger am-margin-top-lg' data-am-alert>
        <button type='button' class='am-close'>&times;</button>
        <p>登录失败</p>
    </div>";
    }

    ?>
    <form class="am-form am-margin-top-lg" method="post">

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
                <input type="submit" value="登 录" class="am-form-field am-btn am-btn-primary">
            </div>
        </div>

    </form>
</div>