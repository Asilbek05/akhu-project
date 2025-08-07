<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Leadership $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="row g-4">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'Ism va familiya'
                ])->label('Ismi va familiyasi') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'position')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'Lavozimi'
                ])->label('Lavozimi') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'Elektron pochta'
                ])->label('Email') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'phone')->textInput([
                    'id' => 'leadership-phone',
                    'maxlength' => true,
                    'placeholder' => '+998 (__) ___-__-__',
                    'value' => $model->phone
                ])->label('Telefon raqam') ?>
            </div>

            <div class="col-12">
                <?= $form->field($model, 'photoFile')->widget(FileInput::class, [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'initialPreview' => $model->photo ? [$model->getPhotoUrl()] : [],
                        'initialPreviewAsData' => true,
                        'initialCaption' => $model->photo,
                        'overwriteInitial' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                        'browseLabel' => 'Rasmni tanlash',
                        'browseIcon' => '<i class="bi bi-image"></i> ',
                        'removeClass' => 'btn btn-light-danger btn-sm',
                        'browseClass' => 'btn btn-light-primary btn-sm',
                    ],
                ])->label('Rasm yuklash') ?>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <?= Html::submitButton('<i class="bi bi-save"></i> Saqlash', ['class' => 'btn btn-success fw-bold']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js', [
    'depends' => [\yii\web\JqueryAsset::class]
]);

$js = <<<JS
$('#leadership-phone').mask('+998 (00) 000-00-00', {
    placeholder: "+998 (__) ___-__-__"
});
JS;
$this->registerJs($js);
?>
