<?php

use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\EventSchedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card shadow-sm border border-dashed border-gray-300 rounded-4">
    <div class="card-header bg-light d-flex align-items-center justify-content-between rounded-top-4">
        <h5 class="mb-0 fw-bold text-dark">
            <i class="bi bi-calendar-event me-2"></i> <?= Html::encode($this->title) ?>
        </h5>
    </div>

    <div class="card-body py-4 px-5">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row mb-3">
            <div class="col-md-12">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'form-control form-control-solid']) ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <?= $form->field($model, 'start_time')->widget(TimePicker::class, [
                    'pluginOptions' => [
                        'showSeconds' => false,
                        'showMeridian' => false,
                        'minuteStep' => 1,
                        'defaultTime' => '08:00'
                    ],
                    'options' => ['class' => 'form-control form-control-solid']
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'end_time')->widget(TimePicker::class, [
                    'pluginOptions' => [
                        'showSeconds' => false,
                        'showMeridian' => false,
                        'minuteStep' => 1,
                        'defaultTime' => '17:00'
                    ],
                    'options' => ['class' => 'form-control form-control-solid']
                ]) ?>
            </div>
        </div>


        <div class="row mb-4">
            <div class="col-md-12">
                <?= $form->field($model, 'description')->textarea(['rows' => 3, 'class' => 'form-control form-control-solid']) ?>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <?= Html::submitButton('<i class="bi bi-save me-1"></i> Saqlash', ['class' => 'btn btn-success fw-bold']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
