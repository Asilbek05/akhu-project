<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var \yii\web\View $this */
/** @var \common\models\User $model */

$form = ActiveForm::begin([
    'action' => ['user/update', 'id' => $model->id],
    'id' => 'update-user-form',
]);
echo $this->render('_form', [
    'model' => $model,
    'form' => $form,
    'isUpdate' => true, // important!
]);
echo Html::submitButton('<i class="bi bi-save me-1"></i> Saqlash', ['class' => 'btn btn-warning mt-3']);
ActiveForm::end();
?>