<?php

require "../../include/header.php";

$include_file = @$_GET['language']?$_GET['language']:"zh-cn";

$include_file = preg_replace("/(https|http)/","",$include_file);

?>
<div class="am-container">
    <h1 class="am-margin-top-lg">早读报</h1>
    <?php include $include_file.".php"; ?>

</div>
