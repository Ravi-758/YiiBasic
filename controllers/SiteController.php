<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadForm;

use app\models\Posts;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $posts = Posts::Find()->all();
        return $this->render('home',['posts'=>$posts]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionView($id){
        $post = Posts::findOne($id);
        return $this->render('view', ['post' => $post]);
    }

    public function actionUpdate($id){
        $post = Posts::findOne($id);
        if($post->load(Yii::$app->request->post()) && $post->save()){
            Yii::$app->getSession()->setFlash('message','Updated Succesfully');
            return $this->redirect(['index','id' => $post->id]);
        }else{
        return $this->render('update',['post'=>$post]);
        }
    }

    public function actionDelete($id){
        $post = Posts::findOne($id)->delete();
        if($post){
            Yii::$app->getSession()->setFlash('message', 'Post Deleted Successfully');
            return $this->redirect('index`');
        }
        return $this->render('home');
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionCreate()
    {
        $post = new Posts();
        $formData = Yii::$app->request->post();

        if ($post->load($formData)) {
          if ($post->save()) {
             Yii::$app->session->setFlash('message', 'Post published successfully');
             return $this->redirect(['index']);
            } else {
            Yii::$app->session->setFlash('message', 'Failed to post');
            }
        }

        return $this->render('create', ['post' => $post]);
    }


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // the file is successfully uploaded
                Yii::$app->session->setFlash('success', 'File uploaded successfully!');
                return $this->redirect(['upload']);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}
