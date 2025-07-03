<?php
/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
AppAsset::register($this);


use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->beginPage();
?>
    <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web') ?>/metronic/assets/media/logos/favicon.ico"/>

    <!-- Google Tag Manager (optional) -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5FS8GGP');
    </script>

    <!-- Frame busting (security) -->
    <script>
        if (window.top !== window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<body  id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true" data-kt-app-aside-push-footer="true"  class="app-default" >
<!--begin::Theme mode setup on page load-->
<?php $this->beginBody() ?>
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">


        <!--begin::Header-->
        <div id="kt_app_header" class="app-header  d-flex flex-column flex-stack "

        >

            <!--begin::Header main-->
            <div class="d-flex flex-stack flex-grow-1">

                <div class="app-header-logo d-flex align-items-center ps-lg-12" id="kt_app_header_logo">
                    <!--begin::Sidebar toggle-->
                    <div
                            id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-sm btn-icon bg-body btn-color-gray-500 btn-active-color-primary w-30px h-30px ms-n2 me-4 d-none d-lg-flex "
                            data-kt-toggle="true"
                            data-kt-toggle-state="active"
                            data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize"
                    >

                        <i class="ki-outline ki-abstract-14 fs-3 mt-1"></i>        </div>
                    <!--end::Sidebar toggle-->

                    <!--begin::Sidebar mobile toggle-->
                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
                        <i class="ki-outline ki-abstract-14 fs-2"></i>	</div>
                    <!--end::Sidebar mobile toggle-->

                    <a href="<?= Yii::$app->homeUrl ?>" class="app-sidebar-logo">
                        <img alt="Logo" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/logos/demo39.svg" class="h-25px theme-light-show"/>
                        <img alt="Logo" src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/logos/demo39-dark.svg" class="h-25px theme-dark-show"/>
                    </a>

                </div>

                <!--begin::Navbar-->
                <div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
                    <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1">

                        <!--begin::Search-->
                        <div
                                id="kt_header_search"
                                class="header-search d-flex align-items-center w-lg-350px"

                                data-kt-search-keypress="true"
                                data-kt-search-min-length="2"
                                data-kt-search-enter="enter"
                                data-kt-search-layout="menu"
                                data-kt-search-responsive="true"

                                data-kt-menu-trigger="auto"
                                data-kt-menu-permanent="true"
                                data-kt-menu-placement="bottom-start"


                        >

                            <!--begin::Tablet and mobile search toggle-->
                            <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                                <div class="d-flex ">
                                    <i class="ki-outline ki-magnifier fs-1 fs-1"></i>                            </div>
                            </div>
                            <!--end::Tablet and mobile search toggle-->

                            <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
                            <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                                <!--begin::Hidden input(Added to disable form autocomplete)-->
                                <input type="hidden"/>
                                <!--end::Hidden input-->

                                <!--begin::Icon-->
                                <i class="ki-outline ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i>    <!--end::Icon-->

                                <!--begin::Input-->
                                <input type="text" class="search-input form-control form-control border-0 h-lg-45px  ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input"/>
                                <!--end::Input-->

                                <!--begin::Spinner-->
                                <span class="search-spinner  position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
        <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
    </span>
                                <!--end::Spinner-->

                                <!--begin::Reset-->
                                <span class="search-reset  btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
        <i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>    </span>
                                <!--end::Reset-->
                            </form>
                            <!--end::Form-->
                            <!--begin::Menu-->
                            <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown py-7 px-7 overflow-hidden w-300px w-md-350px">
                                <!--begin::Wrapper-->
                                <div data-kt-search-element="wrapper">
                                    <!--begin::Recently viewed-->

                                <!--begin::Empty-->
                                <div data-kt-search-element="empty" class="text-center d-none">
                                    <!--begin::Icon-->
                                    <div class="pt-10 pb-10">
                                        <i class="ki-outline ki-search-list fs-4x opacity-50"></i>    </div>
                                    <!--end::Icon-->

                                    <!--begin::Message-->
                                    <div class="pb-15 fw-semibold">
                                        <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                                        <div class="text-muted fs-7">Please try again with a different query</div>
                                    </div>
                                    <!--end::Message-->
                                </div>
                                <!--end::Empty-->        </div>
                            <!--end::Wrapper-->

                            <!--begin::Preferences-->
                            <form data-kt-search-element="preferences" class="pt-1 d-none">
                                <!--begin::Heading-->
                                <h3 class="fw-semibold text-dark mb-7">Search Preferences</h3>
                                <!--end::Heading-->

                                <!--begin::Input group-->
                                <div class="pb-4 border-bottom">
                                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                Projects
            </span>

                                        <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                                    </label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="py-4 border-bottom">
                                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                Targets
            </span>
                                        <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                                    </label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="py-4 border-bottom">
                                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                Affiliate Programs
            </span>
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="py-4 border-bottom">
                                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                Referrals
            </span>
                                        <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                                    </label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="py-4 border-bottom">
                                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                Users
            </span>
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </label>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end pt-7">
                                    <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="preferences-dismiss">Cancel</button>
                                    <button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Preferences-->    </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Search-->    </div>

                <!--begin::Notifications-->

                <!--begin::Quick links-->

                <!--begin::Chat-->
                <div class="app-navbar-item ms-2 ms-lg-6">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px position-relative" id="kt_drawer_chat_toggle">
                        <i class="ki-outline ki-notification-on fs-1"></i>            <span class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-danger w-15px h-15px ms-n4 mt-3">5</span>
                    </div>
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Chat-->

                <!--begin::User menu-->
                <div class="app-navbar-item ms-2 ms-lg-6" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-lg-45px"
                         data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                         data-kt-menu-attach="parent"
                         data-kt-menu-placement="bottom-end">
                        <img src="https://preview.keenthemes.com/metronic8/demo39/assets/media/avatars/300-2.jpg" alt="user"/>
                    </div>

                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="https://preview.keenthemes.com/metronic8/demo39/assets/media/avatars/300-2.jpg"/>
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        Max Smith                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                    </div>

                                    <a href="index.html#" class="fw-semibold text-muted text-hover-primary fs-7">
                                        max@kt.com                </a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="<?= \yii\helpers\Url::to(['/profile/change-password']) ?>" class="menu-link px-5">
                                Change Password
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-10">
                            <?= \yii\helpers\Html::beginForm(['/site/logout'], 'post') ?>
                            <?= \yii\helpers\Html::submitButton(
                                'Sign Out',
                                ['class' => 'menu-link px-5 btn btn-link logout text-decoration-none',]
                            ) ?>
                            <?= \yii\helpers\Html::endForm() ?>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="index.html#" class="menu-link px-5">
                <span class="menu-title position-relative">
                    Mode

                    <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                        <i class="ki-outline ki-night-day theme-light-show fs-2"></i>                        <i class="ki-outline ki-moon theme-dark-show fs-2"></i>                    </span>
                </span>
                            </a>

                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="index.html#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
            <span class="menu-icon" data-kt-element="icon">
                <i class="ki-outline ki-night-day fs-2"></i>            </span>
                                        <span class="menu-title">
                Light
            </span>
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="index.html#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
            <span class="menu-icon" data-kt-element="icon">
                <i class="ki-outline ki-moon fs-2"></i>            </span>
                                        <span class="menu-title">
                Dark
            </span>
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="index.html#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
            <span class="menu-icon" data-kt-element="icon">
                <i class="ki-outline ki-screen fs-2"></i>            </span>
                                        <span class="menu-title">
                System
            </span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->

                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->

                <!--begin::Action-->
                <div class="app-navbar-item ms-2 ms-lg-6 me-lg-6">

                    <!--begin::Logout button-->
                    <?= \yii\helpers\Html::beginForm(['/site/logout'], 'post', ['style' => 'display:inline']) ?>
                    <?= \yii\helpers\Html::submitButton(
                        '<i class="ki-outline ki-exit-right fs-1"></i>',
                        [
                            'class' => 'btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px',
                            'title' => 'Logout',
                            'data-toggle' => 'tooltip',
                        ]
                    ) ?>
                    <?= \yii\helpers\Html::endForm() ?>
                    <!--end::Logout button-->

                </div>
                <!--end::Action-->

                <!--begin::Header menu toggle-->
                <div class="app-navbar-item ms-2 ms-lg-6 ms-n2 me-3 d-flex d-lg-none">
                    <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" id="kt_app_aside_mobile_toggle">
                        <i class="ki-outline ki-burger-menu-2 fs-2"></i>            </div>
                </div>
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar--></div>
        <!--end::Header main-->

        <!--begin::Separator-->
        <div class="app-header-separator"></div>
        <!--end::Separator-->            </div>
    <!--end::Header-->
    <!--begin::Wrapper-->
    <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

        <!--begin::Sidebar-->
        <div id="kt_app_sidebar" class="app-sidebar  flex-column "
             data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
        >
            <!--begin::Wrapper-->
            <div
                    id="kt_app_sidebar_wrapper"
                    class="app-sidebar-wrapper">

                <div
                        class="hover-scroll-y my-5 my-lg-2 mx-4"
                        data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_app_header"
                        data-kt-scroll-wrappers="#kt_app_sidebar_wrapper"
                        data-kt-scroll-offset="5px">

                    <!--begin::Sidebar menu-->
                    <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
                         class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-3 mb-5">

                        <?php
                            $isNewsActive = Yii::$app->controller->id === 'slider';
                        ?>

                        <div class="menu-item <?= $isNewsActive ? 'here show' : '' ?>">
                            <a href="<?= \yii\helpers\Url::to(['/slider/index']) ?>" class="menu-link <?= $isNewsActive ? 'active' : '' ?>">
        <span class="menu-icon">
            <i class="ki-outline ki-notepad fs-2"></i>
        </span>
                                <span class="menu-title">Slider</span>
                            </a>
                        </div>

                        <?php
                            $isNewsActive = Yii::$app->controller->id === 'posts';
                        ?>
                        <div class="menu-item <?= $isNewsActive ? 'here show' : '' ?>">
                            <a href="<?= \yii\helpers\Url::to(['/posts/index']) ?>" class="menu-link <?= $isNewsActive ? 'active' : '' ?>">
        <span class="menu-icon">
            <i class="ki-outline ki-home-2 fs-2"></i>
        </span>
                                <span class="menu-title">News</span>
                            </a>
                        </div>

                        <?php
                        $controller = Yii::$app->controller->id;
                        $isEventMenuActive = in_array($controller, ['events', 'event-schedule']);
                        ?>

                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?= $isEventMenuActive ? 'here show' : '' ?>">
                            <!--begin:Menu link-->
                            <span class="menu-link">
        <span class="menu-icon">
            <i class="ki-outline ki-calendar fs-2"></i>
        </span>
        <span class="menu-title">Events</span>
        <span class="menu-arrow"></span>
    </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!-- Event -->
                                <div class="menu-item">
                                    <a href="<?= \yii\helpers\Url::to(['/events/index']) ?>"
                                       class="menu-link <?= $controller === 'events' ? 'active' : '' ?>">
                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                        <span class="menu-title">Event</span>
                                    </a>
                                </div>

                                <!-- Event Schedules -->
                                <div class="menu-item">
                                    <a href="<?= \yii\helpers\Url::to(['/event-schedule/index']) ?>"
                                       class="menu-link <?= $controller === 'event-schedule' ? 'active' : '' ?>">
                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                        <span class="menu-title">Event Schedules</span>
                                    </a>
                                </div>
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->

                        <?php
                        $controller = Yii::$app->controller->id;
                        $isLeadershipMenuActive = in_array($controller, ['leadership', 'leadership-sections']);
                        ?>

                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?= $isLeadershipMenuActive ? 'here show' : '' ?>">
                            <!--begin:Menu link-->
                            <span class="menu-link">
        <span class="menu-icon">
            <i class="ki-outline ki-user-square fs-2"></i> <!-- People Icon -->
        </span>
        <span class="menu-title">Leadership</span>
        <span class="menu-arrow"></span>
    </span>
                            <!--end:Menu link-->

                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!-- Leadership -->
                                <div class="menu-item">
                                    <a href="<?= \yii\helpers\Url::to(['/leadership/index']) ?>"
                                       class="menu-link <?= $controller === 'leadership' ? 'active' : '' ?>">
                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                        <span class="menu-title">Leadership</span>
                                    </a>
                                </div>

                                <!-- Leadership Sections -->
                                <div class="menu-item">
                                    <a href="<?= \yii\helpers\Url::to(['/leadership-sections/index']) ?>"
                                       class="menu-link <?= $controller === 'leadership-sections' ? 'active' : '' ?>">
                                        <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                        <span class="menu-title">Leadership Sections</span>
                                    </a>
                                </div>
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                        <?php
                        $isSettingsActive = Yii::$app->controller->id === 'settings';
                        ?>

                        <div class="menu-item <?= $isSettingsActive ? 'here show' : '' ?>">
                            <a href="<?= \yii\helpers\Url::to(['/settings/index']) ?>" class="menu-link <?= $isSettingsActive ? 'active' : '' ?>">
        <span class="menu-icon">
            <i class="ki-outline ki-setting-3 fs-2"></i>
        </span>
                                <span class="menu-title">Settings</span>
                            </a>
                        </div>
                        <?php
                            $isAppRequestsActive = Yii::$app->controller->id === 'application-requests';
                        ?>

                        <div class="menu-item <?= $isAppRequestsActive ? 'here show' : '' ?>">
                            <a href="<?= \yii\helpers\Url::to(['/application-requests/index']) ?>" class="menu-link <?= $isAppRequestsActive ? 'active' : '' ?>">
        <span class="menu-icon">
            <i class="ki-outline ki-archive-tick fs-2"></i>
        </span>
                                <span class="menu-title">Application Requests</span>
                            </a>
                        </div>

                        <?php
                        $isUserActive = Yii::$app->controller->id === 'user';
                        ?>

                        <div class="menu-item <?= $isUserActive ? 'here show' : '' ?>">
                            <a href="<?= \yii\helpers\Url::to(['/user/index']) ?>" class="menu-link <?= $isUserActive ? 'active' : '' ?>">
        <span class="menu-icon">
            <i class="ki-outline ki-user fs-2"></i>
        </span>
                                <span class="menu-title">Users</span>
                            </a>
                        </div>

                        <!--end:Menu item--><!--begin:Menu item--><!--end:Menu item--></div>
                    <!--end::Sidebar menu-->


                    <!--begin::Teames-->

                    	</div>
            </div>
            <!--end::Wrapper-->    </div>
        <!--end::Sidebar-->


        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">


                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div class="container-xxl">
                        <?php
                        use kartik\growl\Growl;
                        if (!empty(Yii::$app->session->getAllFlashes())){
                            foreach (Yii::$app->session->getAllFlashes() as $type => $message) {
                                echo Growl::widget([
                                    'type' => $type,
                                    'title' => strtoupper($type),
                                    'icon' => 'bi bi-info-circle',
                                    'body' => $message,
                                    'showSeparator' => true,
                                    'delay' => 0,
                                    'pluginOptions' => [
                                        'allow_dismiss' => false,
                                        'showProgressbar' => true,
                                        'delay' => 4000,
                                        'placement' => [
                                            'from' => 'bottom',
                                            'align' => 'right',
                                        ]
                                    ]
                                ]);
                            }
                        }

                        ?>
                        <?= $content ?>
                    </div>
                </div>
            </div>
            <!--end::Content wrapper-->


            <!--begin::Footer-->
            <div id="kt_app_footer" class="app-footer " >
                <!--begin::Footer container-->
                <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1">2025&copy;</span>
                        <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
                    </div>
                    <!--end::Copyright-->

                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item"><a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a></li>

                        <li class="menu-item"><a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a></li>

                        <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a></li>
                    </ul>
                    <!--end::Menu-->        </div>
                <!--end::Footer container-->
            </div>
            <!--end::Footer-->                            </div>
        <!--end:::Main-->


        <!--begin::aside-->
        <div id="kt_app_aside" class="app-aside  flex-column "
             data-kt-drawer="true" data-kt-drawer-name="app-aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_aside_mobile_toggle"
        >

          </div>
        <!--end::aside-->

    </div>
    <!--end::Wrapper-->


</div>
<!--    --><?php
//    $this->registerJsFile('@web/metronic/assets/plugins/global/plugins.bundle.js', [
//        'depends' => [\yii\web\JqueryAsset::class],
//        'position' => \yii\web\View::POS_END,
//    ]);
//
//    $this->registerJsFile('@web/metronic/assets/js/scripts.bundle.js', [
//        'depends' => [\yii\web\JqueryAsset::class],
//        'position' => \yii\web\View::POS_END,
//    ]);
//
//    // Yii gridview ishlashi uchun
//    $this->registerJsFile('@web/assets/' . Yii::$app->assetManager->getBundle('yii\\grid\\GridViewAsset')->sourcePath . '/yii.gridView.js', [
//        'depends' => [\yii\web\JqueryAsset::class],
//        'position' => \yii\web\View::POS_END,
//    ]);
//    $controller = Yii::$app->controller->id;
//    if ($controller === 'events') {
//        $this->registerJsFile('@web/metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js', [
//            'depends' => [\yii\web\JqueryAsset::class],
//            'position' => \yii\web\View::POS_END,
//        ]);
//    }
//    if ($controller === 'dashboard') {
//        $this->registerJsFile('@web/metronic/assets/js/widgets.bundle.js', ['position' => \yii\web\View::POS_END]);
//        $this->registerJsFile('https://cdn.amcharts.com/lib/5/index.js', ['position' => \yii\web\View::POS_END]);
//    }
//    ?>

    <?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>


