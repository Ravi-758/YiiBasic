<?php
use \yii\Helpers\HTML;

/** @var yii\web\View $this */

$this->title = 'Yii CRUD Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 style="color:#337ab7" class="display-4">YII CRUD Application tutorial!</h1>
    </div>
    <div class="body-content">
        <div class="row">
           
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($posts) >0): ?>
                        <?php foreach($posts as $post): ?>
                    <tr class="table-active">
                    <th scope="row"><?php echo $post->id; ?></th>
                    <td><?php echo $post->title; ?></td>
                    <td><?php echo $post->description; ?></td>
                    <td><?php echo $post->category; ?></td>
                    <td>
                        <span><?= HTML::a('View') ?> </span>
                        <span><?= HTML::a('Update') ?> </span>
                        <span><?= HTML::a('Delete') ?> </span>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td>No Records Found!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
