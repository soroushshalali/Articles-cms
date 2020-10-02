<?php


namespace frontend\widgets;


use yii\base\Widget;

class ArticleWidget extends Widget
{
    public $counterr;
    public $article;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('articleWidget' , ['counterr'=>$this->counterr , 'article'=>$this->article]);
    }

}