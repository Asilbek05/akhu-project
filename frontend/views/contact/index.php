<?php
/**
 * @var yii\web\View $this
 * @var common\models\ApplicationRequests $model
 * @var common\models\Settings $settings
 */

use common\models\Settings;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Contact Us';

$settings = Settings::find()->one();

$contacts = is_array($settings->contacts) ? $settings->contacts : [];
$socials = is_array($settings->socials) ? $settings->socials : [];
$location = $settings->location ?? 'Location not set';
?>

<main>
    <section class="contact_section section_space">
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="contact_form p-4 shadow-sm rounded h-100">
                        <h3 class="title">send us a message 👍🏻</h3>
                        <p class="content">
                            Give us a chance to serve and bring magic to your brand.
                        </p>

                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                            <div class="alert alert-success">
                                <?= Yii::$app->session->getFlash('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                            <div class="alert alert-danger">
                                <?= Yii::$app->session->getFlash('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Full Name', 'class' => 'form-control', 'id' => 'input_name'])->label('Full Name', ['class' => 'input_title']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'phone')->textInput(['placeholder' => '+998 01 234 56 78', 'class' => 'form-control', 'id' => 'input_phone'])->label('Your Phone', ['class' => 'input_title']) ?>
                            </div>
                            <div class="col-12">
                                <?= $form->field($model, 'message')->textarea(['placeholder' => 'How can we help you?', 'class' => 'form-control', 'id' => 'input_textarea', 'rows' => 6])->label('Message', ['class' => 'input_title']) ?>
                            </div>
                            <div class="col-12 mt-3">
                                <?= Html::submitButton('Send Message <span class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.0364 2.63798C11.6702 1.79536 10.0512 1.33203 8.37891 1.33203C3.82654 1.33203 0 4.72368 0 9.06641C0 10.589 0.473 12.0486 1.37148 13.3092L0.116359 17.2497C-0.0162422 17.6659 0.295539 18.0898 0.730598 18.0898C0.83007 18.0898 0.930188 18.0669 1.02257 18.0198L4.83957 16.0791C4.99413 16.1456 5.15062 16.2076 5.3087 16.265C4.42496 14.8857 3.95312 13.3023 3.95312 11.6445C3.95312 6.70755 8.10726 2.91208 13.0364 2.63798Z" fill="#170006"></path>
                                        <path d="M20.6285 15.8873C21.527 14.6267 22 13.1671 22 11.6445C22 7.30022 18.1718 3.91016 13.6211 3.91016C9.06873 3.91016 5.24219 7.30181 5.24219 11.6445C5.24219 15.9888 9.07036 19.3789 13.6211 19.3789C14.8421 19.3789 16.0588 19.1301 17.1602 18.6571L20.9774 20.598C21.2091 20.7157 21.4889 20.6829 21.6869 20.5146C21.885 20.3463 21.9626 20.0755 21.8837 19.8278L20.6285 15.8873ZM11 12.2891C10.644 12.2891 10.3555 12.0005 10.3555 11.6445C10.3555 11.2886 10.644 11 11 11C11.356 11 11.6445 11.2886 11.6445 11.6445C11.6445 12.0005 11.356 12.2891 11 12.2891ZM13.5781 12.2891C13.2222 12.2891 12.9336 12.0005 12.9336 11.6445C12.9336 11.2886 13.2222 11 13.5781 11C13.9341 11 14.2227 11.2886 14.2227 11.6445C14.2227 12.0005 13.9341 12.2891 13.5781 12.2891ZM16.1562 12.2891C15.8003 12.2891 15.5117 12.0005 15.5117 11.6445C15.5117 11.2886 15.8003 11 16.1562 11C16.5122 11 16.8008 11.2886 16.8008 11.6445C16.8008 12.0005 16.5122 12.2891 16.1562 12.2891Z" fill="#170006"></path>
                                    </svg></span>', ['class' => 'thm-btn', 'name' => 'contact-button']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="gmap_canvas p-4 shadow-sm rounded h-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.6691939457055!2d69.29289677648653!3d41.31605960041589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef51b50c0eda7%3A0x1ef4e0e3a79a0726!2sNew%20Uzbekistan%20University!5e0!3m2!1sen!2s!4v1754465170559!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="contact_info_box_inner text-center mt-5">
                <h2>Let us know how we can help</h2>
            </div>

            <div class="contact_info_box row mt-4">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="contact_iconbox p-4 shadow-sm rounded h-100 text-center">
                        <div class="iconbox_icon mb-3">
                            <img src="<?= Yii::getAlias('@web') ?>/img/icon/call-calling.svg" alt="Calling SVG Icon">
                        </div>
                        <div class="iconbox_content">
                            <h2 class="iconbox_title">Call Us On</h2>
                            <p>Mon-Fri from 8am to 5pm</p>
                            <h3><?= $contacts['phone'] ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="contact_iconbox p-4 shadow-sm rounded h-100 text-center">
                        <div class="iconbox_icon mb-3">
                            <img src="<?= Yii::getAlias('@web') ?>/img/icon/sms-edit.svg" alt="SMS SVG Icon">
                        </div>
                        <div class="iconbox_content">
                            <h2 class="iconbox_title">Email Us</h2>
                            <p>Speak to our Friendly team.</p>
                            <h3><?= $contacts['email'] ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                    <div class="contact_iconbox p-4 shadow-sm rounded h-100 text-center">
                        <div class="iconbox_icon mb-3">
                            <img src="<?= Yii::getAlias('@web') ?>/img/icon/location-add.svg" alt="Location SVG Icon">
                        </div>
                        <div class="iconbox_content">
                            <h2 class="iconbox_title">Our Location</h2>
                            <p>Visit our edubost university.</p>
                            <h3><?= $location ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>