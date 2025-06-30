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
                        'action' => ['site/login'], // yoki o'zingiz xohlagan route
                        'options' => [
                            'class' => 'form w-100',
                            'novalidate' => 'novalidate',
                            'data-kt-redirect-url' => '/metronic8/demo39/../demo39/index.html'
                        ],
                    ]); ?>

                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                        <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                    </div>
                    <!--end::Heading-->

                    <!--begin::Login options-->
                    <div class="row g-3 mb-9">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img alt="Logo" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3"/>
                                Sign in with Google
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                <img alt="Logo" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3"/>
                                <img alt="Logo" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3"/>
                                Sign in with Apple
                            </a>
                        </div>
                    </div>
                    <!--end::Login options-->

                    <div class="separator separator-content my-14">
                        <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                    </div>

                    <!--begin::Name-->

                    <div class="fv-row mb-8">
                        <?= $form->field($model, 'username')->textInput([
                            'placeholder' => 'Username',
                            'class' => 'form-control bg-transparent',
                            'autocomplete' => 'off',
                        ])->label(false) ?>
                    </div>

                    <div class="fv-row mb-3">
                        <?= $form->field($model, 'password')->passwordInput([
                            'placeholder' => 'Password',
                            'class' => 'form-control bg-transparent',
                            'autocomplete' => 'off',
                        ])->label(false) ?>
                    </div>

                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <?= Html::a('Forgot Password ?', ['site/request-password-reset'], ['class' => 'link-primary']) ?>
                    </div>

                    <div class="d-grid mb-10">
                        <?= Html::submitButton(
                            '<span class="indicator-label">Sign In</span>
         <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>',
                            ['class' => 'btn btn-primary', 'id' => 'kt_sign_in_submit']
                        ) ?>
                    </div>

                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Not a Member yet?
                        <?= Html::a('Sign up', ['site/signup'], ['class' => 'link-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>


                </div>
                <!--end::Wrapper-->

                <!--begin::Footer-->
                <div class=" d-flex flex-stack">
                    <!--begin::Languages-->
                    <div class="me-10">
                        <!--begin::Toggle-->
                        <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                            <img  data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/flags/united-states.svg" alt=""/>

                            <span data-kt-element="current-lang-name" class="me-1">English</span>

                            <i class="ki-outline ki-down fs-5 text-muted rotate-180 m-0"></i>                        </button>
                        <!--end::Toggle-->

                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="sign-in.html#" class="menu-link d-flex px-5" data-kt-lang="English">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/flags/united-states.svg" alt=""/>
                                        </span>
                                    <span data-kt-element="lang-name">English</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="sign-in.html#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/flags/spain.svg" alt=""/>
                                        </span>
                                    <span data-kt-element="lang-name">Spanish</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="sign-in.html#" class="menu-link d-flex px-5" data-kt-lang="German">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/flags/germany.svg" alt=""/>
                                        </span>
                                    <span data-kt-element="lang-name">German</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="sign-in.html#" class="menu-link d-flex px-5" data-kt-lang="Japanese">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/flags/japan.svg" alt=""/>
                                        </span>
                                    <span data-kt-element="lang-name">Japanese</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="sign-in.html#" class="menu-link d-flex px-5" data-kt-lang="French">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/flags/france.svg" alt=""/>
                                        </span>
                                    <span data-kt-element="lang-name">French</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Languages-->

                    <!--begin::Links-->
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a href="../../../pages/team.html" target="_blank">Terms</a>

                        <a href="../../../pages/pricing/column.html" target="_blank">Plans</a>

                        <a href="../../../pages/contact.html" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Body-->
</div>
