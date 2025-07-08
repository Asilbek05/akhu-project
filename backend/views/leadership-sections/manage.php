<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Modal;

$this->title = 'Bo‘limlar: ' . $leadership->name;
$this->params['breadcrumbs'][] = ['label' => 'Bosh sahifa', 'url' => ['/']];
$this->params['breadcrumbs'][] = ['label' => 'Rahbariyat', 'url' => ['/leadership/index']];
$this->params['breadcrumbs'][] = ['label' => $leadership->name];
$this->params['breadcrumbs'][] = 'Bo‘limlar';
?>

<div class="container-fluid mt-5">

    <!-- Header + Breadcrumbs -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-0">Rahbariyat Bo‘limlari</h1>
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
                    <li class="breadcrumb-item text-muted"> - Bo‘limlar boshqaruvi</li>
                </ol>
            </nav>
        </div>
        <?= Html::a('<i class="bi bi-arrow-left"></i> Orqaga', ['/leadership/index'], ['class' => 'btn btn-light btn-sm fw-bold']) ?>
    </div>

    <!-- Add New Section Card -->
    <div class="card shadow-sm border-0 mb-5">

        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <?= $form->field($newSection, 'title')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-12">
                    <?= $form->field($newSection, 'content')->textarea(['rows' => 4]) ?>
                </div>
            </div>
            <div class="form-group mt-3">
                <?= Html::submitButton('<i class="bi bi-plus-circle me-1"></i> Qo‘shish', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <!-- Existing Sections Cards -->
    <div class="row">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border bg-light">
                    <div class="card-body">
                        <h5 class="card-title mb-2 fw-semibold text-dark"><?= Html::encode($model->title) ?></h5>
                        <p class="text-muted small mb-2"><?= Html::encode($model->content) ?></p>
                        <p class="text-muted small">Sort Order: <span class="fw-semibold"><?= $model->sort_order ?></span></p>
                    </div>
                    <div class="card-footer bg-secondary-subtle d-flex justify-content-between align-items-center">
                        <!-- Edit Modal Trigger -->
                        <button type="button" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $model->id ?>">
                            <i class="bi bi-pencil"></i> Tahrirlash
                        </button>
                        <?= Html::a('<i class="bi bi-trash"></i> O‘chirish', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-sm btn-light-danger',
                            'data' => [
                                'confirm' => 'Haqiqatan ham o‘chirmoqchimisiz?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>

            <!-- Modal for Editing -->
            <?php
            yii\bootstrap5\Modal::begin([
                'title' => '<i class="bi bi-pencil"></i> Bo‘limni tahrirlash',
                'id' => 'editModal' . $model->id,
                'size' => yii\bootstrap5\Modal::SIZE_LARGE,
                'dialogOptions' => ['class' => 'modal-dialog-centered'],
                'scrollable' => true,
            ]); ?>

            <?php $editForm = ActiveForm::begin([
                'action' => ['update', 'id' => $model->id],
                'method' => 'post',
            ]); ?>

            <?= $editForm->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $editForm->field($model, 'content')->textarea(['rows' => 4]) ?>

            <div class="form-group mt-3">
                <?= Html::submitButton('<i class="bi bi-save"></i> Saqlash', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php yii\bootstrap5\Modal::end(); ?>
        <?php endforeach; ?>
    </div>
</div>