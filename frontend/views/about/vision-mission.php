<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Vision & Mission';

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
                    <div class="row align-items-center mt-none-30 pb-100">
                        <h2 class="details_item_title">
                            Vision
                        </h2>
                        <p>o become a leading hub of technological excellence in Central Asia by building an innovative ecosystem that integrates education, research, and industry — transforming Khorezm into a center of global scientific impact once again. </p>
                        <h2 class="details_item_title pt-4">
                            Mission
                        </h2>
                        <p>Al-Khwarizmi University is committed to nurturing a new generation of engineers, scientists, and innovators by: </p>
                        <ul class="ps-5 icon_list_icon ordered_list_block">
                            <li>Delivering world-class, practice-driven education aligned with international standards.</li>
                            <li>Driving cutting-edge research that addresses national and global challenges.</li>
                            <li>Creating strong, dynamic partnerships with industry to ensure relevance, innovation, and employability.</li>
                            <li>Promoting values of curiosity, integrity, collaboration, and service to society.</li>
                        </ul>
                        <p>Inspired by the legacy of our namesake, we aim to empower our students to become the algorithmic thinkers and changemakers of tomorrow. </p>
                    </div>
                </div>
            </div>
    </section>
</main>