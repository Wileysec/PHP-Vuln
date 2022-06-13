<?php
// +----------------------------------------------------------------------
// | [ I'm just a comment ]
// +----------------------------------------------------------------------
// | Copyright (c) 2021 rights reserved.
// +----------------------------------------------------------------------
// | Author: Wiley
// +----------------------------------------------------------------------
// | Date: 2021/9/29 10:55 上午
// +----------------------------------------------------------------------
session_start();
require("./CaptchaBuilder.php");

$captcha = new CaptchaBuilder();

$captcha->initialize([
    'width' => 150,     // 宽度
    'height' => 50,     // 高度
    'line' => true,    // 直线
    'curve' => true,    // 曲线
    'noise' => 1,       // 噪点背景
    'fonts' => []       // 字体
]);

$captcha->create();

$captcha->output(1);

$_SESSION['captcha'] = $captcha->getText();