<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = '1-Year Scholarships';

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
                        <div class="border bg-white rounded-4 p-3">
                            <h3 class="pb-3">Merit-Based Scholarship</h3>
                            <p>Awarded competitively to local students based on top scores in the entrance exam or international exam (SAT, International Baccalaureate (IB), International AS & A Levels). The allocation is as follows:</p>
                            <div class="table-responsive mt-4" style="border-radius: 14px !important">
                                <table class="table table-rounded">
                                    <thead class="rounded-top-5 border-0">
                                    <tr>
                                        <th scope="col" class="ps-3 bg-base-color">Merit-Based Scholarship</th>
                                        <th scope="col" class="ps-3 bg-base-color">Price a Year (UZS)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row" class="ps-3 border">Top 10% of announced quota</th>
                                        <td class="ps-3 border">100% of tuition fee</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-3 border">Following 10% of announced quota</th>
                                        <td class="ps-3 border">70% of tuition fee</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-3 border">Following 15% of announced quota</th>
                                        <td class="ps-3 border">50% of tuition fee</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="border bg-white rounded-4 p-3 mt-4">
                            <h3 class="pb-3">Academic Scholarship</h3>
                            <p>Awarded annually for second, third, and fourth-year local students based on high academic performance in all courses over the previous academic year. The scholarship percentage may vary each year depending on the student’s performance:</p>
                            <div class="table-responsive mt-4" style="border-radius: 14px !important">
                                <table class="table table-rounded">
                                    <thead class="rounded-top-5 border-0">
                                    <tr>
                                        <th scope="col" class="ps-3 bg-base-color">Academic Scholarship</th>
                                        <th scope="col" class="ps-3 bg-base-color">Price a Year (UZS)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row" class="ps-3 border">Top 10% of announced quota</th>
                                        <td class="ps-3 border">100% of tuition fee</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-3 border">Following 10% of announced quota</th>
                                        <td class="ps-3 border">70% of tuition fee</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-3 border">Following 15% of announced quota</th>
                                        <td class="ps-3 border">50% of tuition fee</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h3 class="pt-3 ps-0">Note</h3>
                        <ul class="ps-4 pt-2">
                            <li>Students initially admitted on a tuition-paying basis can earn this scholarship in subsequent years through high academic performance.</li>
                            <li>If students receive this scholarship for one academic year but show low academic performance, they may not qualify for the scholarship in the following academic year.</li>
                        </ul>
                    </div>
                </div>
            </div>
    </section>
</main>