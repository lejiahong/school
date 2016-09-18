<?php

/**
 * Created by getpu on 16/9/1.
 */

use frontend\component\View;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '新闻动态';
$this->desc = '新闻动态|宁大新闻';
?>

<div class="notice-trends">
    <div class="left">
        <ul class="pic">
            <li alt="" class="pic1"></li>
            <li alt="" class="pic2">
                <p><a href="">这里可以写一写文字可以写多行文字</a></p>
            </li>
            <li alt="" class="pic3">
                <p><a href="">这里可以写一写文字可以写多行文字这里可以写一写文字可以写多行文字</a></p>
            </li>
            <li alt="" class="pic4">
                <p><a href="">这里可以写一写文字可以写多行文字</a></p>
            </li>
        </ul>
        <div class="cyzx">
            <div class="title">创业资讯</div>
           <?php foreach($dataProvider->getModels() as $item) : ?>
            <div class="info">
                <img src="<?= $item->files->host . DIRECTORY_SEPARATOR . $item->files->name ?>" alt="">
                <a href="<?= Url::to(['news/detail','cid' => $item->cid, 'id' => $item->id])?>"><p class="bt"><?= Html::encode($item->title) ?><span><?= date('Y-m-d', $item->created_at) ?></span></p></a>
                <p class="content"><?= Html::encode($item->desc) ?></p>
            </div>
           <?php endforeach ?>
            <div id="kkpager"></div>
        </div>
    </div>
    <div class="right">
        <div class="title">浙闻速递</div>
        <ul>
           <?php foreach($reprints as $reprint) : ?>
            <li><a href="<?= $reprint->url ?>" target="_blank"><?= Html::encode($reprint->title) ?></a><span><?= date('Y-m-d',$reprint->created_at) ?></span></li>
          <?php endforeach; ?>
        </ul>
        <p class="more"><a href="#">查看所有...</a></p>
    </div>
</div>


<?php

$js = <<<JS
//分页
function getParameter(name) { 
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); 
	var r = window.location.search.substr(1).match(reg); 
	if (r!=null) return unescape(r[2]); return 1;
}

//init
$(function(){
	var totalPage = {$dataProvider->getPagination()->getPageCount()};
	var totalRecords = {$dataProvider->getTotalCount()};
	var pageNo =  getParameter('page');//
	//生成分页
	//有些参数是可选的，比如lang，若不传有默认值

	kkpager.generPageHtml({
		pno : pageNo,
		//总页码
		total : totalPage,
		//总数据条数
		totalRecords : totalRecords,
		//链接前部
		hrefFormer : 'news',
		//链接尾部
		hrefLatter : '.html',
		getLink : function(n){
			return this.hrefFormer + this.hrefLatter + "?page="+n;
		}
		/*
		,lang				: {
			firstPageText			: '首页',
			firstPageTipText		: '首页',
			lastPageText			: '尾页',
			lastPageTipText			: '尾页',
			prePageText				: '上一页',
			prePageTipText			: '上一页',
			nextPageText			: '下一页',
			nextPageTipText			: '下一页',
			totalPageBeforeText		: '共',
			totalPageAfterText		: '页',
			currPageBeforeText		: '当前第',
			currPageAfterText		: '页',
			totalInfoSplitStr		: '/',
			totalRecordsBeforeText	: '共',
			totalRecordsAfterText	: '条数据',
			gopageBeforeText		: '&nbsp;转到',
			gopageButtonOkText		: '确定',
			gopageAfterText			: '页',
			buttonTipBeforeText		: '第',
			buttonTipAfterText		: '页'
		}*/
		
		//,
		//mode : 'click',//默认值是link，可选link或者click
		//click : function(n){
		//	this.selectPage(n);
		//  return false;
		//}
	});
});
JS;
$this->registerCssFile('/assets/css/kkpager_blue.css',['depends' => 'frontend\assets\AppAsset']);
$this->registerJsFile('/assets/js/kkpager.min.js', ['depends' => 'frontend\assets\AppAsset']);
$this->registerJs($js, View::POS_END);
?>