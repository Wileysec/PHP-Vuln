<?php

require "../../include/header.php";

if(isset($_GET['target']) && $_GET['target'] != ""){

    // $target = preg_replace('/(&|\||>|<|\s)/im','',$_GET['target']);
    $target = $_GET['target'];

    // if(!preg_match("/(\b25[0-5]|\b2[0-4][0-9]|\b[01]?[0-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}/",$target)){
    //     echo "<script>alert('非法IPv4地址！');window.location.href='command.php';</script>";
    //     exit;
    // }

    $result = $output = "";

    if(stristr(php_uname('s'), 'Windows NT')){
        $result .= shell_exec('CHCP 52936 | ping '.$target." 2>&1");
    }else {
        $result.=shell_exec('ping -c 4 '.$target);
    }

}


?>
<div class="am-container">
    <h2 class="am-margin-top-lg am-text-center">欢迎使用网络管理员Web控制台</h2>
    <form action="command.php" method="get" class="am-form-inline am-margin-top-lg">
        <div class="am-g">
            <div class="am-u-md-4 am-u-md-push-4">
                <div class="am-form-group">
                    <input type="text" placeholder="请输入IP或域名" class="am-form-field" name="target" value="<?php echo @$target; ?>">
                    <input type="submit" value="检 测" class="am-form-field">
                </div>
            </div>
        </div>
    </form>
    <hr>
    <h3>Ping结果：</h3>
    <?php echo isset($result)?"<pre>{$result}</pre>":""; ?>
</div>