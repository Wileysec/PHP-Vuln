<?php

session_start();
require "../../include/header.php";

?>
<div class="am-container">
    <h1 class="am-margin-top-lg">Hello，<?php echo $_SESSION['login3_username']; ?></h1>
    <hr>
    <h2>修改密码</h2>
    <form action="edit.php" method="post" class="am-form">
        <div class="am-form-group">
            <p>新密码：<input type="text" class="am-form-field" name="new_pass"></p>
        </div>
        <div class="am-form-group">
            <p>确认新密码：<input type="text" class="am-form-field" name="re_pass"></p>
        </div>
        <input type="hidden" name="username" value="<?php echo $_SESSION['login3_username']; ?>">
        <div class="am-form-group">
            <p><input type="submit" class="am-btn am-btn-primary" name="re_new_pass" value="提 交"></p>
        </div>
    </form>
</div>
