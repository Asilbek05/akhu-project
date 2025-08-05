<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\models\Settings;use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);

$settings = Settings::find()->one();

$contacts = is_array($settings->contacts) ? $settings->contacts : [];
$socials = is_array($settings->socials) ? $settings->socials : [];
$location = $settings->location ?? 'Location not set';

?>

<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="zxx">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="shortcut icon" href="<?= Yii::getAlias('@web/img/logo/logo-dark.png') ?>" type="images/x-icon"/>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="xb-backtotop">
        <a href="##" class="scroll">
            <i class="far fa-arrow-up"></i>
        </a>
    </div>
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="<?= Yii::getAlias('@web/img/logo/logo-dark.png') ?>" alt="preloader"></div>
            </div>
        </div>
    </div>
    <div class="body_wrap">
        <header id="xb-header-area" class="header-area is-sticky">
            <div class="header-top_wrap">
                <div class="container">
                    <div class="header-top ul_li_between">
                        <div class="xb-help_desk">
                            <?php if(isset($contacts['email'])): ?>
                            <p><i class="fa-solid fa-envelope icon-sky"></i> <a class="text-light text-lowercase" href="mailto: <?= $contacts['email'] ?> "><?= $contacts['email'] ?></a></p>
                            <?php endif; ?>
                            <p></p>
                            <?php if(isset($contacts['phone'])): ?>
                            <p><i class="fa-solid fa-phone icon-sky"></i> <a class="text-light" href="tel: <?= $contacts['phone'] ?>"> <?= $contacts['phone'] ?> </a></p>
                            <?php endif; ?>
                        </div>
                        <div class="xb-info">
                            <ul class="ul_li align-items-end">
                                <li><a href="#">APPLY NOW</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xb-header">
                <div class="container">
                    <div class="header__wrap ul_li_between">
                        <div class="header-logo">
                            <a href="#"><img src="<?= Yii::getAlias('@web/img/logo/logo-dark.png') ?>" alt="" width="85"></a>
                        </div>
                        <div class="main-menu__wrap ul_li navbar navbar-expand-lg">
                            <nav class="main-menu collapse navbar-collapse">
                                <ul>
                                    <li class="menu-item-has-children">
                                        <a href="#">About</a>
                                        <ul class="submenu">
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Vision & Mision</a></li>
                                            <li><a href="#">Presidential Decree</a></li>
                                            <li><a href="#">Leadership</a></li>
                                            <li><a href="#">Governance & Partners</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Programs</a>
                                        <ul class="submenu">
                                            <li><a href="#">Undergraduate</a></li>
                                            <li><a href="#">Specialized STEM School</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Admissions</a>
                                        <ul class="submenu">
                                            <li><a href="#">Admission Overview</a></li>
                                            <li><a href="#">Tuition Fees & Scholarships</a></li>
                                            <li><a href="#">Calculator</a></li>
                                            <li><a href="#">Apply Now</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Campus</a>
                                        <ul class="submenu">
                                            <li><a href="#">Location & Facilities</a></li>
                                            <li><a href="#">Student Life</a></li>
                                            <li><a href="#">Future Campus Plan</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="admission.html">News & Events</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact us</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="xb-header-wrap">
                                <div class="xb-header-menu">
                                    <div class="xb-header-menu-scroll">
                                        <div class="xb-menu-close xb-hide-xl xb-close"></div>
                                        <div class="xb-logo-mobile xb-hide-xl">
                                            <a href="#" rel="home"><img src="<?= Yii::getAlias('@web/img/logo/logo-dark.png') ?>" alt=""></a></div>
                                        <div class="xb-header-mobile-search xb-hide-xl">
                                            <form role="search" action="##">
                                                <input type="text" placeholder="Search..." name="s" class="search-field">
                                                <button class="search-submit" type="submit"><i class="far fa-search"></i></button>
                                            </form>
                                        </div>
                                        <nav class="xb-header-nav">
                                            <ul class="xb-menu-primary clearfix">
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">About</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">About Us</a></li>
                                                        <li><a href="#">Vision & Mision</a></li>
                                                        <li><a href="#">Presidential Decree</a></li>
                                                        <li><a href="#">Leadership</a></li>
                                                        <li><a href="#">Governance & Partners</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Programs</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">Undergraduate</a></li>
                                                        <li><a href="#">Specialized STEM School</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Admissions</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">Admission Overview</a></li>
                                                        <li><a href="#">Tuition Fees & Scholarships</a></li>
                                                        <li><a href="#">Calculator</a></li>
                                                        <li><a href="#">Apply Now</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children">
                                                    <a href="#">Campus</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">Location & Facilities</a></li>
                                                        <li><a href="#">Student Life</a></li>
                                                        <li><a href="#">Future Campus Plan</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">News & Events</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="#">Contact us</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="xb-header-menu-backdrop"></div>
                            </div>
                        </div>
                        <div class="header-right ul_li">
                            <a class="header-search header-search-btn" href="javascript:void(0);">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 3.75H15" stroke="#170006" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.5 6H12.75" stroke="#170006" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.75 8.625C15.75 12.5625 12.5625 15.75 8.625 15.75C4.6875 15.75 1.5 12.5625 1.5 8.625C1.5 4.6875 4.6875 1.5 8.625 1.5" stroke="#170006" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.5 16.5L15 15" stroke="#170006" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <div class="language_dropdown dropdown">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="flag">
                                    <img src="<?= Yii::getAlias('@web/img/icon/flag_usa.webp') ?>" alt="USA">
                                </span>
                                    <span class="name">En</span>
                                </button>
                                <div class="dropdown-menu">
                                    <ul class="unordered_list_block">
                                        <li class="dropdown-item">
                                        <span class="flag">
                                            <img src="<?= Yii::getAlias('@web/img/icon/ru.webp') ?>" alt="Rusia">
                                        </span>
                                            <span class="name">Ru</span>
                                        </li>
                                        <li class="dropdown-item">
                                        <span class="flag">
                                            <img src="<?= Yii::getAlias('@web/img/icon/uz.png') ?>" alt="Uzbekistan">
                                        </span>
                                            <span class="name">Uz</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="header-bar-mobile side-menu d-lg-none">
                            <a class="xb-nav-mobile" href="javascript:void(0);"><i class="fal fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header-search-form-wrapper">
            <div class="xb-search-close xb-close"></div>
            <div class="header-search-container">
                <form role="search" class="search-form" action="##">
                    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                    <button type="submit" class="search-submit"><i class="far fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="body-overlay"></div>

        <?= $content ?>

        <footer class="footer clg-footer bg_img pos-rel footer-bg-main">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-11 text-center">
                        <div class="clg-footer-cta">
                            <ul class="xb-contact ul_li list-unstyled">
                                <?php if (isset($contacts['phone'])): ?>
                                    <li>
                                        <span class="mr-10"><i class="fa-solid fa-phone fs-5 icon-sky"></i></span>
                                        <a class="text-dark" href="tel:<?= $contacts['phone'] ?>"><?= $contacts['phone'] ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (isset($contacts['email'])): ?>
                                    <li>
                                        <span class="mr-10"><i class="fa-solid fa-envelope fs-5 icon-sky"></i></span>
                                        <a class="text-dark" href="mailto:<?= $contacts['email'] ?>"><?= $contacts['email'] ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center pb-60">
                    <img src="<?= Yii::getAlias('@web/img/logo/logo-light.png') ?>" alt="" width="150px" class="w-10">
                </div>
                <div class="clg-footer-main">
                    <div class="clg-footer_widget mb-70">
                        <ul class="xb-links list-unstyled ul_li_between">
                            <li><a href="#">How to apply</a></li>
                            <li><a href="#">Admission</a></li>
                            <li><a href="#">Scholarships</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Student life</a></li>
                            <li><a href="#">News & Events</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="clg-footer-newsletter">
                <div class="container">
                    <div class="row clg-footer_wrap ul_li">
                        <div class="col-lg-4 xb-item--details mt-20">
                            <span class="text-light">Social media</span>
                            <ul class="xb-item--social_link ul_li mt-15">
                                <?php if (is_array($socials)): ?>
                                    <?php foreach ($socials as $platform => $link): ?>
                                        <li><a href="<?= $link ?>"><i class="fab fa-<?= $platform ?>"></i></a></li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="col-lg-4 xb-item--email mt-20">
                            <div class="xb-input-field pos-rel">
                                <?php if (isset($contacts['email'])): ?>
                                    <p><i class="fa-solid fa-envelope icon-sky"></i> <a class="text-light text-lowercase" href="mailto:<?= $contacts['email'] ?>"><?= $contacts['email'] ?></a></p>
                                <?php endif; ?>
                                <?php if (isset($contacts['phone'])): ?>
                                    <p><i class="fa-solid fa-phone icon-sky"></i> <a class="text-light" href="tel:<?= $contacts['phone'] ?>"><?= $contacts['phone'] ?></a></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4 xb-item--meta mt-20">
                            <p class="w-100"><i class="fa-solid fa-location-dot icon-sky"></i> <a class="text-light" href="#"><?= $location ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-35 pb-35">
                <div class="copyright text-center">
                    <p>Copyright © 2025 <a href="#">Al-Khwarizmi University</a>. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>