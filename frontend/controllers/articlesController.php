<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\User;
use common\models\Articles;
use frontend\models\SignupForm;
use Yii;
use yii\base\Model;
use yii\filters\AccessControl;
use frontend\components\AuthHandler;
use yii\data\Pagination;

class ArticlesController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],

                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }

    public function actionIndex()
    {
        $count=Articles::find()->count();
        $tenDays = time() - 864000;
        $condition = 'created_at > ' . $tenDays;
        $articles = Articles::find()->where($condition)->all();
        return $this->render('index', ['articles' => $articles , 'count' => $count]);
    }

    public function actionArticle($id = null)
    {
        if ($id !== null) {
            $model = Articles::findOne($id);
            if ($model !== null) {
                return $this->render('article', [
                    'model' => $model,
                ]);
            }
        } else {
            echo 'ID:(';
        }
    }

    public function actionArticles()
    {
        $query = Articles::find();
        $count = $query->count();
        $pagination = new Pagination([
            'totalCount' => $count,
            'defaultPageSize' => 5
        ]);
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('articles', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $model->login();
            return $this->goHome();
        }
        return $this->render('signup', ['model' => $model]);
    }

    public function actionLogin()
    {

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['index']);
        } else {

            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['index']);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSearch($value = null)
    {

        if ($value != null) {
            echo $value;
            exit();
            $value = 'lorem';
            $art = new Articles();
            $query = 'SELECT * FROM `articles` WHERE text like "%' . $value . '%"';
            $result = $art::findBySql($query, [':text' => 'asd'])->all();
            return $this->render('search_result', ['result' => $result]);
        } else {
            echo 'value:(';
            exit();
        }
    }

    public function actionInsert()
    {
        $user = User::findOne(Yii::$app->user->id);
        $model = new Articles();
        $model->author_id = Yii::$app->user->id;
        $model->author = $user->username;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('insert', ['model' => $model]);
    }

    public function actionDelete($id = null)
    {
        if ($id !== null) {
            $model = Articles::findOne($id);
            if ($model !== null) {
                if ($model->delete()) {
                    $this->redirect(['index']);
                }
            }
        } else {
            echo 'sdfsdf';
            exit();
        }
    }

    public function actionUpdate($id = null)
    {
        if (isset($id)) {
            $model = Articles::findOne($id);
        } else {
            echo 'id:(';
        }

        if ($model->author_id == Yii::$app->user->id) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
            return $this->render('update', ['model' => $model]);
        } else {
            echo 'NO';
            exit();
        }
    }

    public function actionProfile()
    {
        $user = User::findOne(Yii::$app->user->id);
        return $this->render('profile', ['user' => $user]);
    }

    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //permissions
        $insertArticle = $auth->createPermission('insertArticle');
        $auth->add($insertArticle);

        $updateArticle = $auth->createPermission('updateArticle');
        $auth->add($updateArticle);

        $deleteArticle = $auth->createPermission('deleteArticle');
        $auth->add($deleteArticle);

        //Role
        $author = $auth->createRole('author');
        $auth->add($author);

        //add to Tables
        $auth->addChild($author, $updateArticle);
        $auth->addChild($author, $deleteArticle);
        $auth->addChild($author, $insertArticle);

        //assign
        $auth->assign($author, 5);




        //Rule
        $rule = new \frontend\components\AuthorRule;
        $auth->add($rule);


        $updateOwnArticle = $auth->createPermission('updateOwnArticle');
        $updateOwnArticle->ruleName = $rule->name;
        $auth->add($updateOwnArticle);


        $auth->addChild($updateOwnArticle, $updateArticle);

        $auth->addChild($author, $updateOwnArticle);
    }
}
