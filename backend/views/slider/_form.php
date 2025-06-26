<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Modal;

/** @var yii\web\View $this */
/** @var common\models\Slider $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])
        ->label(
            Html::encode('Sarlavha') .
            ' <a href="#" data-bs-toggle="modal" data-bs-target="#modal-name"><i class="bi bi-info-circle-fill text-info"></i></a>',
            ['encode' => false]
        ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])
        ->label(
            Html::encode('Description') .
            ' <a href="#" data-bs-toggle="modal" data-bs-target="#modal-description"><i class="bi bi-info-circle-fill text-info"></i></a>',
            ['encode' => false]
        ) ?>

    <?= $form->field($model, 'button_text')->textInput(['maxlength' => true])
        ->label(
            Html::encode('Button text') .
            ' <a href="#" data-bs-toggle="modal" data-bs-target="#modal-button-text"><i class="bi bi-info-circle-fill text-info"></i></a>',
            ['encode' => false]
        ) ?>

    <?= $form->field($model, 'button_url')->textInput(['maxlength' => true])
        ->label(
            Html::encode('Button URL') .
            ' <a href="#" data-bs-toggle="modal" data-bs-target="#modal-button-url"><i class="bi bi-info-circle-fill text-info"></i></a>',
            ['encode' => false]
        ) ?>

    <?= $form->field($model, 'background_image_file')->widget(FileInput::class, [
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
        ]
    ]) ?>


    <div class="form-group mt-3">
        <?= Html::submitButton($model->isNewRecord ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
// Modallar
Modal::begin(['id' => 'modal-name', 'title' => 'Sarlavha haqida']);
echo "Sarlavha faqat adminlarga ko‘rinadi, slider nomi.";
Modal::end();

Modal::begin(['id' => 'modal-description', 'title' => 'Tavsif haqida']);
echo "Bu yerga slider ostida chiqadigan qisqacha tavsif yoziladi.";
Modal::end();

Modal::begin(['id' => 'modal-button-text', 'title' => 'Tugma matni']);
echo "Tugmada ko‘rinadigan matn, masalan: 'Ko‘rish', 'Bog‘lanish'.";
Modal::end();

Modal::begin(['id' => 'modal-button-url', 'title' => 'Tugma URL']);
echo "Tugma bosilganda ochiladigan manzil (https://...)";
Modal::end();
?>

