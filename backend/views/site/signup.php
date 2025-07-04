<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = 'Sign Up';
?>


<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
            <!--begin::Image-->
            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/auth/agency.png" alt=""/>
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/auth/agency-dark.png" alt=""/>
            <!--end::Image-->

            <!--begin::Title-->
            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                Fast, Efficient and Productive
            </h1>
            <!--end::Title-->

            <!--begin::Text-->
            <div class="text-gray-600 fs-base text-center fw-semibold">
                In this kind of post, <a href="sign-up.html#" class="opacity-75-hover text-primary me-1">the blogger</a>
                introduces a person they’ve interviewed <br/> and provides some background information about

                <a href="sign-up.html#" class="opacity-75-hover text-primary me-1">the interviewee</a>
                and their <br/> work following this is a transcript of the interview.
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


                    <?php $form = ActiveForm::begin([
                        'id' => 'kt_sign_up_form',
                        'options' => [
                            'class' => 'form w-100',
                            'novalidate' => 'novalidate',
                            'data-kt-redirect-url' => Url::to(['/site/login'])
                        ],
                        'action' => ['site/signup'],
                    ]); ?>

                    <div class="text-center mb-11">
                        <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
                        <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                    </div>

                    <div class="row g-3 mb-9">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img alt="Logo" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />
                                Sign in with Google
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img alt="Logo" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3" />
                                <img alt="Logo" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3" />
                                Sign in with Apple
                            </a>
                        </div>
                    </div>

                    <div class="separator separator-content my-14">
                        <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                    </div>

                    <div class="fv-row mb-8">
                        <?= $form->field($model, 'username', [
                            'template' => "{input}\n{error}",
                        ])->textInput([
                            'class' => 'form-control bg-transparent',
                            'placeholder' => 'Username',
                            'autocomplete' => 'off',
                        ]) ?>
                    </div>

                    <div class="fv-row mb-8">
                        <?= $form->field($model, 'email')->textInput([
                            'placeholder' => 'Email',
                            'autocomplete' => 'off',
                            'class' => 'form-control bg-transparent'
                        ])->label(false) ?>
                    </div>

                    <div class="fv-row mb-8" data-kt-password-meter="true">
                        <div class="mb-1">
                            <div class="position-relative mb-3">
                                <?= $form->field($model, 'password')->passwordInput([
                                    'placeholder' => 'Password',
                                    'autocomplete' => 'off',
                                    'class' => 'form-control bg-transparent'
                                ])->label(false) ?>

                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                <i class="ki-outline ki-eye-slash fs-2"></i>
                <i class="ki-outline ki-eye fs-2 d-none"></i>
            </span>
                            </div>

                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
                        <div class="text-muted">
                            Use 8 or more characters with a mix of letters, numbers & symbols.
                        </div>
                    </div>

                    <div class="fv-row mb-8">
                        <?= $form->field($model, 'password_repeat')->passwordInput([
                            'placeholder' => 'Repeat Password',
                            'autocomplete' => 'off',
                            'class' => 'form-control bg-transparent'
                        ])->label(false) ?>
                    </div>


                    <div class="d-grid mb-10">
                        <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                            <span class="indicator-label">Sign up</span>
                            <span class="indicator-progress">
            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
                        </button>
                    </div>

                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Already have an Account?
                        <a href="<?= Url::to(['site/login']) ?>" class="link-primary fw-semibold">Sign in</a>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <!--end::Form-->

                </div>
                <!--end::Wrapper-->

                <!--begin::Footer-->
                <!--end::Footer-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Body-->
</div>


