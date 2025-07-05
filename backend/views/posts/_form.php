<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="mb-3">
        <?= $form->field($model, 'images[]')->widget(kartik\file\FileInput::class, [
            'options' => ['multiple' => true, 'accept' => 'image/*'],
            'pluginOptions' => [
                'initialPreview' => $model->isNewRecord ? [] : $model->getImagesUrls(),
                'initialPreviewAsData' => true,
                'initialPreviewConfig' => $model->isNewRecord ? [] : $model->getImagesPreviewConfig(),
                'overwriteInitial' => false,
                'showUpload' => false,
                'showRemove' => true,
                'maxFileCount' => 10,
            ],
        ]) ?>

    </div>


    <?= $form->field($model, 'is_published')->checkbox([
        'label' => 'Nashr qilish',
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
