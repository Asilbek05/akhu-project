<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', [
    'depends' => [\yii\web\JqueryAsset::class]
]);

?>
<div class="posts-view">

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
            'user_id',
            'title',
            'slug',
            'content:ntext',
            [
                'label' => 'Rasmlar',
                'format' => 'raw',
                'value' => function ($model) {
                    $output = '';
                    foreach ($model->postImages as $img) {
                        $imageUrl = Yii::$app->urlManagerFrontend->baseUrl . '/uploads/posts/' . $img->image;
                        $output .= Html::a(
                            Html::img($imageUrl, [
                                'style' => 'max-width: 150px; margin: 5px; border:1px solid #ccc; border-radius:5px;'
                            ]),
                            $imageUrl,
                            ['data-lightbox' => 'post-images']
                        );
                    }

                    return $output ?: '<span class="text-muted">Rasm yo‘q</span>';
                }
            ],
            'is_published',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
