<?php

$file_url = @$_GET['file_url'];
$readBuffer = 1024;

file_get_contents($file_url);

Header("Content-type: application/octet-stream");
header('Content-Disposition: attachment; filename='.$file_url);
header('Content-Lengh: '.filesize($file_url));

$handle = fopen($file_url, 'rb');//二进制文件用‘rb’模式读取
while (!feof($handle) ) { //循环到文件末尾 规定每次读取（向浏览器输出为$readBuffer设置的字节数）
    echo fread($handle, $readBuffer);
}
fclose($handle);//关闭文件句柄
exit;