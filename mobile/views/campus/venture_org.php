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
    <title>浙江大学创新创业学院-创业组织</title>
</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="venture-org" id="wrapper">
    <ul>
        <?php
        foreach ($org as $value) {
            $cont = str_replace("<p>","",$value['content']);
            $data = str_replace("</p>","",$cont);
        ?>
        <div class="org-list">
            <div class="org-title">
                <img src="<?=$value['fronFiles']['host'].'/'.$value['fronFiles']['name'];?>" />
                <p class="fl"><a class="active"><?=$value['title'];?></a><?=$data;?></p>
            </div>
<!--            <div class="clearfix"></div>-->
<!--            <ul class="menu">-->
<!--                <li class="tap active">组织文化</li>-->
<!--                <li class="tap">部门构成</li>-->
<!--                <li class="tap">精品活动</li>-->
<!--            </ul>-->
<!--            <div class="intro">-->
<!--                <p>1在学工部领导下，凝聚并服务浙江大学学生创业团队，紧密围绕创业实践（元空间），提供创业咨询、培训等服务，举办多样化的创业活动，开展专业化的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同体。 在学工部领导下，凝聚并服务浙江大学学生创业团队，紧密围绕创业实践（元空间），提供创业咨询、培训等服务，举办多样化的创业活动，开展专业化的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同体。的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同。-->
<!--                </p>-->
<!--            </div>-->
<!--            <div class="intro d-n">-->
<!--                <p>2在学工部领导下，凝聚并服务浙江大学学生创业团队，紧密围绕创业实践（元空间），提供创业咨询、培训等服务，举办多样化的创业活动，开展专业化的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同体。 在学工部领导下，凝聚并服务浙江大学学生创业团队，紧密围绕创业实践（元空间），提供创业咨询、培训等服务，举办多样化的创业活动，开展专业化的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同体。的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同。-->
<!--                </p>-->
<!--            </div>-->
<!--            <div class="intro d-n">-->
<!--                <p>3在学工部领导下，凝聚并服务浙江大学学生创业团队，紧密围绕创业实践（元空间），提供创业咨询、培训等服务，举办多样化的创业活动，开展专业化的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同体。 在学工部领导下，凝聚并服务浙江大学学生创业团队，紧密围绕创业实践（元空间），提供创业咨询、培训等服务，举办多样化的创业活动，开展专业化的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同体。的创业培训，助力联盟内各团队对接高校、政府、社会资源，力争将联盟打造成具有广泛影响力的在校大学生创业共同。-->
<!--                </p>-->
<!--            </div>-->
        </div>
            <li></li>
        <?php
        }
        ?>
    </ul>
</div>

<?php echo $this->render('//public/footer');?>


</body>

</body>

</html>
<script>
    $(function() {
        var len = $(".venture-org").children().length;
        $(".venture-org").delegate(".tap", "click", function() {
            var i = $(this).index();
            $(this).addClass("active").siblings().removeClass("active");
            $(this).parent().parent().find(".intro").hide();
            $(this).parent().parent().find(".intro").eq(i).show();
        });
    });
    refresher.init({
        id:"wrapper",
        pullUpAction:Load
    });
    var counters = 1;
    function Load() {
        $.ajax({
            type: "GET",
            url: "<?= \yii\helpers\Url::toRoute(['org_load']);?>",
            data: {page: counters},
            dataType: "json",
            success: function (data) {
                var result = '';
                counters++;
                for (i in data) {
                    var time = Number(data[i]['created_at'] * 1000);
                    var d = new Date(time);
                    var result = '';
                    var result = '';
                    result += ' <div class="org-list">';
                    result += ' <div class="org-title">';
                    result += ' <img src="' + data[i]['fronFiles']['host'] + "/" + data[i]['fronFiles']['name'] + '" />';
                    result += ' <p class="fl">' + data[i]['content'] + '</p>';
                    result += ' </div>';
                    result += ' </div>';
                    $('#wrapper ul').append(result);
                }
            }
        });
    }
</script>