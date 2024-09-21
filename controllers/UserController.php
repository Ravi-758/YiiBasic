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
    public function actionUpload()
    {
        $model = new ImageUploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
            if ($filePath = $model->upload()) {
                // You can save the file path to the database or perform other actions
                Yii::$app->session->setFlash('success', 'File uploaded successfully: ' . $filePath);
                return $this->redirect(['upload']);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}
