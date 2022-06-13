<?php
session_start();
require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    if($password != $re_password){
        echo "<script>alert('两次密码不一致！');window.location.href='login.php'</script>";
        die();
    }

    $select_sql = "select * from bank";

    $select_smt = $pdo->query($select_sql);

    $select_result = $select_smt->fetchAll();

    $last_card = $select_result[count($select_result)-1]['idCard'];

    $idCard = $last_card + 1;

    $money = 0;

    $sql = "insert into bank(idCard,username,password,money) value(?,?,?,?)";

    $smt = $pdo->prepare($sql);
    $smt->bindParam(1,$idCard);
    $smt->bindParam(2,$username);
    $smt->bindParam(3,$password);
    $smt->bindParam(4,$money);
    $smt->execute();
    if($smt->rowCount()){
        echo "<script>alert('银行账户已开通！');window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('银行账户开通失败！请联系管理员处理');window.location.href='register.php'</script>";
    }
}

?>
<div class="am-container">
    <h1 class="am-margin-top-lg am-text-center">银行账户注册</h1>
    <form action="./register.php" method="post" class="am-form am-margin-top-lg">
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <div class="am-form-group">
                    <p>用户名:<input type="text" name="username" class="am-form-field"></p>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <div class="am-form-group">
                    <p>密码:<input type="password" name="password" class="am-form-field"></p>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <div class="am-form-group">
                    <p>确认密码:<input type="password" name="re_password" class="am-form-field"></p>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <div class="am-form-group">
                    <input type="submit" value="登 录" class="am-form-field am-btn-primary">
                    <a href="login.php">已有账户？登录银行账户</a>
                </div>
            </div>
        </div>
    </form>
</div>