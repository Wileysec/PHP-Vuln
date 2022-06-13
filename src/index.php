<?php

require "./config/vuln.php";
require "./include/header.php";

?>
<div class="am-container">
    <?php foreach($data as $v){ ?>
    <div class="vuln-list">
        <p class="am-text-xxl am-animation-slide-top"><?php echo $v['title']; ?></p>
        <div class="am-g doc-am-g">
            <?php foreach($v['urls'] as $i=>$j){ ?>
            <div class="am-u-sm-3 am-u-md-3 am-u-lg-3 am-u-md-offset-1 am-animation-scale-up vuln">
                <a href="<?php echo $j; ?>"><?php echo $i ?></a>
            </div>
            <?php } ?>
        </div>
    </div>
    <hr data-am-widget="divider" class="am-divider am-divider-default" />
    <?php } ?>
</div>
</body>
</html>