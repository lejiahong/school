<?php

/**
 * Created by getpu on 16/8/22.
 */

use yii\helpers\Url;

?>

<div class="header">
        <a href="/"><div class="logo"><img src="/assets/images/logo.png" alt="logo"></div></a>
        <ul class="nav">
           <?php foreach(\frontend\models\Cache::getHeaderNav() as $item) : ?><li>
                <a href="<?=Url::to($item['url'])?>"><?=$item['label']?></a>
                 <?php if(!empty($item['items'])) : ?>
                    <ul>
                        <?php foreach($item['items'] as $items) { ?>
                            <li><a href="<?=Url::to($items['url'])?>"><?=$items['label']?></a></li>
                        <?php } ?>
                    </ul>
                 <?php endif ?></li>
           <?php endforeach ?>
        </ul>
</div>
<!-- header -->