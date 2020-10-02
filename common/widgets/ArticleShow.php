<?php
namespace common\widgets;


use frontend\models\Articles;

class ArticleShow extends \yii\base\Widget
{
    public $article;

    public function init()
    {

    }

    public function run()
    {
        return $this->render('articleShow' ,['article'=> $this->article]);
    }
}