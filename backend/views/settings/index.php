<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Site Settings';
?>
<div class="settings-index container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Settings</h5>
            <?= Html::a('Tahrirlash', ['update-section', 'id' => $model->id, 'section' => 'contacts'], [
                'class' => 'btn btn-warning btn-sm',
            ]) ?>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4">
                    <h6 class="text-muted">Contacts</h6>
                    <ul class="list-unstyled small">
                        <?php if (is_array($model->contacts)): ?>
                            <?php foreach ($model->contacts as $label => $value): ?>
                                <li><strong><?= Html::encode($label) ?>:</strong> <?= Html::encode($value) ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-muted">Not Found</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h6 class="text-muted">Location</h6>
                    <p class="small mb-0">
                        <?= Html::encode($model->location ?: 'Ma`lumot yo‘q') ?>
                    </p>
                </div>

                <div class="col-md-4">
                    <h6 class="text-muted">Socials</h6>
                    <ul class="list-unstyled small">
                        <?php if (is_array($model->socials)): ?>
                            <?php foreach ($model->socials as $platform => $url): ?>
                                <li><strong><?= Html::encode($platform) ?>:</strong> <?= Html::encode($url) ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-muted">Ma`lumot yo‘q</li>
                        <?php endif; ?>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
