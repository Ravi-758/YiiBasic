<?php
use \yii\Helpers\HTML;
use \yii\widgets\ActiveForm; 
/** @var yii\web\View $this */

$this->title = 'Yii CRUD Application';
?>
<div class="site-index">
    <h1>View Post</h1>
    <div class="body-content">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $post->title; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $post->description; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $post->category; ?>
            </li>
        </ul>
        <div class="row">
            <a href=<?php echo yii::$app->homeUrl; ?>  class="btn btn-primary">Go Back</a>  
        </div> 
    </div>
</div>
