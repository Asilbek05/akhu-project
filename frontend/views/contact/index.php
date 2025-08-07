<?php
/**
 * @var yii\web\View $this
 * @var common\models\ApplicationRequests $model
 * @var common\models\Settings $settings
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use common\models\Settings;

$this->title = 'Contact Us';

$settings = Settings::find()->one();
$location = $settings->location ?? '195, Abdulg’oziy Bahodirxon (Tarraqqiyot) Road, Urgench 220100, Khorezm Region, Uzbekistan';
?>

    <main>

        <section class="breadcrumb bg_img ul_li" data-background="<?= Yii::getAlias('@web') ?>/img/bg/breadcrump.png">
            <div class="container">
                <div class="breadcrumb__content text-center">
                    <h2 class="breadcrumb__title">contact us</h2>
                    <p class="breadcrumb__desc">Get in Touch</p>
                </div>
            </div>
        </section>

        <section class="contact_section section_space" data-bg-color="#f8fafd" style="background-color: rgb(241, 241, 233);">
            <div class="container">
                <div class="row justify-content-lg-between mt-none-30">
                    <div class="col-lg-7 mt-30">
                        <div class="contact_form mb-0">
                            <?php if (Yii::$app->session->hasFlash('success')): ?>
                                <div class="pb-30">
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                        <svg fill="#0a3622" width="30px" height="30px" viewBox="0 0 24 24" id="check-mark-circle-2" xmlns="http://www.w3.org/2000/svg" class="icon line"><path id="primary" d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1" style="fill: none; stroke: #0a3622; stroke-linecap: round; stroke-linejoin: round; stroke-width: 1.5;"></path><polyline id="primary-2" data-name="primary" points="21 5 12 14 8 10" style="fill: none; stroke: #0a3622; stroke-linecap: round; stroke-linejoin: round; stroke-width: 1.5;"></polyline></svg>
                                        <div class="ps-3 fs-7">
                                            <?= Yii::$app->session->getFlash('success') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (Yii::$app->session->hasFlash('error')): ?>
                                <div class="alert alert-danger">
                                    <?= Yii::$app->session->getFlash('error') ?>
                                </div>
                            <?php endif; ?>

                            <h3 class="title">send us a message 👍🏻</h3>
                            <p class="content">
                                Give us a chance to serve and bring magic to your brand.
                            </p>

                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Otabek Shukurov', 'class' => 'form-control', 'id' => 'input_name'])->label('Full Name', ['class' => 'input_title']) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'otabek@example.com', 'class' => 'form-control', 'id' => 'input_email'])->label('Your Email', ['class' => 'input_title']) ?>
                                </div>
                                <div class="col-12">
                                    <?= $form->field($model, 'phone')->textInput(['placeholder' => '+998 90 3279787', 'class' => 'form-control', 'id' => 'input_phone'])->label('Your Phone', ['class' => 'input_title']) ?>
                                </div>
                                <div class="col-12">
                                    <?= $form->field($model, 'message')->textarea(['placeholder' => 'How can we help you?', 'class' => 'form-control', 'id' => 'input_textarea', 'rows' => 6])->label('Message', ['class' => 'input_title']) ?>
                                </div>
                                <div class="col-12 mt-3">
                                    <?= Html::submitButton('Send Message <span class="icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.0364 2.63798C11.6702 1.79536 10.0512 1.33203 8.37891 1.33203C3.82654 1.33203 0 4.72368 0 9.06641C0 10.589 0.473 12.0486 1.37148 13.3092L0.116359 17.2497C-0.0162422 17.6659 0.295539 18.0898 0.730598 18.0898C0.83007 18.0898 0.930188 18.0669 1.02257 18.0198L4.83957 16.0791C4.99413 16.1456 5.15062 16.2076 5.3087 16.265C4.42496 14.8857 3.95312 13.3023 3.95312 11.6445C3.95312 6.70755 8.10726 2.91208 13.0364 2.63798Z" fill="#ffffff"></path>
                                        <path d="M20.6285 15.8873C21.527 14.6267 22 13.1671 22 11.6445C22 7.30022 18.1718 3.91016 13.6211 3.91016C9.06873 3.91016 5.24219 7.30181 5.24219 11.6445C5.24219 15.9888 9.07036 19.3789 13.6211 19.3789C14.8421 19.3789 16.0588 19.1301 17.1602 18.6571L20.9774 20.598C21.2091 20.7157 21.4889 20.6829 21.6869 20.5146C21.885 20.3463 21.9626 20.0755 21.8837 19.8278L20.6285 15.8873ZM11 12.2891C10.644 12.2891 10.3555 12.0005 10.3555 11.6445C10.3555 11.2886 10.644 11 11 11C11.356 11 11.6445 11.2886 11.6445 11.6445C11.6445 12.0005 11.356 12.2891 11 12.2891ZM13.5781 12.2891C13.2222 12.2891 12.9336 12.0005 12.9336 11.6445C12.9336 11.2886 13.2222 11 13.5781 11C13.9341 11 14.2227 11.2886 14.2227 11.6445C14.2227 12.0005 13.9341 12.2891 13.5781 12.2891ZM16.1562 12.2891C15.8003 12.2891 15.5117 12.0005 15.5117 11.6445C15.5117 11.2886 15.8003 11 16.1562 11C16.5122 11 16.8008 11.2886 16.8008 11.6445C16.8008 12.0005 16.5122 12.2891 16.1562 12.2891Z" fill="#ffffff"></path>
                                    </svg></span>', ['class' => 'thm-btn', 'name' => 'contact-button']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>

                            <div class="row d-flex justify-content-center pt-30 px-2">
                                <div class="clg-footer-newsletter bg-light rounded-3">
                                    <div class="">
                                        <div class="clg-footer_wrap ul_li">
                                            <div class="xb-item--email mt-20">
                                                <div class="xb-input-field pos-rel ps-2">
                                                    <input type="text" id="tracking-code-input" placeholder="Enter your tracking code">
                                                    <div class="xb-img">
                                                        <img src="<?= Yii::getAlias('@web') ?>/img/icon/email.svg" alt="">
                                                    </div>
                                                    <button class="xb-field-btn" type="button" id="check-status-btn"><img src="<?= Yii::getAlias('@web') ?>/img/icon/arrow01.png" alt=""></button>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="content">
                                            <b>&nbsp;&nbsp;&nbsp;Note: </b>Enter the code sent to you here and check the status of your request.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 mt-30">
                        <div class="gmap_canvas ps-lg-5">
                            <iframe src="https://yandex.uz/map-widget/v1/?ll=60.628008%2C41.560416&mode=whatshere&whatshere%5Bpoint%5D=60.628026%2C41.560438&whatshere%5Bzoom%5D=17&z=18"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-body p-0 m-0">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$checkStatusUrl = Url::to(['contact/check-status']);
$csrfParam = Yii::$app->request->csrfParam;
$csrfToken = Yii::$app->request->csrfToken;

$this->registerJs("
    document.addEventListener('DOMContentLoaded', function () {
        const checkStatusBtn = document.getElementById('check-status-btn');
        const trackingCodeInput = document.getElementById('tracking-code-input');
        const exampleModal = document.getElementById('exampleModal');

        if (checkStatusBtn && trackingCodeInput && exampleModal) {
            checkStatusBtn.addEventListener('click', function() {
                const code = trackingCodeInput.value.trim();

                if (code) {
                    const myModal = new bootstrap.Modal(exampleModal);
                    const modalBody = exampleModal.querySelector('.modal-body');

                    // Yuklanish animatsiyasini qo'shish va modalni ochish
                    if (modalBody) {
                        modalBody.innerHTML = '<div class=\"text-center py-5\"><div class=\"spinner-border text-primary\" role=\"status\"><span class=\"visually-hidden\">Loading...</span></div></div>';
                    }
                    myModal.show();

                    fetch('{$checkStatusUrl}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRF-Token': '{$csrfToken}'
                        },
                        body: 'code=' + encodeURIComponent(code) + '&{$csrfParam}={$csrfToken}'
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        if (modalBody) {
                            modalBody.innerHTML = data;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        if (modalBody) {
                            modalBody.innerHTML = '<div class=\"alert alert-danger\">An error occurred while checking the request.</div>';
                        }
                    });
                } else {
                    alert('Please enter a tracking code.');
                }
            });
        }
    });
", View::POS_END);
?>