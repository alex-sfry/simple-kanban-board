<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ar\Project[] $models */
/** @var int $userId */

$this->title = 'Create Project';
?>
<div class="row justify-content-center pt-1 px-3">
    <div class="col-sm-4 col-md-3 col-lg-3 col-xl-2 bg-light pt-2 mb-3 rounded-1">
        <h1 class="text-center fs-3"><?= e($this->title) ?></h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-7 col-md-5 col-lg-4">
        <?php $form = ActiveForm::begin(); ?>
        <?= Html::hiddenInput('Project[user_id]', $userId) ?>
        <?= $form
            ->field($model, 'name', ['labelOptions' => ['class' => 'form-label text-light']])
            ->textInput(['class' => 'form-control focus-ring', 'required' => true]) ?>
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>