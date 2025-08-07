<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Sayt Sozlamalarini Tahrirlash';
$this->params['breadcrumbs'][] = ['label' => 'Bosh sahifa', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sayt Sozlamalari', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>

<div class="container-fluid mt-5">

    <!-- Breadcrumbs + Title -->
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
                    <li class="breadcrumb-item">
                        <?= Html::a('Sayt Sozlamalari', ['index'], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item text-muted">Tahrirlash</li>
                </ol>
            </nav>
        </div>
        <?= Html::a('<i class="bi bi-arrow-left"></i> Orqaga', ['index'], ['class' => 'btn btn-light btn-sm fw-bold']) ?>
    </div>

    <!-- Main Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light-secondary py-3">
            <h3 class="card-title fw-semibold mb-0 text-dark">
                <i class="bi bi-gear me-2"></i> Sozlamalarni Tahrirlash Formasi
            </h3>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row g-4">

                <!-- Contacts -->
                <div class="col-lg-6">
                    <div class="border rounded p-3 bg-light">
                        <h5 class="fw-semibold mb-3 text-dark">
                            <i class="bi bi-person-lines-fill me-2 text-primary"></i>Contacts
                        </h5>

                        <?= $form->field($model, 'contacts[phone]')->textInput([
                            'value' => $model->contacts['phone'] ?? '',
                            'placeholder' => '+998 (71) 202-41-11'
                        ])->label('Telefon raqami') ?>

                        <?= $form->field($model, 'contacts[email]')->textInput([
                            'value' => $model->contacts['email'] ?? '',
                            'placeholder' => 'info@newuu.uz'
                        ])->label('Asosiy email') ?>

                        <?= $form->field($model, 'contacts[admission_email]')->textInput([
                            'value' => $model->contacts['admission_email'] ?? '',
                            'placeholder' => 'admission@newuu.uz'
                        ])->label('Qabul bo‘limi emaili') ?>
                    </div>
                </div>

                <!-- Socials -->
                <div class="col-lg-6">
                    <div class="border rounded p-3 bg-light">
                        <h5 class="fw-semibold mb-3 text-dark">
                            <i class="bi bi-share-fill me-2 text-primary"></i>Socials
                        </h5>

                        <?= $form->field($model, 'socials[telegram]')->textInput([
                            'value' => $model->socials['telegram'] ?? '',
                            'placeholder' => 'https://t.me/yourchannel'
                        ]) ?>

                        <?= $form->field($model, 'socials[youtube]')->textInput([
                            'value' => $model->socials['youtube'] ?? '',
                            'placeholder' => 'https://youtube.com/yourchannel'
                        ]) ?>

                        <?= $form->field($model, 'socials[facebook]')->textInput([
                            'value' => $model->socials['facebook'] ?? '',
                            'placeholder' => 'https://facebook.com/yourpage'
                        ]) ?>

                        <?= $form->field($model, 'socials[instagram]')->textInput([
                            'value' => $model->socials['instagram'] ?? '',
                            'placeholder' => 'https://instagram.com/yourprofile'
                        ]) ?>
                    </div>
                </div>

                <!-- Location -->
                <div class="col-12">
                    <div class="border rounded p-3 bg-light">
                        <h5 class="fw-semibold mb-3 text-dark">
                            <i class="bi bi-geo-alt-fill me-2 text-primary"></i>Location
                        </h5>
                        <?= $form->field($model, 'location')->textInput([
                            'placeholder' => 'Toshkent sh, Mirzo Ulug‘bek, Movarounnahr 1'
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <?= Html::submitButton('<i class="bi bi-check-circle me-1"></i> Saqlash', ['class' => 'btn btn-primary btn-lg fw-bold']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
