<?php

use yii\helpers\Html;
use yii\web\View;
use backend\assets\AppAsset;

AppAsset::register($this);

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--begin::Head-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<!--end::Head-->

<!--begin::Body-->
<body  id="kt_body"  class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center" >
<!--begin::Theme mode setup on page load-->
<?php $this->beginBody() ?>
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
    <style>
        body {
            background-image: url('<?= Yii::getAlias('@web') ?>/modernatic/assets/media/auth/bg10.jpeg');
        }

        [data-bs-theme="dark"] body {
            background-image: url('<?= Yii::getAlias('@web') ?>/modernatic/assets/media/auth/bg10-dark.jpeg');
        }
    </style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <?= $content ?>
    <!--end::Authentication - Sign-in--></div>
<!--end::Root-->
<!--end::Root-->

<!-- Scripts -->
<script src="/assets/plugins/global/plugins.bundle.js"></script>
<script src="/assets/js/scripts.bundle.js"></script>
<script src="/assets/js/custom/authentication/sign-in/general.js"></script>

<?php $this->endBody() ?>
</body>
<!--end::Body-->
</html>
<?php $this->endPage() ?>

