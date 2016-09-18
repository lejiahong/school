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
    <script src="<?=APP_WEB;?>js/marquee.js"></script>
    <script src="<?=APP_WEB;?>js/jquery.bxslider.js"></script>
    <script src="<?=APP_WEB;?>js/slick.min.js"></script>
    <script src="<?=APP_WEB;?>js/index.js"></script>
    <title>浙江大学创新创业学院-首页</title>
</head>
<body>
        <?php echo $this->render('//public/header');?>
        <div class="banner">
            <ul class="bxslider" id="banner">
                <?php
                foreach ($banner as $value) {
                ?>
                <a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>">
                    <li><img src="<?php echo $value['fronFiles']['host']."/".$value['fronFiles']['name'];?>" /></li>
                </a>
                <?php
                }
                ?>
            </ul>
        </div>
        <!--==================banner==================-->
        <div class="new_notice">
            <div class="new_notice_center">
                <div class="newul">
                    <ul class="newau">
                        <?php
                        foreach ($banner as $value) {
                        ?>
                        <li><a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>"><?=$value["title"];?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--公告栏-->
        <div class="main">
            <div class="main-content">

                <div class="content-left fl">
                    <div class="p-1" style="height:40px">
                        <a href="<?php echo \yii\helpers\Url::toRoute(['good/teacher']);?>"><h3 class="cyds-title">创业导师</h3>
			  <p>手把手带你创业</p></a>
                    </div>
                    <div class="fl cyds-img">
                        <div class="text">
                            <p>创业导师</p>
                            <p><?=$teacher["title"];?></p>
                        </div>
                    </div>

                </div>
                <div class="content-right fr">
                    <div class="tzgs p-1">
                        <img src="<?=APP_WEB;?>images/tzgs.png" class="fr" />
                        <a href="<?php echo \yii\helpers\Url::toRoute(['campus/invest']);?>"><h3 class="tzgs-title">投资公司</h3><p>100多家合作投资公司</p></a>
                    </div>
                    <div class="jphd fl p-1 ">
                        <a href="<?php echo \yii\helpers\Url::toRoute(['good/active']);?>">
                            <h3 class="jphd-title">精品活动</h3>
                            <p>多家创业组织的精品活动不容错过</p>
                        </a>
                    </div>

                    <div class="cyzz fl p-1">
                        <a href="<?php echo \yii\helpers\Url::toRoute(['campus/org']);?>"><h3 class="cyzz-title">创业组织</h3><p>立刻加入浙大最具有特色的创业组织</p></a>
                    </div>
                </div>
            </div>
            <!--主题内容-->
            <div class="main-lesson">
                <div class="lesson p-1">
                    <h3 class="">最新在线课程</h3>
                    <p class="">创业人才养成计划</p>
                </div>
                <ul class="bxslider" id="class">
                    <?php
                    foreach ($course as $value) {
                    ?>
                    <li onclick="location='<?php echo \yii\helpers\Url::toRoute(['app/lesson_detail','id'=>$value["id"],]);?>'">
                        <img src="<?php echo $value['fronFiles']['host']."/".$value['fronFiles']['name'];?>" />
                        <p><?=$value["title"];?></p>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!--课程轮播-->
            <div class="main-bottom clearfix">
                <div class="main-bottom-left fl">
                    <div class="p-1">
                        <a href="<?php echo \yii\helpers\Url::toRoute(['news/venture_competition',]);?>"><h3>创业大赛</h3><P>最新创业大赛汇总</p></a>
                    </div>
                    <div class="lamp-img"><img src="<?=APP_WEB;?>images/lamp.png"></div>
                </div>
                <div class="main-bottom-right fr">
                    <div class="kycg">
                        <div class="fl" style="width:70%">
                            <div class="p-1"><a href="<?php echo \yii\helpers\Url::toRoute(['policy/teacher',]);?>"><h3>教师科技成果转化</h3><p>科研成果转化、发布、合作等相关项目申请以及公示</p></a></div>
                        </div>
                        <img src="<?=APP_WEB;?>images/kycg.png">
                    </div>
                    <div class="clearfix"></div>
                    <div class="cykj">
                        <ul class="bxslider" id="cykj">
                            <?php
                            foreach ($change as $value) {
                            ?>
                            <li onclick="location='<?php echo \yii\helpers\Url::toRoute(['app/lesson_detail','id'=>$value["id"],]);?>'">
                                <img src="<?php echo $value['fronFiles']['host']."/".$value['fronFiles']['name'];?>" />
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        <div class="information clearfix">
            <h3>新闻动态</h3>
            <div class="content">
                <?php
                foreach ($newsTrends as $value) {
                ?>
                <a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>">
                <dl class="info-list">
                    <dt><img src="<?php echo $value['fronFiles']['host']."/".$value['fronFiles']['name'];?>"></dt>
                    <dd>
                        <div class="p-2">
                            <div class="info-title fl"><?=$value['title'];?></div>
                            <p class="fr time"><?=date('Y/m/d',$value['created_at']);?></p>
                            <div class="clearfix"></div>
                            <div class="info-content">
                                <?php
                                if(empty($value['desc'])){
                                    echo '<p>当前没有详细内容</p>';
                                }else{
                                    echo '<p>'.mb_substr($value['desc'],0,36,"utf-8").'...'.'</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </dd>
                </dl>
            </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

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
    //在线课程
    $(function() {
        $("#class").bxSlider({
            auto: true,
            mode: "horizontal",
            pause: 2500,
            speed: 500,
            controls: false,
            autoHover: true,
            minSlides: 2,
            maxSlides: 3,
            slideWidth: 140,
            pager: false,

        });
    });
    //创业空间
    $(function() {
        $("#cykj").bxSlider({
            auto: true,
            mode: "fade",
            pause: 2500,
            speed: 500,
            controls: false,
            autoHover: true,
            pager: false,

        });
    });
    //公告
    $(function() {
        $(".newul").marquee({
            showNum: 1,
            stepLen: 1,
            type: 'vertical'
        });
    });


    $(function() {
        $(".lesson-content .multiple-items").slick({
            autoplay: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false,
            arrows: false
        });
        $(".lesson-content .slick-prev").text("");
        $(".lesson-content .slick-next").text("");
    }); //主页课程轮播

    $(".cykj .fade").slick({
        fade: true,
        autoplay: true,
        infinite: true,
        dots: false,
        arrows: false

    });
</script>