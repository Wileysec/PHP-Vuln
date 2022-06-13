<?php
session_start();
require "../../config/config.php";
require "../../include/header.php";

if(@$_SESSION['csrf_username']){
    $smt = $pdo->prepare("select * from bank where username=:username");
    $smt->bindParam(":username",$_SESSION['csrf_username']);
    $smt->execute();
    $res = $smt->fetch();
    
    $_SESSION['money'] = $res['money'];

}else{
    echo "<script>window.location.href='login.php'</script>";
    die();
}

?>
<div class="am-container">
    <h3 class="am-margin-top-lg"><?php echo $res['username'] ?>(<?php echo $res['idCard'] ?>)，欢迎回来！ <a href="logout.php">登出系统</a></h3>
    <p>您目前的账户余额为：<span class="am-text-danger"><?php echo $res['money'] ?></span>元</p>
    <hr>
    <h3 class="am-text-lg">向他人转账：</h3>
    <form action="transmit.php" method="post" class="am-form">
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-0" style="padding-left:0px;padding-right:0px;">
                <div class="am-form-group">
                    <p>转账账户卡号：<input type="text" name="idCard" class="am-form-field"></p>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-0" style="padding-left:0px;padding-right:0px;">
                <div class="am-form-group">
                    <p>转账余额：<input type="text" name="money" class="am-form-field"></p>
                </div>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-0" style="padding-left:0px;padding-right:0px;">
                <div class="am-form-group">
                    <p><input type="submit" value="确认转账" class="am-form-field am-btn-primary"></p>
                </div>
            </div>
        </div>
    </form>
</div>
