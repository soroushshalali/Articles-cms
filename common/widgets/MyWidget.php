<?php
namespace common\widgets;

use yii\helpers\Html;

class MyWidget extends \yii\base\Widget
{
    public $name;
    public $isGuest;

    public function init()
    {

    }

    public function run()
    {

        return $this->render('menu' , ['isGuest' => $this->isGuest]);
    }

}