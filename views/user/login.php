<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 class="text-center text-light fs-2"><?= Html::encode($this->title) ?></h1>
    <p class="text-center text-light">Please fill out the following fields to login:</p>
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-7 col-lg-5 bg-light rounded-1">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
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
            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'class' => 'form-check-input focus-ring',
            ]) ?>
            <div class="form-group">
                <div>
                    <?= Html::submitButton(
                        'Login',
                        ['class' => 'btn btn-primary', 'name' => 'login-button']
                    ) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            <div class="mt-2">
                <?= Html::a('Forgot password?', ['user/request-password-reset']) ?>
            </div>
            <div class="my-1">
                Don't have an account? <?= Html::a('Create account', ['user/signup']) ?>
            </div>
        </div>
    </div>
</div>