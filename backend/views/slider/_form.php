<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Slider $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="slider-form">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <div class="fv-row mb-3">
        <label class="form-label fw-semibold d-flex align-items-center gap-2">
            Sarlavha
            <i class="bi bi-info-circle text-gray-600 fs-6" data-bs-toggle="tooltip" title="Sarlavha faqat adminlarga ko‘rinadi, slider nomi."></i>
        </label>
        <?= $form->field($model, 'name', ['template' => '{input}{error}'])->textInput([
            'class' => 'form-control form-control-solid',
            'placeholder' => 'Masalan: Bosh sahifa slayderi',
        ]) ?>
    </div>

    <div class="fv-row mb-3">
        <label class="form-label fw-semibold d-flex align-items-center gap-2">
            Tavsif
            <i class="bi bi-info-circle text-gray-600 fs-6" data-bs-toggle="tooltip" title="Slider ostida chiqadigan qisqacha tavsif."></i>
        </label>
        <?= $form->field($model, 'description', ['template' => '{input}{error}'])->textarea([
            'class' => 'form-control form-control-solid',
            'rows' => 4,
            'placeholder' => 'Masalan: Yangi kurslarimizga a’zo bo‘ling!',
        ]) ?>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="fv-row mb-3">
                <label class="form-label fw-semibold d-flex align-items-center gap-2">
                    Tugma matni
                    <i class="bi bi-info-circle text-gray-600 fs-6" data-bs-toggle="tooltip" title="Tugmada ko‘rinadigan matn. Masalan: Ko‘rish, Bog‘lanish"></i>
                </label>
                <?= $form->field($model, 'button_text', ['template' => '{input}{error}'])->textInput([
                    'class' => 'form-control form-control-solid',
                    'placeholder' => 'Masalan: Ko‘rish',
                ]) ?>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="fv-row mb-3">
                <label class="form-label fw-semibold d-flex align-items-center gap-2">
                    Tugma URL
                    <i class="bi bi-info-circle text-gray-600 fs-6" data-bs-toggle="tooltip" title="Tugma bosilganda ochiladigan manzil. Masalan: https://example.com"></i>
                </label>
                <?= $form->field($model, 'button_url', ['template' => '{input}{error}'])->textInput([
                    'class' => 'form-control form-control-solid',
                    'placeholder' => 'https://...',
                ]) ?>
            </div>
        </div>
    </div>

    <div class="fv-row mb-3">
        <label class="form-label fw-semibold d-flex align-items-center gap-2">
            Fon rasmi
            <i class="bi bi-info-circle text-gray-600 fs-6" data-bs-toggle="tooltip" title="Slider foniga qo‘yiladigan rasm. JPG/PNG tavsiya etiladi."></i>
        </label>
        <?= $form->field($model, 'background_image_file', ['template' => '{input}{error}'])->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'initialPreview' => $model->background_image ? [
                    Yii::$app->request->baseUrl . $model->background_image
                ] : [],
                'initialPreviewAsData' => true,
                'overwriteInitial' => true,
                'showUpload' => false,
                'showRemove' => true,
                'browseLabel' => 'Rasm tanlash',
                'removeLabel' => 'O‘chirish',
                'browseIcon' => '<i class="bi bi-image"></i>',
                'removeIcon' => '<i class="bi bi-trash"></i>',
                'previewFileType' => 'image',

                // 💡 Metronic-style button classes:
                'browseClass' => 'btn btn-light-primary fw-semibold',
                'cancelClass' => 'btn btn-light-info fw-semibold',
                'removeClass' => 'btn btn-light-danger fw-semibold',
            ]
        ]) ?>

    </div>

    <div class="d-flex justify-content-end">
        <?= Html::submitButton($model->isNewRecord ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs('
    const tooltipTriggerList = [].slice.call(document.querySelectorAll(\'[data-bs-toggle="tooltip"]\'))
    tooltipTriggerList.map(el => new bootstrap.Tooltip(el));
');
?>
