<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var int $project_id */

$this->title = 'Create Task';
?>
<div class="row justify-content-center pt-1 px-2">
    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4 bg-light pt-2 mb-3 rounded-1">
        <h1 class="text-center fs-3"><?= e($this->title) ?></h1>
    </div>
</div>
<?php $form = ActiveForm::begin(); ?>
<?= $form
    ->field($model, 'title', ['labelOptions' => ['class' => 'form-label text-light']])
    ->textInput(['class' => 'form-control focus-ring', 'required' => true]) ?>
<?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>