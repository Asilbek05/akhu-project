<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ApplicationRequests $model */

$this->title = 'Create Application Requests';
$this->params['breadcrumbs'][] = ['label' => 'Application Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-requests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
