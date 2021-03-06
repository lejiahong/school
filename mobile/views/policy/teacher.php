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
            <li><a href="<?php echo \yii\helpers\Url::toRoute(['policy/teacher']);?>" class="active">最新发布</a></li>
            <li><a href="<?php echo \yii\helpers\Url::toRoute(['policy/teacher_ok']);?>">成功案例</a></li>
        </ul>

        <div class="news-list">
        <div class="news-menu clearfix" id="wrapper">
            <ul>
                <?php
                foreach ($teacher as $value) {
                ?>
                    <li>
                        <a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>">
                            <dl class="info-list">
                                <dt><img src="<?php echo $value['fronFiles']['host']."/".$value['fronFiles']['name'];?>"></dt>
                                <dd>
                                    <div class="p-2">
                                        <div class="info-title fl"><?=mb_substr($value["title"],0,8,"utf-8");?></div>
                                        <p class="time fr"><?=date('Y/m/d',$value['created_at']);?></p>
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
                    </li>
                <?php
                }
                ?>
            </ul>
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
                    var time = Number(data[i]['created_at'] * 1000);
                    var d = new Date(time);
                    var aid = data[i]['id'];
                    var result = '';
                        result += ' <li>';
                        result += ' <a href="<?= \yii\helpers\Url::toRoute(['news/detail']);?>';
                        result += ' &id='+aid+'">';
                        result += ' <dl class="info-list">';
                        result += ' <dt><img src="' + data[i]['fronFiles']['host'] + "/" + data[i]['fronFiles']['name'] + '"></dt>';
                        result += ' <dd>';
                        result += ' <div class="p-2">';
                        result += ' <div class="info-title fl">' + data[i]['title'] + '</div>';
                        result += ' <p class="time fr">' + d.toLocaleDateString() + '</p>';
                        result += ' <div class="clearfix"></div>';
                        result += ' <div class="info-content">'+ data[i]['content'] +'</div>';
                        result += ' </div></dd></dl>';
                        result += '  </a></li>';
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
