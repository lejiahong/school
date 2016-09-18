<?php

/**
 * Created by getpu on 16/9/12.
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
 
?>

<div class="banner" id="ban">
    <ul>
       <?php foreach($banner as $item) : ?>
        <li style="background:url(<?= $item->files->host .DIRECTORY_SEPARATOR. $item->files->name ?>) center center no-repeat;"></li>
      <?php endforeach ?>
    </ul>
</div>

<!-- online -->
    <div class="online">
        <ul class="tap">
            <li class="tap1"><a href="<?= Url::to(['','Videos[s]' => 1]) ?>">最新发布</a></li>
            <li class="tap2"><a href="<?= Url::to(['','Videos[s]' => 2]) ?>">最多观看</a></li>
            <li class="tap3"><a href="<?= Url::to(['','Videos[s]' => 3]) ?>">系统推荐</a></li>
        </ul>
        <div class="content con1">
          <?php foreach($dataProvider->getModels() as $item) : ?>
            <div class="item">
                <a href="<?= Url::to(['videos/detail','id' => $item->id]) ?>">
                    <img src="<?= $item->files->host .DIRECTORY_SEPARATOR. $item->files->name ?>" alt="">
                    <p class="tit"><?= StringHelper::truncate($item->title,12) ?><span><?= Html::encode($item->time) ?></span></p>
                    <p class="cont"><?= StringHelper::truncate($item->desc,86) ?></p>
                    <p><?= Html::encode($item->clicked) ?>观看</p>
                </a>
            </div>
          <?php endforeach ?>
        </div>
        <div id="kkpager"></div>
    </div>
<!-- end online -->

<?php
$js = <<<JS
$(function(){
    var banner=$("#ban").unslider({
        speed: 500,     // 动画过渡的速度(毫秒),如果不需要过渡效果就设置为false
        delay: 3000,    // 每张幻灯片的间隔时间(毫秒), 如果不是自动播放就设置为false
        autoplay: true  // 是否允许自动播放
    });
    var data = banner.data("unslider");
        $("#ban").mouseover(function(){
        data.stop();
    });
    $("#ban").mouseout(function(){
        data.start();
    });
    $(".unslider-arrow").text("");
});
JS;
$this->registerJs($js);

?>