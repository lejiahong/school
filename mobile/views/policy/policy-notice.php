<?php
use yii\widgets\LinkPager;
?>
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
    <script src="<?=APP_WEB;?>js/jqPaginator.js"></script>
    <title>浙江大学创新创业学院-政策公告</title>
</head>

<body>
<?php echo $this->render('//public/header');?>
<!--==================导航==================-->
<div class="policy-notice">
    <div class="srh-wrapper">
        <div class="local-search">站内搜索</div>
    </div>
    <div>
        <div class="policy-info">
            <ul class="p-1">
                <?php
                foreach ($notice as $value) {
                ?>
                <li class="policy-items">
                    <ul>
                        <a href="<?php echo \yii\helpers\Url::toRoute(['policy/detail','id'=>$value["id"],]);?>">
                            <li>
                                <h3 class="time"><?=date('Y/m/d',$value['created_at']);?></h3></li>
                            <li><?=$value['desc'];?></li>
                        </a>
                    </ul>
                </li>
                <?php
                }
                ?>
            </ul>
            <?= LinkPager::widget(['pagination' => $pages]); ?>
        </div>
    </div>
</div>
<!--底部开始-->
<?php echo $this->render('//public/footer');?>

<!--pop-search-->
<div class="pop-search">
    <div class="layer"></div>
    <div class="content">
        <div class="search">
            <div class="title">站内搜索</div>
            <div class="srchbody">
                    <div class="ipt">
                        <label for="">搜索方式：</label>
                        <select name="cars">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="fiat">Fiat</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                    <div class="ipt">
                        <label for="">关键内容：</label>
                        <input type="text" class="srhtext">
<!--                        <input type="submit" value="" class="srhsbt">-->
                    </div>
                    <input class="begin" type="submit" value="开始搜索">
            </div>
        </div>

    </div>
</div>
</body>

</html>


<script>
    //弹出搜索
    $(function() {
        $(".local-search").on("click", function() {
            $(".pop-search").fadeIn("600");
        });
        $(".pop-search .layer").on("click", function() {
            $(".pop-search").fadeOut("600");
        });
        $(".begin").on("click", function() {
            $('.pop-search').hide();
        });
    });
</script>