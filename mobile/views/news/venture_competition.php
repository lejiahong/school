<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?=APP_WEB;?>css/style.css" rel="stylesheet" />
    <script src="<?=APP_WEB;?>js/jquery-1.9.1.min.js"></script>
    <script src="<?=APP_WEB;?>js/index.js"></script>
    <script src="<?=APP_WEB;?>js/iscroll.js"></script>
    <script src="<?=APP_WEB;?>js/pullToRefresh.js"></script>
    <title>浙江大学创新创业学院-创业大赛</title>
</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->

<div class="venture-competition">
    <div class="center">

        <ul class="competition-notice">
            <li class="all-competition"><a href="<?php echo \yii\helpers\Url::toRoute(['news/venture_competition']);?>" class="active">全部比赛</a></li><!--
                --><li class="doing"><a href="<?php echo \yii\helpers\Url::toRoute(['news/venture_start']);?>">正在进行</a></li><!--
                --><li class="done"><a href="<?php echo \yii\helpers\Url::toRoute(['news/venture_end']);?>">已经结束</a></li>
        </ul>
        <div class="clearfix"></div>
        <div class="competition-list">
            <div class="competition-menu" id="wrapper">
                <ul>
                <?php
                foreach ($VentureAll as $value) {
                    if(isset($value['fronCompetitions']['end_time'])){
                        $times =  time() - $value['fronCompetitions']['end_time'];
                        $dateDay = date('d',$times);
                    }else{
                        $dateDay = 0;
                    }
                ?>
                    <div class="competition-detail">
                        <a href="<?php echo \yii\helpers\Url::toRoute(['news/detail','id'=>$value["id"],]);?>">
                            <div class="title"><?=$value['title'];?></div>
                            <div class="time fl">报名时间：<?=date('Y/m/d',$value['created_at']);?></div>
                            <div class="scan-record fr"><?=$value['clicked'];?>次浏览</div>
                            <div class="clearfix"></div>
                            <div class="banner"><img src="<?=$value['fronFiles']['host'].'/'.$value['fronFiles']['name'];?>">
                                <div class="tag"><?=$dateDay;?></div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<?php echo $this->render('//public/footer');?>

</body>

<script>
    /*refresher.init(	{
        id:"wrapper",
        pullUpAction:Load
    });
    var counters = 1;
    function Load() {
        $.ajax({
            type: "GET",
            url: "<?= \yii\helpers\Url::toRoute(['venture_competition_load']);?>",
            data: {page: counters},
            dataType: "json",
            success: function (data) {
                var result = '';
                counters++;
                for (i in data) {
                    var time = Number(data[i]['created_at'] * 1000);
                    var d = new Date(time);
                    var result = '';
                    var aid = data[i]['id'];
                    result += ' <div class="competition-detail">';
                    result += ' <a href="<?= \yii\helpers\Url::toRoute(['news/detail']);?>';
                    result += ' &id='+aid+'">';
                    result += ' <div class="title">'+data[i]['title']+'</div>';
                    result += ' <div class="time fl">报名时间：'+d.toLocaleDateString()+'</div>';
                    result += ' <div class="scan-record fr">'+data[i]['clicked']+'次浏览</div>';
                    result += ' <div class="clearfix"></div>';
                    result += ' <div class="banner"><img src="'+data[i]['fronFiles']['host']+'/'+data[i]['fronFiles']['name']+'">';
                    result += ' <div class="tag">0</div>';
                    result += ' </div>';
                    result += ' </a>';
                    result += ' </div>';
                    $('#wrapper ul').append(result);
                }
            }
        });
    }*/
</script>

</html>