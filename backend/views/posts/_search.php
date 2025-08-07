<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>



<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => ['class' => 'row g-4 align-items-center'],
]); ?>

<div class="col-md-6">
    <?= $form->field($model, 'title')->textInput([
        'placeholder' => 'Sarlavha bo‘yicha qidirish...',
        'class' => 'form-control form-control-solid',
    ])->label(false) ?>
</div>

<div class="col-md-6">
    <?= $form->field($model, 'slug')->textInput([
        'placeholder' => 'Slug (manzil) bo‘yicha qidirish...',
        'class' => 'form-control form-control-solid',
    ])->label(false) ?>
</div>

<div class="col-12 text-end">
    <?= Html::submitButton('<i class="bi bi-search"></i> Qidirish', [
        'class' => 'btn btn-primary me-2 px-4 fw-bold'
    ]) ?>
    <?= Html::a('<i class="bi bi-x-circle"></i> Tozalash', ['index'], [
        'class' => 'btn btn-light px-4 fw-bold'
    ]) ?>
</div>

<?php ActiveForm::end(); ?>
