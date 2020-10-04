<?php
namespace frontend\components;

use yii\rbac\Rule;
use common\models\Articles;
use Yii;

class AuthorRule extends Rule
{


    public $name = 'isAuthor';

    public function execute($user, $item, $params)
    {
        return isset($params['post']) ? false : false;
        // return isset($params['article']) ? $params['article']->author_id == Yii::$app->user->id : false;

    }
}



?>