<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?=APP_WEB;?>css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=APP_WEB;?>css/pullToRefresh.css"/>
    <script src="<?=APP_WEB;?>js/jquery-1.9.1.min.js"></script>
    <script src="<?=APP_WEB;?>js/index.js"></script>
    <script src="<?=APP_WEB;?>js/iscroll.js"></script>
    <script src="<?=APP_WEB;?>js/pullToRefresh.js"></script>
    <title>浙江大学创新创业学院-新闻动态</title>
    <style>
        .news-menu li {overflow: hidden;box-sizing: border-box;margin-bottom: 5px;padding: 9px 12px; width: 100%;}
        .news_img {
            float: left;
            width:30%;
        }
        .news_img img {width: 100%;}
        .news_con {
            float: left;
            width: 70%;
        }
        .news_con .info-title {font-size:14px; color: #4a90e2;}
        .news_con .info-content{font-size: 13px; color:#666; margin-top:5px;}
        .news_con .time{font-size: 13px; color:#999;}
    </style>
</head>
<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="news">
    <div class="center">
        <div class="banner">
            <a href="javascript:;">
            <img src="<?=$newsBanner['fronFiles']['host'].'/'.$newsBanner['fronFiles']['name'];?>" alt="">
            <h3><?=$newsBanner['title'];?></h3>
            </a>
        </div>
        <ul class="news-bar clearfix">
            <li><a href="<?php echo \yii\helpers\Url::toRoute(['news/index']);?>">重点新闻</a></li>
            <li><a href="<?php echo \yii\helpers\Url::toRoute(['news/information']);?>">创业资讯</a></li>
            <li><a href="<?php echo \yii\helpers\Url::toRoute(['news/reprint']);?>" class="active">浙文速递</a></li>
        </ul>
        <div class="clearfix"></div>
        <div class="news-list">
            <!--must content ul-->
            <div class="news-menu" id="wrapper">
                <ul>
                    <?php
                    foreach ($reprint as $value) {
                    ?>
                        <li>
                        <a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>">
                                <div class="news_img"><img src="<?=APP_WEB;?>images/information.png"></div>
                                <div class="news_con">
                                    <div class="p-2">
                                        <div class="info-title fl">
                                            <?=mb_substr($value["title"],0,8,"utf-8");?>
                                        </div>
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
                                </div>
                        </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php echo $this->render('//public/footer');?>

<script >
    refresher.init({
        id:"wrapper",
        pullUpAction:Load
    });
    var counters = 1;
    function Load() {
        $.ajax({
            type: "GET",
            url: "<?= \yii\helpers\Url::toRoute(['reprint_load']);?>",
            data: {page: counters},
            dataType: "json",
            success: function (data) {
                var result = '';
                counters++;
                for (i in data) {
                    var time = Number(data[i]['created_at'] * 1000);
                    var d = new Date(time);
                    var result = '';
                    result += ' <li><a href="javascript:;">';
                    result += ' <div class="news_img"><img src="<?=APP_WEB;?>images/information.png"></div>';
                    result += ' <div class="news_con"><div class="p-2">';
                    result += ' <div class="info-title fl">' + data[i]['title'] + '</div>';
                    result += ' <p class="fr time">' + d.toLocaleDateString() + '</p>';
                    result += ' <div class="clearfix"></div><div class="info-content"><p>content</p></div>';
                    result += ' </div></div>';
                    result += '  </a></li>';
                    $('#wrapper ul').append(result);
                }
            }
        });
    }
</script>
</body>
</html>