<?php


namespace frontend\widgets;


use yii\base\Widget;

class ArticleWidget extends Widget
{
    public $articles;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('articleWidget' , ['articles'=>$this->articles]);
    }

}