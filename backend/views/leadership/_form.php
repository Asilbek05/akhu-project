<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



/** @var yii\web\View $this */
/** @var common\models\Leadership $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="leadership-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput([
        'id' => 'leadership-phone',
        'maxlength' => true,
        'value' => $model->phone
    ]) ?>


    <?= $form->field($model, 'photoFile')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'initialPreview' => $model->photo ? [$model->getPhotoUrl()] : [],
            'initialPreviewAsData' => true,
            'initialCaption' => $model->photo,
            'overwriteInitial' => true,
            'showRemove' => true,
            'showUpload' => false,
            'browseLabel' => 'Rasm tanlash',
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

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