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
    <title>浙江大学创新创业学院-杭州众创空间</title>
</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="space">
    <div class="center">
        <div class="banner">
            <img src="<?=APP_WEB;?>images/space.png">
        </div>
        <div class="news-list clearfix">
            <ul class="news-bar clearfix">
                <li><a href="<?php echo \yii\helpers\Url::toRoute(['space/many_index']);?>" class="active">基本介绍</a></li>
                <li><a href="<?php echo \yii\helpers\Url::toRoute(['space/many_notice']);?>" >最新公告</a></li>
                <li><a href="<?php echo \yii\helpers\Url::toRoute(['space/many_down']);?>" >文件下载</a></li>
            </ul>
            <div>
                <div class="news-menu">
                    <div class="basic-intro">
                        <h3>杭州众创空间，也许是第一个校园全套服务众创空间</h3>
                        <p>7 月 18 日，创新型汽车零售商 Rockar 获得了 500 万英镑（约 663 万美元）融资。这一消息是由本次融资的两位投资者 Maven Capital Partners 和 NVM Private Equity 联合发布，其中每位投资 250 万英镑。在继与现代的成功合作之后，公司计划利用本次融资，进一步扩大与大型汽车制造商的 合作伙伴关系， 从而在高客流量的购物中心设立更多的数码卖场，并继续推动其创新型技术平台的进一步发展。
                        </p>
                        <p>Rockar 创立于 2012 年，总部位于英国，公司目标是要彻底改变客户购车体验。这一改变将催生一个具有颠覆性的新零售主题，在这一新主题下。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->render('//public/footer');?>

</body>

</html>
<script src="<?=APP_WEB;?>js/index.js"></script>