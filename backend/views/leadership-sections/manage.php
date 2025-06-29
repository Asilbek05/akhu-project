<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Sections for: " . $leadership->name;
$this->params['breadcrumbs'][] = ['label' => 'Leadership', 'url' => ['/leadership/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="leadership-section-manage">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Back to Leadership', ['/leadership/index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            Add New Section
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($newSection, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($newSection, 'content')->textarea(['rows' => 4]) ?>

            <div class="form-group mt-3">
                <?= Html::submitButton('Add Section', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="row">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-2"><?= Html::encode($model->title) ?></h5>
                        <p class="text-muted small">Sort Order: <?= $model->sort_order ?></p>
                        <div class="text-muted small mb-2"><?= Html::encode($model->content) ?></div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-between">
                        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-outline-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
