<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Leadership $model */

$this->title = 'Yangi Rahbariyat A’zosi';
$this->params['breadcrumbs'][] = ['label' => 'Rahbariyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Yaratish';
?>

<div class="container-fluid">

    <!-- Header va breadcrumbs -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1 text-gray-900"><?= Html::encode($this->title) ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item">
                        <a href="<?= Yii::$app->homeUrl ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item">
                        <?= Html::a('Rahbariyat', ['index'], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item text-muted">Yaratish</li>
                </ol>
            </nav>
        </div>
        <?= Html::a('<i class="bi bi-arrow-left"></i> Orqaga', ['index'], ['class' => 'btn btn-light btn-sm fw-bold']) ?>
    </div>

    <!-- Form -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
