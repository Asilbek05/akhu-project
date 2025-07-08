<?php
use yii\helpers\Html;
?>

<div style="height: 100vh; width: 100vw; display: flex; flex-direction: column; justify-content: center; align-items: center; background: linear-gradient(135deg, #f9f9f9 0%, #eef2f5 100%); text-align: center; padding: 20px; font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;">

    <!-- Animatsiya kontayneri -->
    <div id="animation-container" style="width: 100%; max-width: 600px; height: 50vh;"></div>

    <!-- Chiroyli ko'rinishdagi tugma -->
    <a href="<?= Yii::$app->homeUrl ?>" class="btn-hover-effect" style="padding: 14px 36px; font-size: 1.1rem; border-radius: 50px; background: linear-gradient(45deg, #3a7bd5, #00d2ff); color: white; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 4px 15px rgba(58, 123, 213, 0.3); transition: all 0.3s ease; border: none; cursor: pointer; position: relative; overflow: hidden;">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16" style="transition: transform 0.3s ease;">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        Bosh sahifaga qaytish
    </a>
</div>

<!-- Lottie animatsiyasi uchun JavaScript -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('animation-container');
        const player = document.createElement('lottie-player');
        player.setAttribute('src', '<?= Yii::getAlias('@web') ?>/metronic/assets/animation/error.json');
        player.setAttribute('background', 'transparent');
        player.setAttribute('speed', '1');
        player.setAttribute('style', 'width: 100%; height: 100%;');
        player.setAttribute('loop', '');
        player.setAttribute('autoplay', '');
        container.appendChild(player);
    });

    // Tugma hover effekti
    const buttons = document.querySelectorAll('.btn-hover-effect');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.querySelector('svg').style.transform = 'translateX(-4px)';
        });
        button.addEventListener('mouseleave', function() {
            this.querySelector('svg').style.transform = 'translateX(0)';
        });
    });
</script>