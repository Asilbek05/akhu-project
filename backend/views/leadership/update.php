<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Leadership $model */

$this->title = 'Update Leadership: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Leaderships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leadership-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
