<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PostsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card border-0 shadow-sm mb-4" style="background-color: #1e1e2f;">
    <div class="card-body">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => ['class' => 'row g-3'],
        ]); ?>

        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput([
                'placeholder' => 'Sarlavhadan qidirish...',
                'class' => 'form-control',
            ])->label(false) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'slug')->textInput([
                'placeholder' => 'Slug (manzil) bo‘yicha qidirish...',
                'class' => 'form-control',
            ])->label(false) ?>
        </div>

        <div class="col-12 d-flex justify-content-end">
            <?= Html::submitButton('<i class="bi bi-search"></i> Qidirish', [
                'class' => 'btn btn-primary me-2 px-4'
            ]) ?>
            <?= Html::a('<i class="bi bi-x-circle"></i> Tozalash', ['index'], [
                'class' => 'btn btn-outline-secondary px-4'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>