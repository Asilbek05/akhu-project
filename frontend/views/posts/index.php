<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Posts[] $posts */

$this->title = 'Our News';
?>

<style>
    .post-tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 10px;
    }
    .post_bottom_meta_wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }

    .post_bottom_meta_wrap p {
        flex-grow: 1;
        margin-right: 20px;
    }
    .meta_items_flex {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .post_view_count_wrap {
        text-align: center;
    }
    .post_date_wrap {
        text-align: right;
    }

    .post_view_count,
    .post_date {
        font-size: 14px;
        white-space: nowrap;
    }
</style>

<main>

    <section class="breadcrumb bg_img ul_li" data-background="img/bg/breadcrump.png">
        <div class="container">
            <div class="breadcrumb__content text-center">
                <h2 class="breadcrumb__title">our news</h2>
                <p class="breadcrumb__desc">Latest Announcements and Updates</p>
            </div>
        </div>
    </section>
    <section class="blog_section pt-120 pb-120" data-bg-color="#f8fafd">
        <div class="container">

            <?php if (empty($posts)): ?>
                <p class="text-center w-100">No posts are available at the moment.</p>
            <?php else: ?>
            <div class="blog_onecol_carousel overflow-hidden swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                <div class="swiper-wrapper">
                    <?php
                    foreach (array_slice($posts, 0, 3) as $key => $post): ?>
                        <div class="swiper-slide" style="width: 100%; margin-right: 10px;">
                            <div class="blog_post_block content_over_layout">
                                <div class="blog_post_image" style="aspect-ratio: 16/9; overflow: hidden; border-radius: 10px;">
                                    <a class="image_wrap" href="<?= Url::to(['posts/view', 'slug' => $post->slug]) ?>">
                                        <?php
                                        $firstImage = $post->getFirstImage()->one();
                                        $imageUrl = ($firstImage && isset(Yii::$app->params['uploadBaseUrl']))
                                                ? Yii::$app->params['uploadBaseUrl'] . '/posts/' . $firstImage->image
                                                : 'https://via.placeholder.com/1290x600.png?text=No+Image';
                                        ?>
                                        <img src="<?= Html::encode($imageUrl) ?>" alt="<?= Html::encode($post->title) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="blog_post_content" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 30px; color: white; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.1) 100%); border-radius: 0 0 10px 10px;">

                                    <?php if (!empty($post->tags_array)): ?>
                                        <div class="post-tags-container">
                                            <?php foreach ($post->tags_array as $tagName): ?>
                                                <span class="post-tag">
                                                    <a href="#" class="post_category" style="color: white;">
                                                        #<?= \yii\helpers\Html::encode($tagName) ?>
                                                    </a>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <h3 class="blog_post_title border-effect" style="margin-top: 15px;">
                                        <a href="<?= Url::to(['posts/view', 'slug' => $post->slug]) ?>" style="color: white;">
                                            <?= Html::encode($post->title) ?>
                                        </a>
                                    </h3>

                                    <div class="post_bottom_meta_wrap">
                                        <p class="mb-0">
                                            <?= Html::encode(mb_substr(strip_tags($post->content), 0, 100)) ?>...
                                        </p>

                                        <div class="meta_items_flex">
                                            <?php if (!empty($post->view_count + 2)): ?>
                                                <div class="post_view_count_wrap">
                                                    <span class="post_view_count">
                                                        <i class="far fa-eye"></i> <?= Html::encode($post->view_count + 1) ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($post->created_at)): ?>
                                                <div class="post_date_wrap">
                                                <span class="post_date">
                                                    <i class="far fa-clock"></i>
                                                    <?= Yii::$app->formatter->asDate($post->created_at, 'php:d M, Y') ?>
                                                </span>
                                                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="row mt-none-30 pt-100">
                <?php
                // Dastlabki 3 ta postni tashlab yuborish
                foreach (array_slice($posts, 3) as $key => $post): ?>
                    <div class="col-lg-6 mt-30">
                        <div class="xb-event-item">
                            <div class="xb-item--img" style="height: 400px; overflow: hidden; border-radius: 10px;">
                                <a href="<?= Url::to(['posts/view', 'slug' => $post->slug]) ?>">
                                    <?php
                                    // Rasmlarni bazadan olish
                                    $firstImage = $post->getFirstImage()->one();
                                    $imageUrl = ($firstImage && isset(Yii::$app->params['uploadBaseUrl']))
                                            ? Yii::$app->params['uploadBaseUrl'] . '/posts/' . $firstImage->image
                                            : 'https://via.placeholder.com/600x400.png?text=No+Image';
                                    ?>
                                    <img src="<?= Html::encode($imageUrl) ?>" alt="<?= Html::encode($post->title) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                </a>
                            </div>
                            <div class="ul_li xb-item--wrap">
                                <div class="xb-item--content">

                                    <div class="post_meta_wrap">
                                        <div class="post_meta_flex">
                                            <?php if (!empty($post->tags_array)): ?>
                                                <div class="post-tags-container">
                                                    <?php foreach ($post->tags_array as $tagName): ?>
                                                        <span class="post-tag">
                            <a href="#" class="post_category">
                                #<?= \yii\helpers\Html::encode($tagName) ?>
                            </a>
                        </span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($post->view_count)): ?>
                                                <div class="post_view_count_wrap">
                    <span class="post_view_count">
                        <i class="far fa-eye"></i> <?= \yii\helpers\Html::encode($post->view_count) ?>
                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <h2 class="xb-item--title border-effect">
                                        <a href="<?= \yii\helpers\Url::to(['posts/view', 'slug' => $post->slug]) ?>">
                                            <?= \yii\helpers\Html::encode($post->title) ?>
                                        </a>
                                    </h2>

                                    <div class="xb-event-btn pt-15">
                                        <a class="thm-btn" href="<?= \yii\helpers\Url::to(['posts/view', 'slug' => $post->slug]) ?>">
                                            Read more
                                            <span class="icon">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.4795 21C9.10959 21 7.81507 20.7539 6.59589 20.2617C5.37671 19.7695 4.30137 19.0962 3.36986 18.2417C2.43836 17.3872 1.67808 16.3857 1.08904 15.2373C0.486301 14.0752 0.123288 12.8311 0 11.5049V11.4639H8.56849V14.3145C8.56849 14.5742 8.66096 14.7998 8.84589 14.9912C9.03082 15.1826 9.25342 15.2783 9.5137 15.2783C9.65068 15.2783 9.7774 15.251 9.89384 15.1963C10.0103 15.1416 10.1096 15.0732 10.1918 14.9912L14.0137 11.1768C14.0959 11.0947 14.1644 10.9956 14.2192 10.8794C14.274 10.7632 14.3014 10.6367 14.3014 10.5C14.3014 10.3633 14.274 10.2368 14.2192 10.1206C14.1644 10.0044 14.0959 9.90527 14.0137 9.82324L10.1918 6.00879C10.1096 5.92676 10.0103 5.8584 9.89384 5.80371C9.7774 5.74902 9.65068 5.72168 9.5137 5.72168C9.25342 5.72168 9.0274 5.81738 8.83562 6.00879C8.64384 6.2002 8.54794 6.42578 8.54794 6.68555V9.53613H0C0.123288 8.19629 0.486301 6.94531 1.08904 5.7832C1.67808 4.62109 2.44178 3.61279 3.38014 2.7583C4.31849 1.90381 5.39041 1.23047 6.59589 0.738281C7.81507 0.246094 9.10959 0 10.4795 0C11.9315 0 13.2945 0.273439 14.5685 0.820312C15.8425 1.38086 16.9555 2.13623 17.9075 3.08643C18.8596 4.03662 19.6096 5.14746 20.1575 6.41895C20.7192 7.69043 21 9.05078 21 10.5C21 11.9492 20.7192 13.3096 20.1575 14.5811C19.6096 15.8662 18.8596 16.9839 17.9075 17.9341C16.9555 18.8843 15.8425 19.6328 14.5685 20.1797C13.2945 20.7266 11.9315 21 10.4795 21Z" fill="#ffffff"></path>
                </svg>
            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="xb-item--date-inner text-center">
                                    <div class="xb-item--icon">
                                        <img src="/img/icon/note-book.svg" alt="">
                                    </div>
                                    <span class="xb-item--date">
                                            <?= Yii::$app->formatter->asDate($post->created_at, 'php:d, M <br> Y') ?>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>