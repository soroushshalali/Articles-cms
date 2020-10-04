<?php
namespace frontend\widgets;

use yii\base\Widget;

class CounterShow extends Widget
{
    public $count;
    public function run()
    {
        return $this->render('counterShow' , ['count' => $this->count]);
    }



}

?>