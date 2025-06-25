<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LeadershipSections $model */

$this->title = 'Update Leadership Sections: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Leadership Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leadership-sections-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
