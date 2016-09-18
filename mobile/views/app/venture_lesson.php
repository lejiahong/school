<?php
use yii\widgets\LinkPager;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?=APP_WEB;?>css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?=APP_WEB;?>css/style.css" rel="stylesheet" />
    <link href="<?=APP_WEB;?>css/font-awesome.min.css" rel="stylesheet">
    <script src="<?=APP_WEB;?>js/jquery-1.9.1.min.js"></script>
    <script src="<?=APP_WEB;?>js/jquery.bxslider.js"></script>
    <script src="<?=APP_WEB;?>js/jqPaginator.js"></script>
    <script src="<?=APP_WEB;?>js/index.js"></script>
    <title>浙江大学创新创业学院-创业课程</title>
</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="venture-lesson">
    <div class="center">

        <div class="banner">
            <ul class="bxslider" id="banner">
                <li><img src="<?=APP_WEB;?>images/banner.png" /></li>
                <li><img src="<?=APP_WEB;?>images/banner.png" /></li>
                <li><img src="<?=APP_WEB;?>images/banner.png" /></li>
            </ul>
        </div>
        <div class="new-lesson">
            <div class="search">
                <input class="srh" type="text" />
                <input class="sub" type="submit" value="">
            </div>

            <div class="lesson-title">
                最新课程
            </div>
            <div class="lesson-list">
                <?php
                foreach ($model as $value) {
                ?>
                <div class="course fl">
                    <a href="<?php echo \yii\helpers\Url::toRoute(['app/lesson_detail','id'=>$value["id"],]);?>">
                        <img src="<?php echo $value['fronFiles']['host']."/".$value['fronFiles']['name'];?>">
                        <p><?=$value['title'];?></p>
                    </a>
                </div>
                <?php
                }
                ?>
            </div>
            <?= LinkPager::widget(['pagination' => $pages]); ?>
        </div>
        <div class="new-lesson lesson2">
            <div class="lesson-title">
                最多观看
            </div>
            <div class="lesson-list">
                <?php
                foreach ($modelMores as $value) {
                ?>
                <div class="course fl">
                    <a href="<?php echo \yii\helpers\Url::toRoute(['app/lesson_detail','id'=>$value["id"],]);?>">
                        <img src="<?php echo $value['fronFiles']['host']."/".$value['fronFiles']['name'];?>">
                        <p><?=$value['title'];?></p>
                    </a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>


<?php echo $this->render('//public/footer');?>

</body>

</html>
<script>
    //banner
    $(function() {
        $("#banner").bxSlider({
            auto: true,
            mode: "horizontal",
            pause: 2500,
            speed: 500,
            controls: false,
            autoHover: true,
        });
    });

    //分页1
    $.jqPaginator('#pagination1', {
        totalPages: 100,
        visiblePages: 4,
        currentPage: 1,
        prev: '<li class="prev"><a href="javascript:;">上一页</a></li>',
        next: '<li class="next"><a href="javascript:;">下一页</a></li>',
        page: '<li class="page"><a href="javascript:;">{{page}}</a></li>',
    });

    //分页2
    $.jqPaginator('#pagination2', {
        totalPages: 100,
        visiblePages: 4,
        currentPage: 1,
        prev: '<li class="prev"><a href="javascript:;">上一页</a></li>',
        next: '<li class="next"><a href="javascript:;">下一页</a></li>',
        page: '<li class="page"><a href="javascript:;">{{page}}</a></li>',
    });
</script>