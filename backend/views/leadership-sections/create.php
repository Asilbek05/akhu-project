<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\LeadershipSections $model */
/** @var common\models\Leadership $leadership */

$this->title = 'Bo‘lim qo‘shish';
$this->params['breadcrumbs'][] = ['label' => 'Bosh sahifa', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Rahbariyat', 'url' => ['/leadership/index']];
$this->params['breadcrumbs'][] = ['label' => $leadership->name, 'url' => ['/leadership/update', 'id' => $leadership->id]];
$this->params['breadcrumbs'][] = ['label' => 'Bo‘limlar', 'url' => ['manage', 'leadership_id' => $leadership->id]];
$this->params['breadcrumbs'][] = 'Qo‘shish';
?>

<div class="container-fluid">

    <!-- Header va Breadcrumbs -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1 text-gray-900"><?= Html::encode($this->title) ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                    <li class="breadcrumb-item">
                        <a href="<?= Yii::$app->homeUrl ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item">
                        <?= Html::a('Rahbariyat', ['/leadership/index'], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item">
                        <?= Html::a(Html::encode($leadership->name), ['/leadership/update', 'id' => $leadership->id], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item">
                        <?= Html::a('Bo‘limlar', ['manage', 'leadership_id' => $leadership->id], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item text-muted">Qo‘shish</li>
                </ol>
            </nav>
        </div>
        <?= Html::a('<i class="bi bi-arrow-left"></i> Orqaga', ['manage', 'leadership_id' => $leadership->id], ['class' => 'btn btn-light btn-sm fw-bold']) ?>
    </div>

    <!-- Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h3 class="card-title mb-0 fw-semibold text-dark">
                <i class="bi bi-plus-circle me-2"></i> Yangi Bo‘lim Qo‘shish
            </h3>
        </div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
                'leadership' => $leadership
            ]) ?>
        </div>
    </div>
</div>
