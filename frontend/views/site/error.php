<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = 'Page Not Found';
?>

<style>
    /* Google Fonts - Open Sans for a clean, modern look */
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap');

    body {
        margin: 0;
        padding: 0;
        font-family: 'Open Sans', sans-serif;
        background-color: #ffffff; /* White background for minimalism */
        color: #333;
    }

    .error-container {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .lottie-animation {
        width: 100%;
        max-width: 500px;
        height: auto;
    }

    h1 {
        font-size: 3.8rem;
        font-weight: 700;
        color: #1c2841;
        margin-top: -20px;
        margin-bottom: 5px;
    }

    p {
        font-size: 1.1rem;
        color: #666;
        max-width: 500px;
        line-height: 1.6;
        margin-bottom: 40px;
    }

    .btn-minimal {
        display: inline-block;
        padding: 12px 30px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 5px;
        background-color: #1c2841;
        color: #ffffff;
        text-decoration: none;
        border: 2px solid #1c2841;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-minimal:hover {
        background-color: #fff;
        color: #1c2841;
    }
</style>

<div class="error-container">

    <div id="animation-container" class="lottie-animation"></div>

    <a href="<?= Yii::$app->homeUrl ?>" class="btn-minimal">
        Go to Homepage
    </a>
</div>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('animation-container');
        const player = document.createElement('lottie-player');
        player.setAttribute('src', '<?= Yii::getAlias('@web') ?>/animation/error.json');
        player.setAttribute('background', 'transparent');
        player.setAttribute('speed', '1');
        player.setAttribute('style', 'width: 100%; height: 100%;');
        player.setAttribute('loop', '');
        player.setAttribute('autoplay', '');
        container.appendChild(player);
    });
</script>