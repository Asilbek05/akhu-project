<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Events $model */

$this->title = 'Yangi Event yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Eventlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar pt-5 pb-2">
    <div id="kt_app_toolbar_container" class="container-fluid d-flex align-items-stretch">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">

            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <div class="d-flex align-items-center gap-2">
                    <h1 class="page-heading text-gray-900 fw-bold fs-3 m-0"><?= Html::encode($this->title) ?></h1>
                </div>

                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= Url::to(['/site/index']) ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= Url::to(['index']) ?>" class="text-muted text-hover-primary">Eventlar</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
            <!--end::Page title-->

            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <?= Html::a('<i class="bi bi-arrow-left"></i> Orqaga', ['index'], [
                    'class' => 'btn btn-flex btn-light fw-bold h-40px fs-7'
                ]) ?>
            </div>
            <!--end::Actions-->

        </div>
    </div>
</div>
<!--end::Toolbar-->

<!--begin::Content-->
<div class="app-content pt-5">
    <div class="container-fluid">

        <div class="card card-flush shadow-sm">
            <div class="card-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>

    </div>
</div>
<!--end::Content-->
