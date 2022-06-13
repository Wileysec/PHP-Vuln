<?php

require "../../config/config.php";
require "../../include/header.php";

$id = @$_GET['id']?$_GET['id']:1;

$stmt=$pdo->query("select * from news where id={$id}");

foreach ($stmt->fetchAll() as $k => $v) {
    foreach ($v as $key => $value) {}
}

?>
<div class="am-container">
    <h1 class="am-margin-top-lg">听说堆叠查询可以执行多条命令哦 ~ </h1>
</div>
