<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Undergraduate';

$arrowSvgPath = Yii::getAlias('@frontend/web/img/svg/arrow.svg');
$arrowSvgContent = '';

if (file_exists($arrowSvgPath)) {
    $arrowSvgContent = file_get_contents($arrowSvgPath);
}

?>

<main>
    <section class="breadcrumb bg_img ul_li" data-background="<?= Yii::$app->request->baseUrl . '/img/bg/breadcrump.png' ?>">
        <div class="container">
            <div class="breadcrumb__content text-center">
                <h2 class="breadcrumb__title"><?= Html::encode($this->title) ?></h2>
                <p class="breadcrumb__desc">About</p>
            </div>
        </div>
    </section>
    <section class="about pt-120 pb-120 pattern-section">
        <div class="right-bg-pattern">
            <div class="left-bg-pattern">
                <div class="container">
                    <div class="row align-items-center mt-none-30">
                        <h2 class="details_item_title pb-60">
                            Academic Programs
                        </h2>
                        <div class="row justify-content-center mt-none-30 pb-60">
                            <div class="col-lg-4 col-md-6 mt-20">
                                <div class="news-wrap xb-news-left hs-news wow fadeInUp border" data-wow-delay="100ms" data-wow-duration=".4s">
                                    <div class="xb-item--img pos-rel">
                                        <?= Html::img(Yii::$app->request->baseUrl . '/img/program/program-1-1.jpg', ['alt' => 'Software Engineering', 'style' => 'height: 230px; object-fit: cover']) ?>
                                    </div>
                                    <div class="xb-news-contant mt-25">
                                        <h3 class="xb-item--title mt-10 border-effect">
                                            <?= Html::a('B.Sc. Software Engineering', Url::to(['/programs/software-engineering'])) ?>
                                        </h3>
                                    </div>
                                    <div class="xb-link text-center mt-70">
                                        <?= Html::a('Read More <span>' . $arrowSvgContent . '</span>', Url::to(['/programs/software-engineering'])) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-20">
                                <div class="news-wrap xb-news-left hs-news wow fadeInUp border" data-wow-delay="200ms" data-wow-duration=".4s">
                                    <div class="xb-item--img pos-rel">
                                        <?= Html::img(Yii::$app->request->baseUrl . '/img/program/program-2-1.jpg', ['alt' => 'Artificial Intelligence', 'style' => 'height: 230px; object-fit: cover']) ?>
                                        <a class="div-link" href="<?= Url::to(['/site/academic-program-2']) ?>"></a>
                                    </div>
                                    <div class="xb-news-contant mt-25">
                                        <h3 class="xb-item--title mt-10 border-effect">
                                            <?= Html::a('B.Sc. Artificial Intelligence', Url::to(['/programs/artificial-intelligence'])) ?>
                                        </h3>
                                    </div>
                                    <div class="xb-link text-center mt-70">
                                        <?= Html::a('Read More <span>' . $arrowSvgContent . '</span>', Url::to(['/programs/artificial-intelligence'])) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-20">
                                <div class="news-wrap xb-news-left hs-news wow fadeInUp border" data-wow-delay="300ms" data-wow-duration=".4s">
                                    <div class="xb-item--img pos-rel">
                                        <?= Html::img(Yii::$app->request->baseUrl . '/img/program/program-3-1.jpg', ['alt' => 'Drone Technologies', 'style' => 'height: 230px; object-fit: cover']) ?>
                                        <a class="div-link" href="<?= Url::to(['/site/academic-program-3']) ?>"></a>
                                    </div>
                                    <div class="xb-news-contant mt-25">
                                        <h3 class="xb-item--title mt-10 border-effect">
                                            <?= Html::a('B.Sc. Engineering of Drone Technologies', Url::to(['/programs/engineering-of-drone'])) ?>
                                        </h3>
                                    </div>
                                    <div class="xb-link text-center mt-35">
                                        <?= Html::a('Read More <span>' . $arrowSvgContent . '</span>', Url::to(['/programs/engineering-of-drone'])) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>