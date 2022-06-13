<?php

require "../../include/header.php";

$name = @$_GET['name'];

?>
<div class="am-container">
    <form class="am-form-inline am-margin-top-lg" action="index.php" method="get">
        <div class="am-form-group">
            <input type="text" name="name" placeholder="请输入你的名字" class="am-form-field">
            <button type="submit" class="am-btn am-btn-default" id="submit">登 录</button>
        </div>
    </form>
    <?php echo "<p class='am-text-lg'>欢迎 ".$name."，来到PHP漏洞靶场！</p>"; ?>
</div>