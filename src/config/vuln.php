<?php

$data = [
    [
        "title" => "SQL注入 & XML实体注入","urls" => [
        "联合查询注入" => "/vuln/sqli/index.php?id=1",
        "报错注入" => "/vuln/sqli/sql2.php",
        "布尔盲注" => "/vuln/sqli/sql3.php?user=admin",
        "时间盲注" => "/vuln/sqli/sql4.php",
        "堆叠注入" => "/vuln/sqli/sql5.php",
        "宽字节注入" => "/vuln/sqli/sql6.php?name=admin",
        "Header头注入" => "/vuln/sqli/sql7.php",
        "二阶注入" => "/vuln/sqli/login.php",
        "XXE注入" => "/vuln/xxe/index.php"
    ]

    ],[
        'title' => "XSS跨站脚本攻击","urls" => [
            "反射型XSS" => "/vuln/xss/index.php",
            "存储型XSS" => "/vuln/xss/xss2.php",
            "DOM型XSS" => "/vuln/xss/xss3.php"
        ]
    ],[
        'title' => "SSRF","urls" => [
            "CSRF" => "/vuln/csrf/index.php",
            "SSRF" => "/vuln/ssrf/index.php",
            "反序列化" => "/vuln/serialize/index.php"
        ]
    ],[
        'title' => "文件操作","urls" => [
            "任意文件上传" => "/vuln/file/file_upload.php",
            "任意文件读取" => "/vuln/file/file_read.php?file_url=baidu.txt",
            "任意文件包含" => "/vuln/file/file_include.php"

        ]
    ],[
        'title' => "命令执行","urls" => [
            "命令执行" => "/vuln/exec/command.php",
            "代码执行" => "/vuln/exec/code.php",
            "SSTI模板注入" => "/vuln/ssti/index.php?content=成功渲染模板啦~"
        ]
    ],[
        'title' => "逻辑漏洞","urls" => [
            "暴力破解(撞库)" => "/vuln/login/login.php",
            "失效的验证码" => "/vuln/login2/login.php",
            "越权" => "/vuln/login3/login.php"
        ]
    ],
];