<?php


require "../../include/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $login_username = 'admin';
    $login_password = 'admin';
    $result = null;

    libxml_disable_entity_loader(false);
    $xmlfile = file_get_contents('php://input');

    try{
        $dom = new DOMDocument();
        $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
        $creds = simplexml_import_dom($dom);

        $username = $creds->username;
        $password = $creds->password;

        if($username == $login_username && $password == $login_password){
            echo $result = sprintf("<result><code>%d</code><msg>%s</msg></result>",1,$username);
        }else{
            echo $result = sprintf("<result><code>%d</code><msg>%s</msg></result>",0,$username);
        }
    }catch(Exception $e){
        echo $result = sprintf("<result><code>%d</code><msg>%s</msg></result>",3,$e->getMessage());
    }
}

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">XXE注入</p>
        <p>任务目标：构造恶意的XML语句读取目标系统上的文件</p>
    </div>
    <h2 class="am-margin-top-lg am-text-center">系统提示：默认账号密码为admin，不是管理员请勿登录！</h2>
    <form class="am-form am-margin-top-lg" method="post">
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="text" class="am-input-sm" name="username" placeholder="请输入用户名">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="password" class="am-input-sm" name="password" placeholder="请输入密码">
            </div>
        </div>
        <div class="am-g am-margin-top">
            <div class="am-u-md-4 am-u-md-push-4">
                <input type="submit" class="am-form-field am-btn am-btn-primary" value="登 录" id="submit">
            </div>
        </div>
    </form>
</div>
<script>
    $("#submit").click(function(){
        $("form").submit(function(e){
            e.preventDefault();
        });
        username = $("input[name=username]").val();
        password = $("input[name=password]").val();
        if(username == "" || password == ""){
            alert("请输入账号密码");
            return;
        }

        var data = "<user><username>" + username + "</username><password>" + password + "</password></user>";
        $.ajax({
            type: "POST",
            url: "index.php",
            contentType: "application/xml;charset=utf-8",
            data: data,
            dataType: "xml",
            success: function (result) {
                var code = result.getElementsByTagName("code")[0].childNodes[0].nodeValue;
                var msg = result.getElementsByTagName("msg")[0].childNodes[0].nodeValue;
                if(code == "0"){
                    $(".msg").text(msg + " login fail!");
                }else if(code == "1"){
                    $(".msg").text(msg + " login success!");
                }else{
                    $(".msg").text("error:" + msg);
                }
            },
            error: function (XMLHttpRequest,textStatus,errorThrown) {
                $(".msg").text(errorThrown + ':' + textStatus);
            }
        });
    });
</script>
