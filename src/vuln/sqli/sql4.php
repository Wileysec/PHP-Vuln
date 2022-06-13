<?php

require "../../config/config.php";
require "../../include/header.php";

$id = @$_GET['id']?$_GET['id']:1;

try{
    $sql = "select * from user where id={$id}";

    $smt = $pdo->query($sql);

    $result = $smt->fetch();
}catch (Exception $e){
    echo $e->getMessage();
    die();
}

?>
<div class="am-container">
    <?php

    if(isset($result)){
        echo $result?"<h2 class='am-margin-top-lg'>我已经查询到该ID用户信息，想判断对错绕过我？不可能！</h2>":"<h2 class='am-margin-top-lg'>我已经查询到该ID用户信息，想判断对错绕过我？不可能！</h2>";
    }

    ?>
</div>