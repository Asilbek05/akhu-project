<?php

/* @var $this yii\web\View */
/* @var $slider common\models\Slider */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
$this->title = 'Al-Khwarizmi University';

$name = $slider ? $slider->name : 'Next Generation <br> Engineers & Innovators';
$description = $slider ? $slider->description : 'Default Description for the section.';

$firstPost = array_shift($latestPosts);

$leftPosts = array_slice($latestPosts, 0, 2);
$rightPosts = array_slice($latestPosts, 2, 3);
?>

<main>
    <section class="hero o-hidden pos-rel">
        <div class="bg_img" data-background="<?= Yii::getAlias('@web/img/bg/header-bg-3.png') ?>">
            <div class="container">
                <div class="hero__content-wrap text-center pt-55">
                    <div class="section-title clr-white">
                        <span class="sub-title wow fadeInUp" data-wow-delay="0ms" data-wow-duration=".6s"><?= $name ?></span>
                        <h1 class="title wow fadeInUp" data-wow-delay="150ms" data-wow-duration=".6s">
                            <?= $description ?>
                        </h1>
                    </div>
                    <div class="xb-hero-img">
                        <img src="<?= Yii::getAlias('@web/img/hero/header-students.png') ?>" alt="" width="55%">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="hero-btns">
        <div class="btns ul_li_center">
            <a class="thm-btn thm-btn--stroke-white sec-btn" href="#">explore programs
                <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 4.84999V16.74C22 17.71 21.21 18.6 20.24 18.72L19.93 18.76C18.29 18.98 15.98 19.66 14.12 20.44C13.47 20.71 12.75 20.22 12.75 19.51V5.59999C12.75 5.22999 12.96 4.88999 13.29 4.70999C15.12 3.71999 17.89 2.83999 19.77 2.67999H19.83C21.03 2.67999 22 3.64999 22 4.84999Z" fill="white" />
                    <path d="M10.71 4.70999C8.87999 3.71999 6.10999 2.83999 4.22999 2.67999H4.15999C2.95999 2.67999 1.98999 3.64999 1.98999 4.84999V16.74C1.98999 17.71 2.77999 18.6 3.74999 18.72L4.05999 18.76C5.69999 18.98 8.00999 19.66 9.86999 20.44C10.52 20.71 11.24 20.22 11.24 19.51V5.59999C11.24 5.21999 11.04 4.88999 10.71 4.70999ZM4.99999 7.73999H7.24999C7.65999 7.73999 7.99999 8.07999 7.99999 8.48999C7.99999 8.90999 7.65999 9.23999 7.24999 9.23999H4.99999C4.58999 9.23999 4.24999 8.90999 4.24999 8.48999C4.24999 8.07999 4.58999 7.73999 4.99999 7.73999ZM7.99999 12.24H4.99999C4.58999 12.24 4.24999 11.91 4.24999 11.49C4.24999 11.08 4.58999 10.74 4.99999 10.74H7.99999C8.40999 10.74 8.74999 11.08 8.74999 11.49C8.74999 11.91 8.40999 12.24 7.99999 12.24Z" fill="white" />
                  </svg></span>
            </a>
            <a class="thm-btn thm-btn--stroke-white sec-btn" href="#">apply now
                <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.25 19.492V20.75C16.25 21.164 15.914 21.5 15.5 21.5C15.086 21.5 14.75 21.164 14.75 20.75V19.5H16C16.084 19.5 16.167 19.497 16.25 19.492Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.75 19.5H8C5.929 19.5 4.25 17.821 4.25 15.75V12.668L9.964 15.825C11.202 16.509 12.798 16.509 14.036 15.825L14.75 15.431V19.5ZM16.25 14.602L19.75 12.668V15.75C19.75 17.737 18.205 19.363 16.25 19.492V14.602Z" fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.75 14.288L13.552 14.95C12.608 15.472 11.392 15.472 10.448 14.95L2.134 10.356C1.568 10.043 1.25 9.49499 1.25 8.92199C1.25 8.34799 1.568 7.79999 2.134 7.48799L10.448 2.89299C11.392 2.37199 12.608 2.37199 13.552 2.89299L21.866 7.48799C22.432 7.79999 22.75 8.34799 22.75 8.92199C22.75 9.49499 22.432 10.043 21.866 10.356L16.25 13.459V12.75C16.25 12.551 16.171 12.36 16.03 12.22L12.53 8.71999C12.238 8.42699 11.762 8.42699 11.47 8.71999C11.177 9.01199 11.177 9.48799 11.47 9.77999L14.75 13.061V14.288Z" fill="white" />
                  </svg></span>
            </a>
            <a class="thm-btn thm-btn--stroke-white sec-btn" href="#">talk with a Constructor
                <span><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.0364 2.63798C11.6702 1.79536 10.0512 1.33203 8.37891 1.33203C3.82654 1.33203 0 4.72368 0 9.06641C0 10.589 0.473 12.0486 1.37148 13.3092L0.116359 17.2497C-0.0162422 17.6659 0.295539 18.0898 0.730598 18.0898C0.83007 18.0898 0.930188 18.0669 1.02257 18.0198L4.83957 16.0791C4.99413 16.1456 5.15062 16.2076 5.3087 16.265C4.42496 14.8857 3.95312 13.3023 3.95312 11.6445C3.95312 6.70755 8.10726 2.91208 13.0364 2.63798Z" fill="white" />
                    <path d="M20.6285 15.8873C21.527 14.6267 22 13.1671 22 11.6445C22 7.30022 18.1718 3.91016 13.6211 3.91016C9.06873 3.91016 5.24219 7.30181 5.24219 11.6445C5.24219 15.9888 9.07036 19.3789 13.6211 19.3789C14.8421 19.3789 16.0588 19.1301 17.1602 18.6571L20.9774 20.598C21.2091 20.7158 21.4889 20.6829 21.6869 20.5146C21.885 20.3463 21.9626 20.0755 21.8837 19.8278L20.6285 15.8873ZM11 12.2891C10.644 12.2891 10.3555 12.0005 10.3555 11.6445C10.3555 11.2886 10.644 11 11 11C11.356 11 11.6445 11.2886 11.6445 11.6445C11.6445 12.0005 11.356 12.2891 11 12.2891ZM13.5781 12.2891C13.2222 12.2891 12.9336 12.0005 12.9336 11.6445C12.9336 11.2886 13.2222 11 13.5781 11C13.9341 11 14.2227 11.2886 14.2227 11.6445C14.2227 12.0005 13.9341 12.2891 13.5781 12.2891ZM16.1562 12.2891C15.8003 12.2891 15.5117 12.0005 15.5117 11.6445C15.5117 11.2886 15.8003 11 16.1562 11C16.5122 11 16.8008 11.2886 16.8008 11.6445C16.8008 12.0005 16.5122 12.2891 16.1562 12.2891Z" fill="white" />
                  </svg></span>
            </a>
        </div>
    </div>

    <section class="about pb-120 pos-rel">
        <div class="container">
            <div class="section-title about-sec-title mb-60 pt-115 wow fadeInUp" data-wow-delay="0ms" data-wow-duration=".6s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0ms; animation-name: fadeInUp;">
                <h1 class="title">Brief on Presidential Decree No. ПП-160 and the university’s mission to lead Uzbekistan’s digital transformation.</h1>
            </div>
            <div class="row align-items-center mt-none-30">
                <div class="col-lg-6 mt-30">
                    <div class="xb-about_left wow fadeInLeft" data-wow-delay="100ms" data-wow-duration=".6s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 100ms; animation-name: fadeInLeft;">
                        <img src="<?= Yii::getAlias('@web/img/hero/president.jpg') ?>" class="rounded-4" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="xb-about-right ml-40 wow fadeInRight" data-wow-delay="200ms" data-wow-duration=".6s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 200ms; animation-name: fadeInRight;">
                        <p class="xb-item--content">Al-Khwarizmi University was established by Presidential Decree PQ-160 on the 30th of April 2025 as a key pillar of Uzbekistan’s national strategy to modernize and internationalize education in technology, engineering, and artificial intelligence. Named after the legendary scholar Muhammad ibn Musa al-Khwarizmi, the university embodies the spirit of scientific innovation rooted in the land of Khorezm. </p>
                        <div class="about-btn mt-30">
                            <a class="more-btn" href="#">more about us
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9585 1.66663H8.0418C7.17513 1.66663 6.4668 2.36663 6.4668 3.23329V4.01663C6.4668 4.88329 7.1668 5.58329 8.03346 5.58329H11.9585C12.8251 5.58329 13.5251 4.88329 13.5251 4.01663V3.23329C13.5335 2.36663 12.8251 1.66663 11.9585 1.66663Z" fill="#170006"></path>
                                        <path d="M14.3667 4.01665C14.3667 5.34165 13.2834 6.42498 11.9584 6.42498H8.0417C6.7167 6.42498 5.63337 5.34165 5.63337 4.01665C5.63337 3.54998 5.13337 3.25832 4.7167 3.47498C3.5417 4.09998 2.7417 5.34165 2.7417 6.76665V14.6083C2.7417 16.6583 4.4167 18.3333 6.4667 18.3333H13.5334C15.5834 18.3333 17.2584 16.6583 17.2584 14.6083V6.76665C17.2584 5.34165 16.4584 4.09998 15.2834 3.47498C14.8667 3.25832 14.3667 3.54998 14.3667 4.01665ZM10.3167 14.125H6.6667C6.32503 14.125 6.0417 13.8417 6.0417 13.5C6.0417 13.1583 6.32503 12.875 6.6667 12.875H10.3167C10.6584 12.875 10.9417 13.1583 10.9417 13.5C10.9417 13.8417 10.6584 14.125 10.3167 14.125ZM12.5 10.7917H6.6667C6.32503 10.7917 6.0417 10.5083 6.0417 10.1667C6.0417 9.82498 6.32503 9.54165 6.6667 9.54165H12.5C12.8417 9.54165 13.125 9.82498 13.125 10.1667C13.125 10.5083 12.8417 10.7917 12.5 10.7917Z" fill="#170006"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="funfact" data-bg-color="#f8fafd" style="background-color: rgb(241, 241, 233);">
        <div class="funfact-image">
            <img src="<?= Yii::getAlias('@web/img/bg/header-bg-3.png') ?>" alt="" width="90%">
        </div>
        <div class="container">
            <div class="funfact-inner ul_li_between w-100 border">
                <div class="funfact-item">
                    <div class="section-title about-sec-title mb-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration=".6s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0ms; animation-name: fadeInUp;">
                        <h1 class="title">About <span class="base-color">Al-Khwarizmi University</span></h1>
                    </div>
                    <h4>Vision & Mission:</h4>
                    <p class="xb-item--contact">To become a leading hub of technological excellence in Central Asia by building an innovative ecosystem that integrates education, research, and industry — transforming Khorezm into a center of global scientific impact once again. </p>
                    <h4 class="mt-20">Founding Institutions:</h4>
                    <p>Al-Khwarizmi University was established under the strategic guidance of the Specialized Education Agency and the Ministry of Preschool and School Education of the Republic of Uzbekistan. As part of a national initiative to create world-class centers of higher learning, the university reflects the government’s commitment to raising the standards of science, technology, and innovation education across the country. </p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta pt-120 pb-120" data-bg-color="#f8fafd" style="background-color: rgb(241, 241, 233);">
        <div class="mission-vission z-1 pos-rel">
            <div class="mission-vission-bg" data-background="<?= Yii::getAlias('@web/img/bg/vm_bg.jpg') ?>" style="background-image: url(&quot;<?= Yii::getAlias('@web/img/bg/vm_bg.jpg') ?>&quot;);"></div>
            <div class="container">
                <div class="row">
                    <div class="section-title about-sec-title mb-60 wow fadeInUp" data-wow-delay="0ms" data-wow-duration=".6s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0ms; animation-name: fadeInUp;">
                        <h1 class="title">Academic Programs</h1>
                    </div>
                </div>
                <div class="row mt-none-30">
                    <div class="col-lg-6 mt-30">
                        <div class="mission-vission-item">
                            <h3 class="xb-item--subtitle"> Undergraduate (Bachelor) Programs</h3>
                            <p class="xb-item--content">◉ B.Sc. Software Engineering</p>
                            <p class="xb-item--content">◉ B.Sc. Artificial Intelligence</p>
                            <p class="xb-item--content">◉ B.Sc. Engineering of Drone Technologies</p>
                            <div class="about-btn mt-30">
                                <a class="more-btn-light" href="#">see more
                                    <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9585 1.66663H8.0418C7.17513 1.66663 6.4668 2.36663 6.4668 3.23329V4.01663C6.4668 4.88329 7.1668 5.58329 8.03346 5.58329H11.9585C12.8251 5.58329 13.5251 4.88329 13.5251 4.01663V3.23329C13.5335 2.36663 12.8251 1.66663 11.9585 1.66663Z" fill="#ffffff"></path>
                                        <path d="M14.3667 4.01665C14.3667 5.34165 13.2834 6.42498 11.9584 6.42498H8.0417C6.7167 6.42498 5.63337 5.34165 5.63337 4.01665C5.63337 3.54998 5.13337 3.25832 4.7167 3.47498C3.5417 4.09998 2.7417 5.34165 2.7417 6.76665V14.6083C2.7417 16.6583 4.4167 18.3333 6.4667 18.3333H13.5334C15.5834 18.3333 17.2584 16.6583 17.2584 14.6083V6.76665C17.2584 5.34165 16.4584 4.09998 15.2834 3.47498C14.8667 3.25832 14.3667 3.54998 14.3667 4.01665ZM10.3167 14.125H6.6667C6.32503 14.125 6.0417 13.8417 6.0417 13.5C6.0417 13.1583 6.32503 12.875 6.6667 12.875H10.3167C10.6584 12.875 10.9417 13.1583 10.9417 13.5C10.9417 13.8417 10.6584 14.125 10.3167 14.125ZM12.5 10.7917H6.6667C6.32503 10.7917 6.0417 10.5083 6.0417 10.1667C6.0417 9.82498 6.32503 9.54165 6.6667 9.54165H12.5C12.8417 9.54165 13.125 9.82498 13.125 10.1667C13.125 10.5083 12.8417 10.7917 12.5 10.7917Z" fill="#ffffff"></path>
                                    </svg>
                                </span>
                                </a>
                            </div>
                            <div class="xb-item--shape">
                                <div class="shape shape--1">
                                    <img src="<?= Yii::getAlias('@web/img/shape/vm_shape1.png') ?>" alt="">
                                </div>
                                <div class="shape shape--2">
                                    <img src="<?= Yii::getAlias('@web/img/shape/vm_shape2.png') ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-30">
                        <div class="mission-vission-item bg-white h-100 border">
                            <h3 class="xb-item--subtitle base-color"><i class="fa-solid fa-hourglass-half"></i> Soon</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog pb-120 bg_img event-bg-clr">
        <div class="container">
            <div class="blog-sec-top ul_li_between">
                <div class="section-title mb-40">
                    <span class="sub-title">Latest News</span>
                    <h1 class="title">News & Events</h1>
                </div>
                <div class="xb-topic">
                    <select name="Topic" id="seelct">
                        <option value="1">Topic</option>
                        <option value="2">Arts, Humanities, &amp; Social Sciences</option>
                        <option value="3">Campus &amp; Community</option>
                        <option value="4">Education, Business, &amp; Law</option>
                        <option value="5">Health Sciences</option>
                        <option value="5">Science &amp; Technology</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center align-items-start">

                <div class="col-lg-3 col-md-8">
                    <div class="xb-blog__left">
                        <?php if (!empty($leftPosts)): ?>
                            <?php foreach ($leftPosts as $post): ?>
                                <div class="xb-blog pos-rel mt-20">
                                    <div class="xb-item--img" style="height: 250px; overflow: hidden;">
                                        <?= Html::a(Html::img(Yii::getAlias('@web/uploads/posts/') . ($post->firstImage->image ?? 'default_image.jpg'), ['alt' => $post->title, 'style' => 'width: 100%; height: 100%; object-fit: cover;']), Url::to(['/post/view', 'slug' => $post->slug])) ?>
                                    </div>
                                    <div class="xb-item--holder">
                                        <a class="xb-item--cta" href="#">#Study</a>
                                        <h2 class="xb-item--title border-effect-2">
                                            <?= Html::a(StringHelper::truncate($post->title, 70), Url::to(['/post/view', 'slug' => $post->slug])) ?>
                                        </h2>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6 col-md-8">
                    <?php if ($firstPost): ?>
                        <div class="xb-blog chn-margin pos-rel mt-20">
                            <div class="xb-item--img" style="height: 520px; overflow: hidden;">
                                <?= Html::a(Html::img(Yii::getAlias('@web/uploads/posts/') . ($firstPost->firstImage->image ?? 'default_image.jpg'), ['alt' => $firstPost->title, 'style' => 'width: 100%; height: 100%; object-fit: cover;']), Url::to(['/post/view', 'slug' => $firstPost->slug])) ?>
                            </div>
                            <div class="xb-item--holder">
                                <a class="xb-item--cta" href="#">#Mission</a>
                                <h2 class="xb-item--title border-effect">
                                    <?= Html::a(StringHelper::truncate($firstPost->title, 100), Url::to(['/post/view', 'slug' => $firstPost->slug])) ?>
                                </h2>
                                <div class="xb-item--meta ul_li">
                                    <span><i class="far fa-user"></i><?= Html::encode($firstPost->user->username ?? 'Noma\'lum') ?></span>
                                    <span><i class="far fa-clock"></i><?= Yii::$app->formatter->asDate($firstPost->created_at, 'php:Y/m/d') ?></span>
                                    <span><i class="far fa-comment"></i>0</span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-md-8">
                    <div class="xb-blog__right">
                        <?php if (!empty($rightPosts)): ?>
                            <?php foreach ($rightPosts as $post): ?>
                                <div class="xb-blog mr-left pos-rel mt-20">
                                    <div class="xb-item--img" style="height: 250px; overflow: hidden;">
                                        <?= Html::a(Html::img(Yii::getAlias('@web/uploads/posts/') . ($post->firstImage->image ?? 'default_image.jpg'), ['alt' => $post->title, 'style' => 'width: 100%; height: 100%; object-fit: cover;']), Url::to(['/post/view', 'slug' => $post->slug])) ?>
                                    </div>
                                    <div class="xb-item--holder">
                                        <a class="xb-item--cta" href="#">#Study</a>
                                        <h2 class="xb-item--title border-effect-2">
                                            <?= Html::a(StringHelper::truncate($post->title, 70), Url::to(['/post/view', 'slug' => $post->slug])) ?>
                                        </h2>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="xb-btn text-center pt-60">
                <?= Html::a(
                    'More News' . '<span class="icon"><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.4795 21C9.10959 21 7.81507 20.7539 6.59589 20.2617C5.37671 19.7695 4.30137 19.0962 3.36986 18.2417C2.43836 17.3872 1.67808 16.3857 1.08904 15.2373C0.486301 14.0752 0.123288 12.8311 0 11.5049V11.4639H8.56849V14.3145C8.56849 14.5742 8.66096 14.7998 8.84589 14.9912C9.03082 15.1826 9.25342 15.2783 9.5137 15.2783C9.65068 15.2783 9.7774 15.251 9.89384 15.1963C10.0103 15.1416 10.1096 15.0732 10.1918 14.9912L14.0137 11.1768C14.0959 11.0947 14.1644 10.9956 14.2192 10.8794C14.274 10.7632 14.3014 10.6367 14.3014 10.5C14.3014 10.3633 14.274 10.2368 14.2192 10.1206C14.1644 10.0044 14.0959 9.90527 14.0137 9.82324L10.1918 6.00879C10.1096 5.92676 10.0103 5.8584 9.89384 5.80371C9.7774 5.74902 9.65068 5.72168 9.5137 5.72168C9.25342 5.72168 9.0274 5.81738 8.83562 6.00879C8.64384 6.2002 8.54794 6.42578 8.54794 6.68555V9.53613H0C0.123288 8.19629 0.486301 6.94531 1.08904 5.7832C1.67808 4.62109 2.44178 3.61279 3.38014 2.7583C4.31849 1.90381 5.39041 1.23047 6.59589 0.738281C7.81507 0.246094 9.10959 0 10.4795 0C11.9315 0 13.2945 0.273439 14.5685 0.820312C15.8425 1.38086 16.9555 2.13623 17.9075 3.08643C18.8596 4.03662 19.6096 5.14746 20.1575 6.41895C20.7192 7.69043 21 9.05078 21 10.5C21 11.9492 20.7192 13.3096 20.1575 14.5811C19.6096 15.8662 18.8596 16.9839 17.9075 17.9341C16.9555 18.8843 15.8425 19.6328 14.5685 20.1797C13.2945 20.7266 11.9315 21 10.4795 21Z" fill="#ffffff"></path></svg></span>',
                    Url::to(['/post/index']),
                    ['class' => 'thm-btn']
                ) ?>
            </div>
        </div>
    </section>

    <section class="event event-bg-clr pos-rel pt-160">
        <div class="xb-event-bottom">
            <img src="<?= Yii::getAlias('@web/img/bg/footer.png') ?>" alt="">
        </div>
        <div class="event-shape">
            <div class="shape shape--one">
                <img data-parallax='{"x":-50,"y":-80}' src="<?= Yii::getAlias('@web/img/shape/stamp.png') ?>" alt="">
            </div>
            <div class="shape shape--two">
                <img src="<?= Yii::getAlias('@web/img/shape/Union.png') ?>" alt="">
            </div>
        </div>
    </section>
</main>