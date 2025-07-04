<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */

?>


<div class="user-form">
    <div class="row g-3">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput([
                'placeholder' => 'Enter username',
                'class' => 'form-control form-control-lg',
            ]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'email')->input('email', [
                'placeholder' => 'example@mail.com',
                'class' => 'form-control form-control-lg',
            ]) ?>
        </div>


        <div

        <div class="col-md-6">
            <?= $form->field($model, 'password')->passwordInput([
                'placeholder' => 'Enter password',
                'class' => 'form-control form-control-lg',
            ]) ?>
        </div>

        <?php if (Yii::$app->user->identity->role === 'superadmin'): ?>
            <div class="col-md-6">
                <?= $form->field($model, 'role')->dropDownList([
                    'user' => 'User',
                    'admin' => 'Admin',
                ], [
                    'prompt' => 'Select Role',
                    'class' => 'form-select form-select-lg',
                ]) ?>
            </div>
        <?php endif; ?>
    </div>
</div>

