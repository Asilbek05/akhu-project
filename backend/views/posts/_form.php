<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */
/** @var yii\widgets\ActiveForm $form */
/** @var common\models\Tag[] $allTags */
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
        ])->label(false) ?>
    </div>

    <div class="fv-row mb-3">
        <label class="form-label fw-semibold">
            Kontent
        </label>
        <?= $form->field($model, 'content', ['template' => '{input}{error}'])->textarea([
                'id' => 'editor',
                'rows' => 6,
                'placeholder' => 'Yangilik matni...',
                'class' => 'form-control form-control-solid'
        ])->label(false) ?>
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
        ])->label(false) ?>
    </div>

    <div class="fv-row mb-3">

        <?= $form->field($model, 'tagNames')->widget(Select2::classname(), [
                'data' => array_combine($allTags, $allTags),
                'options' => ['placeholder' => 'Tag tanlang yoki yozing...', 'multiple' => true],
                'pluginOptions' => [
                        'tags' => true,
                        'tokenSeparators' => [',', ' '],
                        'maximumInputLength' => 50,
                ],
        ]); ?>

    <div class="fv-row mb-3 form-check">
        <?= $form->field($model, 'is_published', ['template' => '{input}{label}{error}'])->checkbox([
                'class' => 'form-check-input',
                'labelOptions' => ['class' => 'form-check-label fw-semibold'],
        ]) ?>
    </div>

    <div class="d-flex justify-content-end">
        <?= Html::submitButton($model->isNewRecord ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJsFile('https://cdn.tiny.cloud/1/ibobofjhej00ik4c2w3sgmd9fpx3uips1wapsudbls29bfnw/tinymce/8/tinymce.min.js', [
        'position' => \yii\web\View::POS_END
]);

$this->registerJs("
    tinymce.init({
        selector: 'textarea',
        plugins: [
            'advlist', 'lists', 'autolink', 'wordcount'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | ' +
                 'bold italic underline strikethrough | ' +
                 'numlist bullist | ' +
                 'removeformat',
        menubar: false,
    });
");
?>