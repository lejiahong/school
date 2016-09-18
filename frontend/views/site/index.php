<?php

/**
 * Created by getpu on 16/8/22.
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = \frontend\models\Cache::getWebconfig()['web_title'];

?>

    <div class="banner" id="ban">
        <ul>
            <?php foreach ($banner as $k => $v) : ?>
                <li style="background:url(<?= $v->files->host . DIRECTORY_SEPARATOR . $v->files->name ?>) center center no-repeat;"></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="information">
        <div class="news">
            <div class="news-title">动态信息<a href="">more</a></div>
            <div class="slider multiple-items">
                <?php foreach ($dynamic as $item) : ?>
                    <div>
                        <a href="<?= Url::to(['news/detail', 'cid' => $item->category->id, 'id' => $item->id]) ?>">
                            <div class="news-list"><img src="<?= $item->files->host . DIRECTORY_SEPARATOR . $item->files->name ?>" alt="">
                                <p class="news-listtitle"><?= Html::encode($item->title) ?></p>
                                <p class="news-content"><?= Html::encode($item->desc) ?></p>
                                <p class="news-time"><?= date('Y-m-d', $item->created_at) ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="notice">
            <div class="notice-title">最新公告</div>
            <ul>
                <li><span>05.25</span><a href="notice_detail.html">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>
                <li><span>05.25</span><a href="">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>
                <li><span>05.25</span><a href="">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>
                <li><span>05.25</span><a href="">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>

            </ul>
        </div>
        <div class="partners">
            <div class="partners-title">合作伙伴</div>
            <ul>
                <li><span>05.25</span><a href="notice_detail.html">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>
                <li><span>05.25</span><a href="">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>
                <li><span>05.25</span><a href="">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>
                <li><span>05.25</span><a href="">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>
                <li><span>05.25</span><a href="">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>
                <li><span>05.25</span><a href="">第一批创业团队入驻仪式已经顺利举办第一批创业团队入驻仪式已经顺利举办</a></li>

            </ul>
        </div>
    </div>

    <div class="lesson">
        <div class="lesson-body">
            <div class="lesson-title">在线创业课程：实现创业的从0到1</div>
            <div class="slider multiple-items">
                <div>
                    <a href="class.html">
                        <div class="lesson-list">
                            <img src="../assets/images/lesson.png" alt="">
                            <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                            <p class="lesson-content">
                                这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                        </div>
                    </a>
                </div>
                <div>
                    <div class="lesson-list">
                        <img src="../assets/images/lesson.png" alt="">
                        <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                        <p class="lesson-content">
                            这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                    </div>
                </div>
                <div>
                    <div class="lesson-list">
                        <img src="../assets/images/lesson.png" alt="">
                        <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                        <p class="lesson-content">
                            这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                    </div>
                </div>
                <div>
                    <div class="lesson-list">
                        <img src="../assets/images/lesson.png" alt="">
                        <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                        <p class="lesson-content">
                            这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                    </div>
                </div>
                <div>
                    <div class="lesson-list">
                        <img src="../assets/images/lesson.png" alt="">
                        <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                        <p class="lesson-content">
                            这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                    </div>
                </div>
                <div>
                    <div class="lesson-list">
                        <img src="../assets/images/lesson.png" alt="">
                        <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                        <p class="lesson-content">
                            这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                    </div>
                </div>
                <div>
                    <div class="lesson-list">
                        <img src="../assets/images/lesson.png" alt="">
                        <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                        <p class="lesson-content">
                            这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                    </div>
                </div>
                <div>
                    <div class="lesson-list">
                        <img src="../assets/images/lesson.png" alt="">
                        <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                        <p class="lesson-content">
                            这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                    </div>
                </div>
                <div>
                    <div class="lesson-list">
                        <img src="../assets/images/lesson.png" alt="">
                        <p class="lesson-listtitle">创业中应该避免的坑？<span>03:42</span></p>
                        <p class="lesson-content">
                            这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。这是全新的界面，我们全新的界面已经于2015年12月12日研发完毕。</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="link">
        <ul>
            <li class="link1"><a href="teacher.html">创业导师</a></li>
            <li class="link2"><a href="investment.html">投资公司</a></li>
            <li class="link3"><a href="activity.html">精品活动</a></li>
            <li class="link4"><a href="organization.html">创业组织</a></li>
            <li class="link5"><a href="research.html">科研转化</a></li>

        </ul>
    </div>

<?php
$banner = <<<JS

 $(function(){
     
    var banner=$("#ban").unslider({
        speed: 500,     // 动画过渡的速度(毫秒),如果不需要过渡效果就设置为false
        delay: 3000,    // 每张幻灯片的间隔时间(毫秒), 如果不是自动播放就设置为false
        autoplay: true  // 是否允许自动播放
       });
    var data = banner.data("unslider");
        $("#ban").mouseover(function(){
        data.stop();
    });
    $("#ban").mouseout(function(){
        data.start();
    });
    $(".unslider-arrow").text("");
    
    //动态信息滚动    
    $(".news .multiple-items").slick({
        autoplay:true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots:true
    });
    $(".news .slick-prev").text("");
    $(".news .slick-next").text("");
    
    //在线创业滚动 
    $(".lesson .multiple-items").slick({
        autoplay:true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        dots:true,
        arrows:false
    });
    
 });

JS;

$this->registerJs($banner, \yii\web\View::POS_END);
?>