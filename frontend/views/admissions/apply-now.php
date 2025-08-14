<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'About Us';

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
                        <h2 class="details_item_title">
                            History
                        </h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>