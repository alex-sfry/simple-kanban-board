<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\ar\Project[] $models */

$this->title = 'Select or Create project';
?>
<div class="row justify-content-center pt-1 px-2">
    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4 bg-light pt-2 mb-3 rounded-1">
        <h1 class="text-center fs-2"><?= e($this->title) ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-6 col-md-5 col-lg-3 mb-3">
        <div class="text-center">
            <?= Html::a('Create Project', ['project/create'], ['class' => 'btn btn-success']) ?>
        </div>
        <?php if (!empty($models)) : ?>
            <div class="row justify-content-center pt-4 px-2">
                <div class="col-md-11 bg-light pt-2 mb-3 rounded-1">
                    <h2 class="text-center fs-4">Projects</h2>
                </div>
            </div>
            <?= $this->render('_projects_list', ['models' => $models]) ?>
        <?php endif; ?>
    </div>
</div>