<?php

require "../../include/header.php";

class Controller{
    public function __construct($action){
        $this->action = $action;

        switch($this->action){
            case "index":
                echo $this->index();
                break;
            case "admin":
                echo $this->admin();
                break;
        }
    }

    public function index(){
        return "<p class='am-text-lg'>加载了前台模块...</p>";
    }

    public function admin(){
        return "<p class='am-text-lg'>加载了后台模块...</p>";
    }

}

$action = @$_GET['action']?$_GET['action']:"index";

?>
<div class="am-container">
    <div class="am-alert am-margin-top-lg" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p class="am-text-lg">代码执行</p>
        <p>任务目标：在action参数中注入恶意参数，使其能执行恶意代码</p>
    </div>
    <h1 class="am-margin-top-lg">根据action参数加载不同页面</h1>
    <?php eval("new Controller('".$action."');"); ?>
</div>
