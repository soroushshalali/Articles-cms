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


class ArticlesController extends \yii\web\Controller
{
    //  public function behaviors()
    //  {
    //      return [
    //          'access' => [
    //              'class' => AccessControl::className(),
    //              'only' => ['insert' , 'delete' , 'update'],
    //              'rules' => [
    //                  [
    //                      'actions' => ['insert', 'delete' , 'update'],
    //                      'allow' => true,
    //                      'roles' => ['user'],
    //                  ],
    //                  [
    //                      'actions' => ['insert' , 'delete' , 'update'],
    //                      'allow' => true,
    //                      'roles' => ['admin'],
    //                  ],
    //              ],
    //          ],
    //      ];
    //  }


    public function actionIndex()
    {
        $tenDays=time()-864000;
        $condition='created_at > '. $tenDays;
        $articles=Articles::find()->where($condition)->all();
        return $this->render('index' ,['articles'=> $articles]);
    }

    public function actionArticle($id = null){
        if ($id !== null){
            $model=Articles::findOne($id);
        if ($model !== null){
            return $this->render('article', [
                'model' => $model ,
            ]);
        }

        }else{
            echo 'ID:(';
        }
    }

    public function actionArticles(){
        $articles= Articles::find()->all();
        return $this->render('articles', [
            'articles' => $articles ,
        ]);
    }

    public function actionSignup(){
        $model=new SignupForm();
        if($model->load(Yii::$app->request->post()) && $model->signup()){
            $model->login();
            return $this->goHome();
        }
         return $this->render('signup' , ['model' => $model]);
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

    public function actionLogout(){
        Yii::$app->user->logout();

        return $this->redirect(['index']);
    }

    public function actionAbout(){
        return $this->render('about');
    }

    public function actionSearch($value=null)
    {

        if ($value != null){
            echo $value;
            exit();
            $value='lorem';
            $art=new Articles();
            $query='SELECT * FROM `articles` WHERE text like "%'.$value.'%"';
            $result=$art::findBySql($query,[':text'=>'asd'])->all();
            return $this->render('search_result' , ['result' => $result]);
        }else{
           echo 'value:(';
           exit();
        }

    }

    public function actionInsert(){
        // $user = User::findOne(Yii::$app->user->id);
        $model=new Articles();
        $model->author_id=Yii::$app->user->id;
        // $model->author=$user->username;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('insert' , ['model' => $model] );
    }

    public function actionDelete($id=null){
        if ($id !== null){
            $model=Articles::findOne($id);
             if ($model !== null){
                if($model->delete()){
                    $this->redirect(['index']);
                }
             }
        }else{
            echo 'sdfsdf';
            exit();
        }
    }

    public function actionUpdate($id=null){
        if (isset($id)){
            $model= Articles::find($id)->one();
        }else{
            echo 'id:(';
        }
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('update' , ['model' => $model] );
    }

    public function actionProfile(){
        $user = User::findOne(Yii::$app->user->id);
        return $this->render('profile' , ['user' => $user]);
    }

    // public function actionInit(){
    //     $auth=Yii::$app->authManager;

    //     $insert=$auth->createPermission('insert');
    //     $auth->add($insert);

    //     $delete=$auth->createPermission('delete');
    //     $auth->add($delete);

    //     $update=$auth->createPermission('update');
    //     $auth->add($update);

    //     $admin=$auth->createRole('admin');
    //     $auth->add($admin);

    //     $user=$auth->createRole('user');
    //     $auth->add($user);

    //     $auth->addChild($admin , $delete);
    //     $auth->addChild($admin , $update);
    //     $auth->addChild($admin , $insert);

    //     $auth->addChild($user , $delete);
    //     $auth->addChild($user , $update);
    //     $auth->addChild($user , $insert);


    //     $auth->assign($admin , 1);
    //     $auth->assign($user , 2);


    //     //Rule
    //     $rule=new \frontend\component\AuthorRule();
    //     $auth->add($rule);

    //     $deleteOwnPost=$auth->createPermission('deleteOwnPost');
    //     $deleteOwnPost->description = 'Update own post';
    //     $deleteOwnPost->ruleName= $rule->name;
    //     $auth->add($deleteOwnPost);

    //     $auth->addChild($deleteOwnPost , $delete);
        
    //     $auth->addChild($user,$deleteOwnPost);

    // }



}
