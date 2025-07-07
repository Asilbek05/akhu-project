<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="posts-form">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <div class="fv-row mb-3">
        <label class="form-label fw-semibold">
            Sarlavha
        </label>
        <?= $form->field($model, 'title', ['template' => '{input}{error}'])->textInput([
            'class' => 'form-control form-control-solid',
            'placeholder' => 'Masalan: Yangilik sarlavhasi',
        ]) ?>
    </div>

    <div class="fv-row mb-3">
        <label class="form-label fw-semibold">
            Kontent
        </label>
        <?= $form->field($model, 'content', ['template' => '{input}{error}'])->textarea([
            'class' => 'form-control form-control-solid',
            'rows' => 6,
            'placeholder' => 'Yangilik matni...',
        ]) ?>
    </div>

    <div class="fv-row mb-3">
        <label class="form-label fw-semibold">
            Rasmlar
        </label>
        <?= $form->field($model, 'images[]', ['template' => '{input}{error}'])->widget(FileInput::class, [
            'options' => ['multiple' => true, 'accept' => 'image/*'],
            'pluginOptions' => [
                'initialPreview' => $model->isNewRecord ? [] : $model->getImagesUrls(),
                'initialPreviewAsData' => true,
                'initialPreviewConfig' => $model->isNewRecord ? [] : $model->getImagesPreviewConfig(),
                'overwriteInitial' => false,
                'showUpload' => false,
                'showRemove' => true,
                'maxFileCount' => 10,
                'browseLabel' => 'Rasmlar tanlash',
                'removeLabel' => 'O‘chirish',
                'browseIcon' => '<i class="bi bi-image"></i>',
                'removeIcon' => '<i class="bi bi-trash"></i>',
                'browseClass' => 'btn btn-light-primary fw-semibold',
                'cancelClass' => 'btn btn-light-info fw-semibold',
                'removeClass' => 'btn btn-light-danger fw-semibold',
            ],
        ]) ?>
    </div>

    <div class="fv-row mb-3 form-check">
        <?= $form->field($model, 'is_published', ['template' => '{input}{label}{error}'])->checkbox([
            'label' => 'Nashr qilish',
            'class' => 'form-check-input',
            'labelOptions' => ['class' => 'form-check-label fw-semibold'],
        ]) ?>
    </div>

    <div class="d-flex justify-content-end">
        <?= Html::submitButton($model->isNewRecord ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
