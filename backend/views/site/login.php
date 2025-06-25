<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
?>

<!--begin::Form-->
<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'form w-100']]) ?>

    <div class="text-center mb-11">
        <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
        <div class="text-gray-500 fw-semibold fs-6">to access dashboard</div>
    </div>

    <?= $form->field($model, 'username')->textInput([
        'placeholder' => 'Username',
        'class' => 'form-control bg-transparent'
    ])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput([
        'placeholder' => 'Password',
        'class' => 'form-control bg-transparent'
    ])->label(false) ?>

    <div class="d-grid mb-10 mt-5">
        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary', 'id' => 'kt_sign_in_submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<!--end::Form-->
