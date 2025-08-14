<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/** @var yii\web\View $this */
/** @var common\models\Events $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="events-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'title')->textInput([
                'maxlength' => true,
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Masalan: Seminar 2025'
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'location')->textInput([
                'maxlength' => true,
                'class' => 'form-control form-control-solid',
                'placeholder' => 'Masalan: Toshkent'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'start_date')->widget(DatePicker::class, [
                'options' => ['placeholder' => 'Boshlanish sanasini tanlang...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ],
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'time')->widget(TimePicker::class, [
                'pluginOptions' => [
                    'showSeconds' => false,
                    'showMeridian' => false,
                    'minuteStep' => 5,
                ]
            ]) ?>
        </div>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'description')->textarea([
            'rows' => 4,
            'class' => 'form-control form-control-solid',
            'placeholder' => 'Event haqida batafsil ma’lumot...'
        ]) ?>
    </div>

    <div class="text-end">
        <?= Html::submitButton($model->isNewRecord ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success fw-bold']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
