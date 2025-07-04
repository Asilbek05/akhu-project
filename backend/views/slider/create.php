<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = 'Yangi Slayder Yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Slayderlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="slider-create container-fluid py-4">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar_container" class="d-flex flex-stack flex-wrap mb-5">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <h1 class="page-heading d-flex align-items-center text-gray-900 fw-bold fs-3 m-0">
                    <?= Html::encode($this->title) ?>
                </h1>
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= \yii\helpers\Url::to(['/site/index']) ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="text-muted text-hover-primary">Slayderlar</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Yaratish</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <?= Html::a('<i class="bi bi-arrow-left"></i> Orqaga', ['index'], [
                    'class' => 'btn btn-light btn-sm fw-semibold'
                ]) ?>
            </div>
            <!--end::Actions-->
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Form Card-->
    <div id="kt_app_content" class="app-content pt-3 flex-column-fluid">
        <div id="kt_app_content_container" class="container-fluid">
            <div class="card">
                <div class="card-body py-5 px-7">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <!--end::Form Card-->
</div>
