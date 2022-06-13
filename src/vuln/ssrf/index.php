<?php

require "../../config/config.php";
require "../../include/header.php";

$url = @$_GET['url'];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
$result = curl_exec($curl);

?>
<div class="am-container">
    <h2 class="am-margin-top-lg">加载远程图片</h2>
    <form action="index.php" method="get" class="am-form-inline am-margin-top-lg">
        <div class="am-form-group">
            <input type="text" name="url" class="am-form-field" placeholder="请输入图片地址">
        </div>
        <div class="am-form-group">
            <input type="submit" value="提 交" class="am-form-field">
        </div>
    </form>
    <hr>
    <img src="data:image/png;base64,<?php echo base64_encode($result); ?>" alt="">
</div>
