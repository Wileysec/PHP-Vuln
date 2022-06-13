<?php

require "../../include/header.php";

$file_url = @$_GET['file_url'];

// 修复方法
// if($file_url){
//     $allow_file = ['baidu.txt'];

//     if(preg_match_all("/(\.\.\/)|(\.\.)|(\.\/)/i",$file_url) || !in_array($file_url,$allow_file)){
//         echo "<script>alert('禁止非法访问！');window.location.href='file_read.php';</script>";
//         exit;
//     }
// }

@$result = file_get_contents($file_url);

// php://filter/read=convert.base64-encode/resource=file_read.php

?>
<div class="am-container">
    <h2 class="am-margin-top-lg">请仔细阅读百度版权信息</h2>
    <?php echo "<p class='am-text-primary'>$result</p>"; ?>
</div>
