<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'B.Sc. Artificial Intelligence';

?>

<main>
    <section class="breadcrumb bg_img ul_li" data-background="<?= Yii::$app->request->baseUrl . '/img/bg/breadcrump.png' ?>">
        <div class="container">
            <div class="breadcrumb__content text-center">
                <h2 class="breadcrumb__title"><?= Html::encode($this->title) ?></h2>
                <p class="breadcrumb__desc">About > Undergraduate</p>
            </div>
        </div>
    </section>
    <section class="about pt-120 pb-120 pattern-section">
        <div class="right-bg-pattern">
            <div class="left-bg-pattern">
                <div class="container">
                    <div class="row align-items-center mt-none-30">
                        <h2 class="details_item_title">
                            B.Sc. Artificial Intelligence
                        </h2>
                        <ul class="nav nav-pills mb-3 d-flex justify-content-between border rounded-5 bg-white" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">Course Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">Course Structure</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false">Entry requirements</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="false">Graduation Requirements</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-5" aria-selected="false">Fees and funding</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6" type="button" role="tab" aria-controls="pills-6" aria-selected="false">Job opportunities</button>
                            </li>
                        </ul>
                        <div class="tab-content border bg-white rounded-4 p-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab" tabindex="0">
                                Soon
                            </div>
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab" tabindex="0">
                                Soon
                            </div>
                            <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab" tabindex="0">
                                Soon
                            </div>
                            <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab" tabindex="0">
                                Soon
                            </div>
                            <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab" tabindex="0">
                                Soon
                            </div>
                            <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab" tabindex="0">
                                Soon
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>