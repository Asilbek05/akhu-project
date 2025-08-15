<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Leadership';

?>


<section class="about pt-120 pb-120 pattern-section">
    <div class="right-bg-pattern">
        <div class="left-bg-pattern">
            <div class="container">
                <div class="row align-items-center mt-none-30">
                    <?= Html::img(Yii::$app->request->baseUrl . '/img/cooming-soon.png', ['alt' => 'Cooming Soon', 'class' => 'w-50 mx-auto pt-150 pb-150']) ?>
                </div>
            </div>
        </div>
    </div>
</section>
