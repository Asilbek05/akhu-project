<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\EventsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card mb-6">
    <div class="card-header bg-light-success">
        <h3 class="card-title text-success">Search Events</h3>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => ['class' => 'row g-3']
        ]); ?>

        <div class="col-md-6 col-lg-4">
            <?= $form->field($model, 'title')->textInput([
                'placeholder' => 'Enter event title',
                'class' => 'form-control form-control-solid'
            ]) ?>
        </div>

        <div class="col-md-6 col-lg-4">
            <?= $form->field($model, 'location')->textInput([
                'placeholder' => 'Enter location',
                'class' => 'form-control form-control-solid'
            ]) ?>
        </div>

        <div class="col-12 d-flex justify-content-end mt-3 gap-2">
            <?= Html::resetButton('<i class="ki-duotone ki-cross fs-5"></i> Reset', ['class' => 'btn btn-light']) ?>
            <?= Html::submitButton('<i class="ki-duotone ki-magnifier fs-5"></i> Search', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
