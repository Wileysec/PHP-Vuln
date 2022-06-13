<?php

require "../../config/config.php";
require "../../include/header.php";

$user = @$_GET["name"]?addslashes($_GET['name']):'admin';

$pdo->query("set names gbk");

$sql = "select * from user where username='{$user}'";

$smt = $pdo->query($sql);

$result = $smt->fetchAll();

$num = count($result);

$i = 0;

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">宽字节注入</p>
        <p>任务目标：绕过过滤函数进行注入</p>
    </div>
    <?php echo "<h1 class='am-margin-top-lg'>{$user} 用户信息：</h1>" ?>
    <?php echo $result?"":"未查询到该用户信息！"; ?>
    <?php while($i < $num){ ?>
        <?php echo "<p class='am-text-lg'>用户名：{$result[$i]['username']}</p>"; ?>
        <?php echo "<p class='am-text-lg'>昵 称：{$result[$i]['name']}</p>"; ?>
        <?php echo "<p class='am-text-lg'>手机号：{$result[$i]['phone']}</p>"; ?>
        <?php echo "<p class='am-text-lg'>邮箱：{$result[$i]['email']}</p>"; ?>
    <?php $i++; } ?>
</div>