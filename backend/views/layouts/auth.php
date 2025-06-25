<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AppAsset;

AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="<?= Url::to('@web/metronic/assets/media/logos/favicon.ico') ?>"/>
    <link href="<?= Url::to('@web/metronic/assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" />
    <link href="<?= Url::to('@web/metronic/assets/css/style.bundle.css') ?>" rel="stylesheet" />
</head>
<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
<?php $this->beginBody() ?>

<style>
    body {
        background-image: url('<?= Url::to('@web/metronic/assets/media/auth/bg10.jpeg') ?>');
    }

    [data-bs-theme="dark"] body {
        background-image: url('<?= Url::to('@web/metronic/assets/media/auth/bg10-dark.jpeg') ?>');
    }
</style>
<?= $content ?>

<!-- Global Scripts -->
<script>
    var hostUrl = "<?= Url::to('@web/metronic/assets/') ?>";
</script>
<script src="<?= Url::to('@web/metronic/assets/plugins/global/plugins.bundle.js') ?>"></script>
<script src="<?= Url::to('@web/metronic/assets/js/scripts.bundle.js') ?>"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>