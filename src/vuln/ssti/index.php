<?php

require "./smarty/libs/Smarty.class.php";
require "../../include/header.php";

$smarty = new Smarty();
$content = @$_GET['content'];

$div = "
    <div class='am-container'>
        <h1 class='am-margin-top-lg'>正在使用PHP Smarty模板引擎渲染模板内容</h1>
        <p class='am-text-lg'>这是Smarty模板引擎渲染模板的内容</p>
        <p class='am-text-lg'>{$content}</p>
    </div>
";

$smarty->display("string:".$div);

?>

