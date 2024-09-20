<?php

namespace app\controllers;

use Yii;
use app\models\UserData;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionCreate()
    {
        $model = new UserData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Data saved successfully');
            return $this->refresh();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
