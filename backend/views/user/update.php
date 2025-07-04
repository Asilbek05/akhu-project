<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

$form = ActiveForm::begin([
    'id' => 'update-user-form',
]);
echo $this->render('_form', [
    'model' => $model,
    'form' => $form,
]);
echo Html::submitButton('Update', ['class' => 'btn btn-primary mt-3']);
ActiveForm::end();
