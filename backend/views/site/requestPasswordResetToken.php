<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Forgot Password';
?>

<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'options' => ['class' => 'form w-100']]); ?>

    <div class="text-center mb-10">
        <h1 class="text-dark fw-bolder mb-3">Forgot Password?</h1>
        <div class="text-gray-500 fw-semibold fs-6">
            Enter your email to reset your password.
        </div>
    </div>

    <div class="fv-row mb-8">
        <?= $form->field($model, 'email')->textInput([
            'placeholder' => 'Email',
            'autocomplete' => 'off',
            'class' => 'form-control bg-transparent'
        ])->label(false) ?>
    </div>

    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary me-4']) ?>
        <?= Html::a('Cancel', ['site/login'], ['class' => 'btn btn-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

