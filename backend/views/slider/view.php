<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Slider $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'button_text',
            'button_url',
            'sort_order',
            [
                'attribute' => 'background_image',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->background_image) {
                        return Html::img(Yii::$app->urlManagerFrontend->baseUrl . $model->background_image, [
                            'style' => 'max-width: 300px; border: 1px solid #ccc; padding: 5px;'
                        ]);
                    } else {
                        return '<span class="text-muted">Rasm yo‘q</span>';
                    }
                }
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>


</div>
