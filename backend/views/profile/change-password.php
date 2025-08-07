<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Parolni o‘zgartirish';
?>

<h3><?= Html::encode($this->title) ?></h3>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'old_password')->passwordInput() ?>
<?= $form->field($model, 'new_password')->passwordInput() ?>
<?= $form->field($model, 'confirm_password')->passwordInput() ?>

<div class="form-group">
    <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
