<?php
session_start();
require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $smt = $pdo->prepare("select * from bank where username=:username and password=:password");
    $smt->bindParam(":username",$username);
    $smt->bindParam(":password",$password);
    $smt->execute();
    if($smt->fetch()){
        $_SESSION['token'] = md5($username+"JADiuhuYgFjsshhSgfS");
        $_SESSION['csrf_username'] = $username;
        echo "<script>window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('账户密码错误！');window.location.href='login.php'</script>";
    }
}

$select_sql = "select * from bank";

$select_smt = $pdo->query($select_sql);

$select_result = $select_smt->fetchAll();


?>
<div class="am-container">
    <h1 class="am-margin-top-lg am-text-center">银行账户登录</h1>
    <form action="./login.php" method="post" class="am-form am-margin-top-lg">
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
                    <input type="submit" value="登 录" class="am-form-field am-btn-primary">
                    <a href="register.php">没有账户？注册银行账户</a>
                </div>
            </div>
        </div>
    </form>
    <h3 class="am-margin-top-lg">我行用户列表</h3>
    <table class="am-table am-table-bordered am-table-striped am-table-hover">
        <thead>
            <tr>
                <th>卡 号</th>
                <th>姓 名</th>
                <th>金 额</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($select_result as $res){ ?>
            <tr>
                <td><?php echo $res['idCard']; ?></td>
                <td><?php echo $res['username']; ?></td>
                <td><?php echo $res['money']; ?>元</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

