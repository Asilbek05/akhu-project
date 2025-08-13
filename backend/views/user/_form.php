<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\User $model */
/** @var \yii\widgets\ActiveForm $form */
/** @var bool $isUpdate */
$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', ['position' => \yii\web\View::POS_HEAD]);

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

        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'password')->begin() ?>
            <?= Html::activeLabel($model, 'password', ['class' => 'form-label']) ?>
            <div class="input-group">
                <?= Html::activePasswordInput($model, 'password', [
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Yangi parolni kiriting'
                ]) ?>
                <button class="btn btn-outline-secondary toggle-password" type="button">
                    <i class="bi bi-eye-slash"></i>
                </button>
            </div>
            <?= Html::error($model, 'password', ['class' => 'invalid-feedback d-block']) ?>
            <?= $form->field($model, 'password')->end() ?>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordToggles = document.querySelectorAll('.toggle-password');

        passwordToggles.forEach(button => {
            button.addEventListener('click', function() {
                const inputGroup = this.closest('.input-group');
                const passwordInput = inputGroup.querySelector('input');
                const icon = this.querySelector('i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
            });
        });
    });
</script>
