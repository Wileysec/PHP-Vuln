<?php

require "../../config/config.php";
require "../../include/header.php";

$user_agent = $_SERVER['HTTP_USER_AGENT'];

$sql = "insert into log(user_agent) value('{$user_agent}')";

$smt = $pdo->query($sql);

$result = $smt->rowCount();

?>
<div class="am-container">
    <?php echo $user_agent?"<p class='am-margin-top-lg am-text-lg'>你的浏览器特征 {$user_agent} 我们已经记录!</p>":"<p class='am-margin-top-lg am-text-lg'>未检测到你的浏览器特征</p>"; ?>
</div>