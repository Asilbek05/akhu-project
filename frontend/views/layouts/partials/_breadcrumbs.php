<?php
use yii\helpers\Html;
use yii\helpers\Inflector;

/** @var yii\web\View $this */
/** @var string|null $title  Optional, uzatilmasa $this->title olinadi */

// Title
$title = $title ?? ($this->title ?? Yii::$app->name);

$controllerId = Yii::$app->controller->id ?? '';
$controllerName = Inflector::camel2words(Inflector::id2camel($controllerId));
?>
<section class="breadcrumb bg_img ul_li" data-background="<?= Yii::$app->request->baseUrl . '/img/bg/breadcrump.png' ?>">
    <div class="container">
        <div class="breadcrumb__content text-center">
            <h2 class="breadcrumb__title"><?= Html::encode($title) ?></h2>
            <p class="breadcrumb__desc"><?= Html::encode($controllerName) ?></p>
        </div>
    </div>
</section>
