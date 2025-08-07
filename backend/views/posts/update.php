<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */

$this->title = 'Postni tahrirlash: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Postlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>

<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
        <div id="kt_app_toolbar_container" class="container-fluid d-flex align-items-stretch justify-content-between">
            <div class="app-toolbar-wrapper d-flex flex-column flex-wrap gap-2">
                <!-- Page title -->
                <h1 class="page-heading text-gray-900 fw-bold fs-3 m-0"><?= Html::encode($this->title) ?></h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= Url::to(['/site/index']) ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                    </li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= Url::to(['index']) ?>" class="text-muted text-hover-primary">Postlar</a>
                    </li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="text-muted text-hover-primary"><?= Html::encode($model->title) ?></a>
                    </li>
                    <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                    <li class="breadcrumb-item text-muted">Tahrirlash</li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <?= Html::a('<i class="bi bi-arrow-left"></i> Orqaga', ['index'], [
                    'class' => 'btn btn-secondary btn-sm fw-bold'
                ]) ?>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content pt-3 flex-column-fluid">
        <div id="kt_app_content_container" class="container-fluid">
            <div class="card rounded-4 shadow-sm">
                <div class="card-body py-5 px-7">
                    <?= $this->render('_form', [
                        'model' => $model,
                        'allTags' => $allTags,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
