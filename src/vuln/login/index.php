<?php
session_start();

require "../../include/header.php";

?>
<div class="am-container">
    <h1 class="am-margin-top-lg">Hello，<?php echo $_SESSION['username']; ?></h1>
    <p class="am-margin-top-lg">您已登录成功！</p>
</div>
