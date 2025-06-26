<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Sozlamalarni tahrirlash';
?>
<div class="container mt-4">
    <h2 class="mb-4"><?= Html::encode($this->title) ?></h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-info shadow-sm mb-4">
                <div class="card-header bg-info text-white">Contacts</div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

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
        </div>

        <div class="col-md-6">
            <div class="card border-secondary shadow-sm mb-4">
                <div class="card-header bg-secondary text-white">Socials</div>
                <div class="card-body">
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
        </div>

        <div class="col-md-12">
            <div class="card border-success shadow-sm mb-4">
                <div class="card-header bg-success text-white">Location</div>
                <div class="card-body">
                    <?= $form->field($model, 'location')->textInput([
                        'placeholder' => 'Toshkent sh, Mirzo Ulug‘bek, Movarounnahr 1'
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="col-md-12 text-end">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary btn-lg']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>