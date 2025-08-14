<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Postlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', [
    'depends' => [\yii\web\JqueryAsset::class]
]);
?>

<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
        <div id="kt_app_toolbar_container" class="container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!-- Page title -->

                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading text-gray-900 fw-bold fs-3 m-0"><?= Html::encode($this->title) ?></h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= \yii\helpers\Url::to(['/site/index']) ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                        </li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="text-muted text-hover-primary">Postlar</a>
                        </li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted"><?= Html::encode($this->title) ?></li>
                    </ul>
                </div>

                <!-- Action buttons -->

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <?= Html::a('<i class="bi bi-pencil me-1"></i> Tahrirlash', ['update', 'id' => $model->id], [
                        'class' => 'btn btn-flex btn-light-warning btn-sm fw-bold'
                    ]) ?>
                    <?= Html::a('<i class="bi bi-trash me-1"></i> O‘chirish', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-flex btn-light-danger btn-sm fw-bold',
                        'data' => [
                            'confirm' => 'Haqiqatan ham ushbu postni o‘chirmoqchimisiz?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('<i class="bi bi-arrow-left me-1"></i> Orqaga', ['index'], [
                        'class' => 'btn btn-flex btn-secondary btn-sm fw-bold'
                    ]) ?>
                </div>


            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content pt-3 flex-column-fluid">
        <div id="kt_app_content_container" class="container-fluid">
            <div class="card">
                <div class="card-body py-5 px-7">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['class' => 'table table-borderless align-middle fs-6 mb-0'],
                        'template' => '<tr class="border-bottom border-dashed">
                            <th class="text-gray-600 fw-semibold w-200px">{label}</th>
                            <td class="text-gray-800">{value}</td>
                        </tr>',
                        'attributes' => [
                            'id',
                            'user_id',
                            'title',
                            'slug',
                            [
                                'attribute' => 'content',
                                'format' => 'ntext',
                            ],
                            [
                                'label' => 'Rasmlar',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $output = '';
                                    foreach ($model->postImages as $img) {
                                        $imageUrl = Yii::$app->urlManagerFrontend->baseUrl . '/uploads/posts/' . $img->image;
                                        $output .= Html::a(
                                            Html::img($imageUrl, [
                                                'class' => 'img-fluid border rounded',
                                                'style' => 'max-width: 150px; margin: 5px;',
                                                'alt' => 'Post rasmi'
                                            ]),
                                            $imageUrl,
                                            ['data-lightbox' => 'post-images']
                                        );
                                    }
                                    return $output ?: '<span class="badge bg-light text-muted">Rasm yo‘q</span>';
                                }
                            ],
                            [
                                'attribute' => 'is_published',
                                'value' => $model->is_published ? 'Ha' : 'Yo‘q',
                            ],
                            [
                                'attribute' => 'created_at',
                                'format' => ['datetime', 'php:Y-m-d H:i'],
                            ],
                            [
                                'attribute' => 'updated_at',
                                'format' => ['datetime', 'php:Y-m-d H:i'],
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
