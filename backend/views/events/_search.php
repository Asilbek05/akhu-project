<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\EventsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card border-0 shadow-sm mb-5">
    <div class="card-header bg-light-success">
        <h3 class="card-title text-success fw-bold mb-0">
            <i class="bi bi-funnel-fill me-2"></i> Tadbirlar bo‘yicha qidirish
        </h3>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => ['class' => 'row g-4 align-items-end']
        ]); ?>

        <div class="col-lg-3">
            <?= $form->field($model, 'title')->textInput([
                'placeholder' => 'Sarlavha',
                'class' => 'form-control form-control-solid'
            ]) ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'location')->textInput([
                'placeholder' => 'Manzil',
                'class' => 'form-control form-control-solid'
            ]) ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'filter_start_date')->input('date', [
                'class' => 'form-control form-control-solid'
            ]) ?>
        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'filter_end_date')->input('date', [
                'class' => 'form-control form-control-solid'
            ]) ?>
        </div>

        <div class="col-12 d-flex justify-content-end gap-2">
            <?= Html::a('<i class="bi bi-x-circle"></i> Tozalash', ['index'], [
                'class' => 'btn btn-light px-4 fw-bold'
            ]) ?>
            <?= Html::submitButton('<i class="bi bi-search"></i> Qidirish', [
                'class' => 'btn btn-success px-4 fw-bold'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
