<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\EventSchedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card card-body">
    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'start_time')->textInput(['type' => 'time']) ?>
    <?= $form->field($model, 'end_time')->textInput(['type' => 'time']) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'event_id')->hiddenInput()->label(false) ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['manage', 'event_id' => $model->event_id], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

