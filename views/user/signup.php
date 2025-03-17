<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \app\models\forms\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1 class="text-center text-light fs-2"><?= Html::encode($this->title) ?></h1>
    <p class="text-center text-light">Please fill out the following fields to signup:</p>
    <div class="row justify-content-center px-3">
        <div class="col-sm-10 col-md-7 col-lg-5 bg-light rounded-1">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label me-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>
            <?= $form
                ->field($model, 'username')
                ->textInput(['class' => 'form-control focus-ring', 'autofocus' => false]) ?>
            <?= $form->field($model, 'password')->passwordInput([
                'class' => 'form-control focus-ring'
            ]) ?>
            <?= $form
                ->field(
                    $model,
                    'password_repeat',
                    ['labelOptions' => ['class' => 'col-lg-4 col-form-label me-lg-3']]
                )
                ->passwordInput(['class' => 'form-control focus-ring']) ?>
            <?= $form
                ->field($model, 'email')
                ->textInput(['class' => 'form-control focus-ring']) ?>
            <div class="form-group mb-2">
                <?= Html::submitButton(
                    'Signup',
                    ['class' => 'btn btn-primary', 'name' => 'signup-button']
                ) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>