<?php
namespace frontend\controllers;

use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use common\models\User;

class WebserviceController extends ActiveController
{

    public $modelClass= 'frontend\models\ArticlesCrud';

    public function init(){
        parent::init();
        Yii::$app->user->enableSession= false;
    }

    public function behaviors()
    {
        $behaviors=parent::behaviors();
        $behaviors['athenticator']=[
            'class' => HttpBasicAuth::className(),
            'auth' => function($username , $password){
                $user=User::findByUsername($username);
                if ($user !== null){
                    if ($user->validatePassword($password)){
                    return $user; 
                    }
                }
                return null;
            }
        ];
        return $behaviors;
    }

}


?>