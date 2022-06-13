<?php

require "../../include/header.php";

class A{
    public $file = __FILE__;

    public function __construct($file){
        $this->file = $file;
    }

    public function __wakeup(){
        if($this->file != __FILE__) {
            $this->file = __FILE__;
        }
    }

    public function __destruct(){
        highlight_file($this->file);
    }

}

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">反序列化</p>
        <p class="am-text-danger">任务目标一：对该程序进行反序列化分析，在本页面输出flag.php文件代码内容</p>
        <p><a href="index2.php">任务目标二：在上一例子基础上绕过正则表达式并在本页面输出flag.php文件代码内容</a></p>
    </div>
    <?php
        if(isset($_GET['file']) && @$_GET['file']!=''){
            @unserialize($_GET['file']);
        }else{
    ?>
    <pre><?php highlight_file(__FILE__); ?></pre>
    <?php
        }
    ?>
</div>
