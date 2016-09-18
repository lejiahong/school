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
    <script src="<?=APP_WEB;?>js/index.js"></script>
    <script src="<?=APP_WEB;?>js/iscroll.js"></script>
    <script src="<?=APP_WEB;?>js/pullToRefresh.js"></script>
    <title>浙江大学创新创业学院-教师科研成果转化</title>
</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="teacher">
    <div class="center">
        <div class="banner">
            <ul class="bxslider" id="banner">
                <?php
                foreach ($teacherBanner as $value) {
                    ?>
                    <li><img src="<?php echo $value['fronFiles']['host']."/".$value['fronFiles']['name'];?>" /></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="summary">
            <div class="title">
                <h3>综合介绍</h3><span class="fr">0571-000001000</span></div>
            <p>教师科研成果转化是为了教师科研成果转化是为了教师科研成果转化是为了教师科研成果转化是为了教师科研成果转化是为了教师科研成果转化 是为了教师科研成果转化是为了教师科研成果转化 研成果转化是为了教师科研成果转化是为了教师科研成果转化是为了教师科研成果转化是为
            </p>

        </div>
        <ul class="news-bar clearfix">
            <li><a href="<?php echo \yii\helpers\Url::toRoute(['policy/teacher']);?>">最新发布</a></li>
            <li><a href="<?php echo \yii\helpers\Url::toRoute(['policy/teacher_ok']);?>" class="active">成功案例</a></li>
        </ul>

        <div class="news-list">
            <div class="news-menu">
                <div class="media-item" id="wrapper">
                    <ul>
                    <?php
                    foreach ($teacher as $value) {
                    ?>
                        <li>
                        <div class="media">
                            <a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>"><img src="<?=$value['fronFiles']['host']."/".$value['fronFiles']['name'];?>"></a>
                        </div>
                        </li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php echo $this->render('//public/footer');?>

</body>
<script >
    refresher.init({
        id:"wrapper",
        pullUpAction:Load
    });
    var counters = 1;
    function Load() {
        $.ajax({
            type: "GET",
            url: "<?= \yii\helpers\Url::toRoute(['teacher_load']);?>",
            data: {page: counters},
            dataType: "json",
            success: function (data) {
                var result = '';
                counters++;
                for (i in data) {
                    var aid = data[i]['id'];
                    var result = '';
                    result += ' <div class="media">';
                    result += ' <a href="<?= \yii\helpers\Url::toRoute(['news/detail']);?>';
                    result += ' &id='+aid+'">';
                    result += ' <img src="' + data[i]['fronFiles']['host'] + "/" + data[i]['fronFiles']['name'] + '">';
                    result += ' </a></div>';
                    $('#wrapper ul').append(result);
                }
            }
        });
    }
</script>
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
</script>
</html>