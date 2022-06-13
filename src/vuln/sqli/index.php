<?php

require "../../config/config.php";
require "../../include/header.php";

$id = @$_GET["id"]?$_GET['id']:1;

$sql = "select * from news where id=$id";

$smt = $pdo->query($sql);

$result = $smt->fetch();

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">联合查询注入</p>
        <p>任务目标：使用联合查询构造恶意SQL语句对数据库进行注入</p>
    </div>
    <article class="am-article am-margin-top-lg">
        <div class="am-article-hd">
            <h1 class="am-article-title"><?php echo $result['title']; ?></h1>
            <p class="am-article-meta"><?php echo $result['author']; ?></p>
        </div>

        <div class="am-article-bd">
            <p class="am-article-lead"><?php echo $result['contents']; ?></p>
        </div>
    </article>
</div>