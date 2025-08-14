<?php
/**
 * @var yii\web\View $this
 * @var common\models\ApplicationRequests $application
 * @var common\models\ApplicationReplies[] $replies
 */

use yii\helpers\Html;
?>

<section>
    <div class="card" id="chat1" style="border-radius: 15px;">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-base-color text-white border-bottom-0"
             style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <p class="mb-0 fw-bold">Request Status</p>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="card-body">
            <div class="d-flex flex-row justify-content-start mb-4">
                <img src="<?= Yii::getAlias('@web') ?>/img/blue-check.png" alt="avatar 1"
                     style="width: 35px; height: 100%;">
                <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                    <p class="small mb-0">
                        <?= Html::encode($application->message) ?>
                    </p>
                </div>
            </div>

            <?php if (!empty($replies)): ?>
                <?php foreach ($replies as $reply): ?>
                    <div class="d-flex flex-row justify-content-end mb-4">
                        <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                            <p class="small mb-0">
                                <?= nl2br(Html::encode($reply->reply_message)) ?>
                            </p>
                        </div>
                        <img src="<?= Yii::getAlias('@web') ?>/img/reply.png" alt="avatar 1"
                             style="width: 35px; height: 100%;">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="d-flex flex-row justify-content-end mb-4">
                    <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #c6ddd0">
                        <p class="small mb-0">
                            Your application is currently being reviewed.
                        </p>
                    </div>
                    <img src="<?= Yii::getAlias('@web') ?>/img/reply.png" alt="avatar 1"
                         style="width: 35px; height: 100%;">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>