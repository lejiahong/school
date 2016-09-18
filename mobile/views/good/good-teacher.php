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
    <script src="<?=APP_WEB;?>js/index.js"></script>
    <script src="<?=APP_WEB;?>js/iscroll.js"></script>
    <script src="<?=APP_WEB;?>js/pullToRefresh.js"></script>
    <title>浙江大学创新创业学院-教师科研成果转化</title>
</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="good-teacher">
    <h1 class="title">杰出创业导师</h1>
    <div id="wrapper">
        <ul>
        <?php
        foreach ($teacher as $value) {
        ?>
        <div class="teacher-brief clearfix">
            <div class="left fl"><div class="teacher-icon"><img src="<?=$value['fronFiles']['host'].'/'.$value['fronFiles']['name'];?>"/></div></div>
            <div class="right fl">
                <h3 class="name"><?=$value['title'];?></h3>
                <div class="content">
                    <?=$value['content'];?>
                </div>
            </div>
        </div>
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
    var counters = 1;
    refresher.init({
        id:"wrapper",
        pullUpAction:Load
    });
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
                    var result = '';
                    result += ' <div class="teacher-brief clearfix">';
                    result += ' <div class="left fl"><div class="teacher-icon"><img src="' + data[i]['fronFiles']['host'] + "/" + data[i]['fronFiles']['name'] + '"/></div></div>';
                    result += ' <div class="right fl">';
                    result += ' <h3 class="name">'+ data[i]['title'] +'</h3>';
                    result += ' <div class="content">'+ data[i]['content'] +'</div>';
                    result += ' </div></div>';
                    $('#wrapper ul').append(result);
                }
            }
        });
    }
</script>
</html>