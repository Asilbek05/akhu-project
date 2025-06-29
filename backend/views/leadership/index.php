<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Leadership';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="leadership-index">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Create Leadership', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?= $this->render('_search', ['model' => $searchModel]) ?>
    <div class="row">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow border-0" style="border-radius: 0.75rem; overflow: hidden; transition: transform 0.2s;">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-2"><?= Html::encode($model->name) ?></h5>
                        <p class="text-muted mb-3"><?= Html::encode($model->position) ?></p>
                        <ul class="list-unstyled mb-3 small">
                            <li><strong>Email:</strong> <?= Html::encode($model->email) ?></li>
                            <li><strong>Phone:</strong> <?= Html::encode($model->phone) ?></li>
                            <li><strong>Sort Order:</strong> <?= Html::encode($model->sort_order) ?></li>
                            <li class="text-muted">Created: <?= Yii::$app->formatter->asDate($model->created_at) ?></li>
                            <li class="text-muted">Updated: <?= Yii::$app->formatter->asDate($model->updated_at) ?></li>
                        </ul>
                    </div>

                    <div class="card-footer bg-primary text-white d-flex justify-content-between align-items-center p-3">
                        <?php if ($model->photo): ?>
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#photoModal<?= $model->id ?>">
                                View Photo
                            </button>
                        <?php else: ?>
                            <span class="text-light small">No Photo</span>
                        <?php endif; ?>

                        <div class="d-flex gap-2">
                            <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-light btn-sm']) ?>
                            <?= Html::a('Sections', ['leadership-sections/manage', 'leadership_id' => $model->id], ['class' => 'btn btn-warning btn-sm']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for viewing photo -->
            <?php if ($model->photo): ?>
                <div class="modal fade" id="photoModal<?= $model->id ?>" tabindex="-1" aria-labelledby="photoModalLabel<?= $model->id ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="photoModalLabel<?= $model->id ?>"><?= Html::encode($model->name) ?> - Photo</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="<?= Yii::$app->urlManagerFrontend->baseUrl . $model->photo ?>" class="img-fluid rounded shadow">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
</style>
