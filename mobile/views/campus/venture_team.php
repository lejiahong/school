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
    <script src="<?=APP_WEB;?>js/jquery-1.9.1.min.js"></script>
    <script src="<?=APP_WEB;?>js/jquery.bxslider.js"></script>
    <script src="<?=APP_WEB;?>js/slick.min.js"></script>
    <script src="<?=APP_WEB;?>js/index.js"></script>
    <script src="<?=APP_WEB;?>js/jqPaginator.js"></script>
    <title>浙江大学创新创业学院-创业团队</title>

</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="venture-team">
    <div class="banner">
        <ul class="bxslider" id="banner">
            <?php
            foreach ($newsBanner as $value) {
            ?>
            <li><img src="<?=$value['fronFiles']['host'].'/'.$value['fronFiles']['name'];?>" /></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="clearfix"></div>
    <!--轮播结束-->
    <div class="pioneer">
        <h3>创业先锋</h3>
        <div class="pioneer-item">

            <div class="slider multiple-items">
                <?php
                foreach ($van as $value) {
                ?>
                    <div>
                        <a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>">
                            <div class="pioneer-list"><img src="<?=$value['fronFiles']['host'].'/'.$value['fronFiles']['name'];?>" alt=""></div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!--------------------------创业先锋-------------------->
    <div class="offer">
        <h3>人才招募</h3>
        <ul>
            <?php
            foreach ($job as $value) {
            ?>
            <li><a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>"><?=$value['title'];?></a></li>
            <?php
            }
            ?>
        </ul>
        <div id="pagination1" class="pagination"></div>

    </div>
    <div class="result">
        <p>截止目前，</p>
        <p> 浙大总共有<a class="active">120</a>个创业团队，</p>
        <p> 其中有<a class="active">40</a>个团队已获得融资，</p>
        <p>融资额度总计超<a class="active">6个亿</a>人民币，</p>
        <p> 有<a class="active">12</a>家公司已经进入B轮后阶段</p>
    </div>
    <div class="show">
        <h3>项目展示</h3>
        <?php
        foreach ($projectShow as $value) {
        ?>
        <div class="show-menu">
            <img src="<?=$value['fronFiles']['host'].'/'.$value['fronFiles']['name'];?>" alt="">
            <div class="show-intro">
                <span class=""><?=$value['title'];?></span> <a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>"><span class="offical-web">进入官网</span></a>
                <p><?=$value['content'];?></p>
            </div>
        </div>
        <?php
        }
        ?>
        <div id="pagination2" class="pagination"></div>
    </div>

</div>
<!--底部开始-->
<?php echo $this->render('//public/footer');?>
</body>

</html>
<script type="text/javascript">
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
    $(".multiple-items").slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        autoplay: true,
        arrows:false
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