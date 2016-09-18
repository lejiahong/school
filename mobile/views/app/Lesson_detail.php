<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black-translucent" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?=APP_WEB;?>css/style.css" rel="stylesheet" />
    <link href="<?=APP_WEB;?>css/video-js.css" rel="stylesheet">
    <script src="<?=APP_WEB;?>js/jquery-1.9.1.min.js"></script>
    <script src="<?=APP_WEB;?>js/index.js"></script>
    <!--script src="../js/video.js"></script-->

    <title>浙江大学创新创业学院-课程详细</title>

</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="class-detail">
    <div class="center">
        <div class="video clearfix">
            <div class="video-play">
                <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="100%" height="auto" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">
                    <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
                    <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                    <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
                </video>
                <div class="play-icons clearfix">
                    <ul class="clearfix">
                        <li class="num">1120</li>
                        <li class="comment">评论</li>
                        <li class="sharebtn">分享</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="video-brief">
            <div class="title">视频简介</div>
            <div class="content">
                Rockar 创立于 2012 年，总部位于英国，公司目标是要彻底改变客户购车体验。这一改变将催生一个具有颠覆性的新零售主题， 在这一新主题下，客户将能够获得传统经销网络所提供的所有服务，或者也可以通过 Rockar 数字卖场来获取相关购车服务及体验活动。 目前，汽车零售市场是少数几个还没有实现网上销售模式的行业之一， 但消费者在购车前通常会在网上进行相关的信息浏览和研究工作，然后还需要去实体店来签署协议，才能完成整个购车交易。
            </div>
        </div>
        <div class="video-comment clearfix">
            <div class="title">精彩评论</div>
            <div class="item clearfix">
                <div class="left"><img src="<?=APP_WEB;?>images/teacher-icon.png" alt=""></div>
                <div class="right">
                    <div class="name">没有然后的一个猪<span>2015.12.12 12:00:00</span></div>
                    <div class="content">这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论这个是视频的评论。</div>
                </div>
            </div>
            <div class="text-wrap clearfix"> <textarea class="comment-text"></textarea>
                <input class="comment-submit fr" type="submit" value="提交评论"></div>
        </div>
    </div>
</div>
<ul class="share share-detail" id="share">
    <div class="title">分享到</div>

    <div class="bdsharebuttonbox">
        <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
        <a href="#" class="bds_more" data-cmd="more"></a>
    </div>
    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{},"image":{"viewList":["tsina","weixin","sqq","qzone"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","weixin","sqq","qzone"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

    <div class="close">取消</div>
</ul>
<!--底部开始-->
<?php echo $this->render('//public/footer');?>
</body>

</html>


<script>
    $(".sharebtn").on("click",function(){
        $(".share-detail").slideToggle();
    });

    $(".close").on("click",function(){
        $(".share-detail").slideToggle();
    });
    $(".comment").click(function(){
        $(".comment-text").focus();

    })

</script>