<?php

require "../../config/config.php";
require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $content = $_POST['content'];

    $sql = "insert into message(username,content) value('{$username}','{$content}')";

    $smt = $pdo->query($sql);

    $result = $smt->rowCount();

}

$select_sql = "select * from message";

$select_smt = $pdo->query($select_sql);

$select_res = $select_smt->fetchAll();


?>
<div class="am-container">
    <h1 class="am-margin-top-lg">市民留言板</h1>
    <?php
        if(isset($result)){
            echo $result?"<div class='am-alert am-alert-success am-margin-top-lg' data-am-alert>留言成功</div>":"<div class='am-alert am-alert-danger am-margin-top-lg' data-am-alert>留言失败</div>";
        }
    ?>
    <form class="am-margin-top-lg" method="post" action="xss2.php">
        <div class="am-form-group">
            <input type="text" name="username" placeholder="请输入你的名字" class="am-form-field">
        </div>
        <div class="am-form-group">
            <textarea name="content" cols="20" rows="10" class="am-form-field" style="resize:none;" placeholder="给我们提些建议吧..."></textarea>
        </div>
        <div class="am-form-group">
            <input type="submit" class="am-btn am-btn-primary" id="submit" value="提 交">
        </div>
    </form>
    <hr>
    <?php foreach($select_res as $res){ ?>
    <p class="am-margin-top-lg am-margin-bottom-lg am-text-lg">
        <span><?php echo $res['username']; ?>：</span>
        <span><?php echo $res['content']; ?></span>
    </p>
    <?php } ?>
</div>
<script>

</script>
