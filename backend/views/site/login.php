<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
            <!--begin::Image-->
            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/logos/akhu-logo-dark.png" alt=""/>
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/logos/akhu-logo-dark.png" alt=""/>
            <!--end::Image-->

            <!--begin::Title-->
            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                Fast, Efficient and Productive
            </h1>
            <!--end::Title-->

            <!--begin::Text-->
            <div class="text-gray-600 fs-base text-center fw-semibold">
                akhu.uz
            </div>
            <!--end::Text-->
        </div>
        <!--end::Content-->
    </div>
    <!--begin::Aside-->

    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                    <!--begin::Form-->


                    <?php $form = ActiveForm::begin([
                        'id' => 'kt_sign_in_form',
                        'action' => ['site/login'],
                        'options' => [
                            'class' => 'form w-100',
                            'novalidate' => 'novalidate',
                            'data-kt-redirect-url' => Yii::$app->homeUrl,
                        ],
                    ]); ?>

                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <h1 class="text-dark fw-bolder mb-3">Tizimga kirish</h1>
                        <div class="text-gray-500 fw-semibold fs-6">Login va parolingizni kiriting</div>
                    </div>
                    <!--end::Heading-->

                    <!--begin::Username-->
                    <div class="fv-row mb-8">
                        <?= $form->field($model, 'username', [
                            'labelOptions' => ['class' => 'form-label fw-bold text-dark'],
                        ])->textInput([
                            'placeholder' => 'Foydalanuvchi nomi',
                            'class' => 'form-control bg-transparent',
                            'autocomplete' => 'off',
                        ]) ?>
                    </div>
                    <!--end::Username-->

                    <div class="fv-row mb-8">
                        <?= Html::label('Parol', 'password-input', ['class' => 'form-label fw-bold text-dark']) ?>
                        <div class="position-relative">
                            <?= Html::activeInput('password', $model, 'password', [
                                'id' => 'password-input',
                                'class' => 'form-control bg-transparent',
                                'placeholder' => 'Parol',
                                'autocomplete' => 'off',
                            ]) ?>
                            <button type="button" class="btn btn-icon position-absolute top-50 end-0 translate-middle-y me-3" id="toggle-password-btn">
                                <i id="toggle-password-icon" class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>


                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <?= Html::submitButton(
                            '<span class="indicator-label">Kirish</span>
        <span class="indicator-progress">Iltimos kuting...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>',
                            ['class' => 'btn btn-primary', 'id' => 'kt_sign_in_submit']
                        ) ?>
                    </div>
                    <!--end::Submit button-->

                    <?php ActiveForm::end(); ?>

                    <!--begin::JS for toggle-->

                    <?php
                    $js = <<<JS
document.getElementById('toggle-password-btn').addEventListener('click', function () {
    const passwordInput = document.getElementById('password-input');
    const icon = document.getElementById('toggle-password-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    }
});
JS;
                    $this->registerJs($js);
                    ?>



                </div>
                <!--end::Wrapper-->


                <!--end::Footer-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Body-->
</div>
<!--begin::Password toggle JS-->

<!--end::Password toggle JS-->
