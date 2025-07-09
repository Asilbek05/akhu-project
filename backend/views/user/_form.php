<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\User $model */
/** @var \yii\widgets\ActiveForm $form */
/** @var bool $isUpdate */
?>

<div class="user-form">
    <div class="row g-3">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput([
                'class' => 'form-control form-control-lg',
            ]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'email')->input('email', [
                'class' => 'form-control form-control-lg',
            ]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'password')->passwordInput([
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
