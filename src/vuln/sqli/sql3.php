<?php

require "../../config/config.php";
require "../../include/header.php";

$user = @$_GET["user"]?$_GET['user']:'admin';

$sql = "select * from news where post_user='{$user}'";

$smt = $pdo->query($sql);

$result = $smt->fetchAll();

$num = count($result);

@$author = $result[0]['author'];

$i = 0;

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">布尔盲注</p>
        <p>任务目标：仔细对SQL语句测试，对数据库进行注入</p>
    </div>
    <?php echo "<h1 class='am-margin-top-lg'>统计发布者文章：</h1>" ?>
    <?php if($num){ ?>
    <article class="am-article am-margin-top-lg">
        <div class="am-article-hd">
            <h1 class="am-article-title"><?php echo "发布者：".$user; ?></h1>
            <p class="am-article-meta"><?php echo "共发表了 ".$num." 篇文章" ?></p>
        </div>
    </article>
    <?php 
        }else{
            echo '<div class="am-alert am-alert-danger am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">查询错误</p>
    </div>';
        }
    ?>
</div>