<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

$this->title = 'Create Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'start_date')->widget(DatePicker::class, [
                    'options' => ['placeholder' => 'Select start date...'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'end_date')->widget(DatePicker::class, [
                    'options' => ['placeholder' => 'Select end date...'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'time')->widget(TimePicker::class, [
                    'pluginOptions' => [
                        'showSeconds' => false,
                        'showMeridian' => false,
                        'minuteStep' => 5,
                    ]
                ]) ?>
            </div>
        </div>

        <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>


        <div class="form-group mt-3">
            <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
