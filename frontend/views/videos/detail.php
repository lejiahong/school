<?php

/**
 * Created by getpu on 16/9/12.
 */

use yii\helpers\Html;

$this->title = $model->title;
$this->desc  = $model->desc;

?>

<div class="class-detail">
    <div class="spbf">
        <div class="title"><?= Html::encode($model->title) ?></div>
        <div class="bf">
            <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="1200" height="550" poster="<?=$model->files->host .DIRECTORY_SEPARATOR. $model->files->name ?>" data-setup="{}">
                <source src="<?= $model->path ?>" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="spjj">
        <div class="title">视频简介</div>
        <div class="content">
            <?= Html::encode($model->desc) ?>
        </div>
    </div>
    <div class="sppl">
        <div class="title">视频评论</div>
        <div class="item">
            <img src="/assets/images/news.png" alt="">
            <div class="name">没有然后的一个猪<span>2015.12.12 12:00:00</span></div>
            <div class="cont">这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论。</div>
        </div>
        <div class="item">
            <img src="/assets/images/news.png" alt="">
            <div class="name">没有然后的一个猪<span>2015.12.12 12:00:00</span></div>
            <div class="cont">这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论。</div>
        </div>
        <div class="item">
            <img src="/assets/images/news.png" alt="">
            <div class="name">没有然后的一个猪<span>2015.12.12 12:00:00</span></div>
            <div class="cont">这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论。</div>
        </div>
        <textarea class="pltext"></textarea>
        <input class="tjpl" type="submit" value="提交评论">
    </div>
</div>


<?php

$this->registerCssFile('/assets/css/video-js.css', ['depends' => \frontend\assets\AppAsset::className()]);
?>