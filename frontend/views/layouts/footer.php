<?php

/**
 * Created by getpu on 16/8/22.
 */

use yii\helpers\Html;

?>

<div class="footer">
    <div class="footer-body">
        <div class="list">
            <dl class="xyxx">
                <dt>学院信息</dt>
                <dd><a href="">关于我们</a></dd>
                <dd><a href="">学院发展</a></dd>
                <dd><a href="">人力资源</a></dd>
            </dl>
            <dl class="xqhz">
                <dt>校企合作</dt>
                <dd><a href="">高校合作</a></dd>
                <dd><a href="">企业合作</a></dd>
                <dd><a href="">基金合作</a></dd>
            </dl>
            <dl class="yqlj">
                <dt>友情链接</dt>
                <dd><a href="">浙江大学</a></dd>
                <dd><a href="">党委学生工作部</a></dd>
                <dd><a href="">浙大教务网</a></dd>
                <dd><a href="">CC98</a></dd>
            </dl>
            <dl class="xyqc">
                <dd><a href="">学院全称：浙江大学创新创业学院</a></dd>
                <dd><a href="">学院地址：浙江杭州西湖区灵隐路22号</a></dd>
                <dd><a href="">办公电话：0571-88601120</a></dd>
                <dd><a href="">办公传真：0571-88206140</a></dd>
            </dl>
        </div>
        <div class="info">
            <p class="en-info"><?= Html::encode(Yii::$app->cache->get('webConfig')['web_copyright']) ?></p>
            <p><?= Html::encode(Yii::$app->cache->get('webConfig')['web_icp']) ?></p>
        </div>
    </div>
</div>
