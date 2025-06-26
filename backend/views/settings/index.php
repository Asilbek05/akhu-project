<?php
use yii\helpers\Html;
?>
<div class="container mt-4">
    <h2 class="mb-4">Settings</h2>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow border-primary">
                <div class="card-body">
                    <h5 class="card-title">Contacts</h5>
                    <p class="card-text small text-muted">
                        <?= nl2br(Html::encode(json_encode($model->contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) ?>
                    </p>
                    <?= Html::a('Tahrirlash', ['update', 'section' => 'contacts'], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-success">
                <div class="card-body">
                    <h5 class="card-title">Location</h5>
                    <p class="card-text small text-muted">
                        <?= Html::encode($model->location) ?>
                    </p>
                    <?= Html::a('Tahrirlash', ['update', 'section' => 'location'], ['class' => 'btn btn-outline-success btn-sm']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-secondary">
                <div class="card-body">
                    <h5 class="card-title">Socials</h5>
                    <p class="card-text small text-muted">
                        <?= nl2br(Html::encode(json_encode($model->socials, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) ?>
                    </p>
                    <?= Html::a('Tahrirlash', ['update', 'section' => 'socials'], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                </div>
            </div>
        </div>
    </div>
</div>