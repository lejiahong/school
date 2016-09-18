<?php

/**
 * Created by getpu on 16/8/19.
 */

use getpu\mgmt\models\Tree;
use getpu\tree\TreeView;

$this->title = '所有模块';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= TreeView::widget([
    // single query fetch to render the tree
    'query'             => Tree::find()->addOrderBy('root, lft'),
    'headingOptions' => ['label' => '模块管理'],
    'rootOptions' => ['label'=>'<span class="text-primary">根目录</span>'],
    'treeOptions' => ['style' => 'height:550px;'],
    'fontAwesome' => true,
    'isAdmin' => true,
    'showInactive' => true,
    'allowNewRoots' => false,
    'displayValue' => 1,
    'iconEditSettings'=> [
        'show' => 'list',
        'listData' => [
            'folder' => 'folder',
            'file' => 'file',
            'cog' => 'cog',
            'info' => 'info',
            'info-circle' => 'info-circle',
            'tag' => 'tag',
            'user'=> 'user',
            'user-md' => 'user-md',
            'user-plus' => 'user-plus',
            'group' => 'group',
            'minus-circle' => 'minus-circle',
            'home' => 'home',
            'flag' => 'flag',
            'file-text-o' => 'article',
            'link' => 'link',
            'hand-o-right' => 'into',
            'sun-o' => 'sun-o',
            'share-alt' => 'share',
            'server' => 'server',
            'shirtsinbulk' => 'shirtsinbulk',
            'spotify' => 'spotify',
            'street-view' => 'street-view',
            'thumb-tack' => 'thumb-tack',
            'thumbs-o-up' => 'thumbs-o-up',
            'thumbs-o-down' => 'thumbs-o-down',
            'bars' => 'bars',
            'heart'  => 'heart',
            'sign-language' => 'handle',
            'cloud' => 'cloud',
            'envelope' => 'envelope',
            'envelope-o' => 'envelope-o',
            'cc-visa'   => 'cc-visa',
            'product-hunt' => 'product-hunt',
            'database' => 'database',
            'sitemap' => 'sitemap',
            'glass'   => 'glass',
            'graduation-cap' => 'graduation-cap',
            'weibo' => 'weibo',
            'video-camera' => 'video-camera',
        ],
    ],
    'softDelete' => false,
    'cacheSettings' => [
        'enableCache' => true
    ]
]); ?>
