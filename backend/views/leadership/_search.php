<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\LeadershipSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="mb-0">Search Leadership</h6>
    </div>

    <div class="card-body">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <div class="row g-2">
            <div class="col-md-4">
                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name'])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'position')->textInput(['placeholder' => 'Position'])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>
            </div>
        </div>

        <div class="mt-3 d-flex justify-content-end gap-2">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
