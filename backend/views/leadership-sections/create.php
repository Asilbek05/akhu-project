<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LeadershipSections $model */

$this->title = 'Create Leadership Sections';
$this->params['breadcrumbs'][] = ['label' => 'Leadership Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadership-sections-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
