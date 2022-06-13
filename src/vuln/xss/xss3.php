<?php

require "../../include/header.php";

?>
<div class="am-container">
    <div class="am-form-inline am-margin-top-lg">
        <div class="am-form-group">
            <input type="text" id="name" placeholder="请输入你的名字" class="am-form-field">
            <button type="submit" class="am-btn am-btn-default" id="submit">登 录</button>
        </div>
    </div>
    <p class="am-text-lg">您的名字是：<span id="html"></span></p>
</div>
<script>
    $("#submit").click(function(){
        $("#html").append($("#name").val());
    });
</script>