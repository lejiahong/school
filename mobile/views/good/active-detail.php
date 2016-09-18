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
    <title>浙江大学创新创业学院-活动详情</title>
</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="news-detail_1">
    <div class="center">
        <div class="banner">
            <img src="<?=APP_WEB;?>images/newbg.png" alt="">
            <div class="banner-back">
                <div class="text">
                    <span class="time fr">2016.12.12 7:00:00</span><span class="scan-record">122浏览</span>
                    <p>全国1300多所高校，元空间也许是唯一的内部面向学生的创业空间</p>

                </div>
            </div>
        </div>

        <div class="article">
            <p>7 月 18 日，创新型汽车零售商 Rockar 获得了 500 万英镑（约 663 万美元）融资。这一消息是由本次融资的两位投资者 Maven Capital Partners 和 NVM Private Equity?联合发布，其中每位投资 250 万英镑。 在继与现代的成功合作之后，公司计划利用本次融资， 进一步扩大与大型汽车制造商的合作伙伴关系，从而在高客流量的购物中心设立更多的数码卖场， 并继续推动其创新型技术平台的进一步发展。
            </p>
            <p> Rockar 创立于 2012 年，总部位于英国，公司目标是要彻底改变客户购车体验。 这一改变将催生一个具有颠覆性的新零售主题，在这一新主题下， 客户将能够获得传统经销网络所提供的所有服务，或者也可以通过 Rockar 数字卖场来获取。</p>
        </div>
        <div class="apply">立即报名</div>
        <div class="over">(完)</div>

        <ul class="share" id="share">
            <div class="bdsharebuttonbox"><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
            <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{},"image":{"viewList":["tsina","weixin","sqq","qzone"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["tsina","weixin","sqq","qzone"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
            <!--
            <li>
                <a><img src="../images/sina-blog.png"></a>
            </li>
            <li>
                <a><img src="../images/wechat.png"></a>
            </li>
            <li>
                <a><img src="../images/friends-moments.png"></a>
            </li>
            <li>
                <a><img src="../images/qq-zone.png"></a>
            </li>
            -->
        </ul>
        <div class="clearfix"></div>
        <div class="advise-read ">
            <h3 class="title">推荐阅读</h3>
            <ul>
                <li>uber和滴滴合并对学生之后出行方式选择有什么影响？</li>
                <li>快的打车和滴滴合并对学生之后出行方式选择有什么影响？</li>
            </ul>
        </div>
    </div>
</div>

<?php echo $this->render('//public/footer');?>
<!--pop-search-->
<div class="pop-search app">
    <div class="layer"></div>
    <div class="content">
        <div class="search">
            <div class="title">报名方式</div>
            <div class="srchbody">
                <p><span class="title">活动地点</span>: 浙江大学紫金港校区月牙楼522</p>
                <p><span class="title">活动时间</span>: 6月22日22点<br>无需报名,请根据时间地点前往即可点</p>
            </div>
        </div>

    </div>
</div>
</body>

</html>


<script>
    //弹出搜索
    $(function() {
        $(".apply").on("click", function() {
            $(".pop-search").fadeIn("600");
        });
        $(".pop-search .layer").on("click", function() {
            $(".pop-search").fadeOut("600");
        });
    });
</script>