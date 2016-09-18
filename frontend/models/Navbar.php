<?php

/**
 * Created by getpu on 16/8/24.
 * 全站导航
 */
 
namespace frontend\models;

class Navbar extends \backend\modules\navbar\models\Navbar
{

    public static function makeTree($tree)
    {
        $items = [];
        foreach($tree->all() as $node){
            if(!$node->isActive()) continue;
            $items[] = [
                'label' => $node->name,
                'url'   => !empty($node->url) ? [$node->url] : 'javascript:;',
                'items' => self::makeTree($node->children(1)),
            ];
        }
        return $items;
    }

}