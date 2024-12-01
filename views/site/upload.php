<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Upload Image';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data'],
]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
