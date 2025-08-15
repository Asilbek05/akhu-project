<?php
use yii\helpers\Html;

$this->title = 'Sayt Sozlamalari';
$this->params['breadcrumbs'][] = ['label' => 'Bosh sahifa', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid mt-5">

    <!-- BREADCRUMBS + TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1 text-dark"><?= Html::encode($this->title) ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 mb-0">
                    <li class="breadcrumb-item">
                        <?= Html::a('Bosh sahifa', ['/site/index'], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted"><?= Html::encode($this->title) ?></li>
                </ol>
            </nav>
        </div>
        <?= Html::a('<i class="bi bi-pencil me-1"></i> Tahrirlash', ['update-section', 'id' => $model->id, 'section' => 'contacts'], [
            'class' => 'btn btn-secondary btn-sm fw-bold'
        ]) ?>
    </div>

    <!-- MAIN CARD -->

        <div class="card-body">
            <div class="row g-4">

                <!-- CONTACTS -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3 fw-semibold text-dark">
                                <i class="bi bi-person-lines-fill me-2 text-primary"></i>Contacts
                            </h5>
                            <ul class="list-unstyled mb-0 small">
                                <?php if (is_array($model->contacts)): ?>
                                    <?php foreach ($model->contacts as $label => $value): ?>
                                        <li class="mb-1">
                                            <strong><?= Html::encode($label) ?>:</strong> <?= Html::encode($value) ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <li class="text-muted">Ma’lumot yo‘q</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- LOCATION -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3 fw-semibold text-dark">
                                <i class="bi bi-geo-alt-fill me-2 text-primary"></i>Location
                            </h5>
                            <p class="small mb-0">
                                <?= $model->location ? Html::encode($model->location) : '<span class="text-muted">Ma’lumot yo‘q</span>' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- SOCIALS -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3 fw-semibold text-dark">
                                <i class="bi bi-share-fill me-2 text-primary"></i>Socials
                            </h5>
                            <ul class="list-unstyled mb-0 small">
                                <?php if (is_array($model->socials)): ?>
                                    <?php foreach ($model->socials as $platform => $url): ?>
                                        <li class="mb-1">
                                            <strong><?= Html::encode($platform) ?>:</strong> <?= Html::encode($url) ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <li class="text-muted">Ma’lumot yo‘q</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>


</div>
