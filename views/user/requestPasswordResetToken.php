<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \app\models\forms\PasswordResetRequestForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Request password reset';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1 class="text-center text-light fs-2"><?= Html::encode($this->title) ?></h1>
    <p class="text-center text-light">
        Please fill out your email. A link to reset password will be sent there.
    </p>
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-7 col-lg-5 bg-light rounded-1">
            <?php $form = ActiveForm::begin([
                'id' => 'request-password-reset-form',
                'fieldConfig' => ['labelOptions' => ['class' => 'col-form-label']]
            ]); ?>
            <?= $form
                ->field($model, 'email')
                ->textInput(['class' => 'form-control focus-ring', 'autofocus' => false]) ?>
            <div class="form-group mb-2">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>