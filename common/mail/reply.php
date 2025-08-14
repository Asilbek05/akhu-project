<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $request \common\models\ApplicationRequests */
/* @var $replyMessage string */
?>

<div class="mail-body" style="font-family: Arial, sans-serif; font-size: 16px; color: #333; line-height: 1.6; background-color: #f4f4f4; padding: 20px;">
    <div class="content" style="background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #007bff; font-size: 24px; margin-top: 0;">Dear <?= Html::encode($request->name) ?>,</h1>

        <p style="margin-bottom: 20px;">Your message to us has been answered. You can see the reply below.</p>

        <div class="message-section" style="border-left: 4px solid #ddd; padding-left: 15px; margin-bottom: 20px;">
            <h3 style="color: #555; font-size: 18px;">Your message:</h3>
            <p style="font-style: italic; color: #777; margin: 0;"><?= Html::encode($request->message) ?></p>
        </div>

        <div class="reply-section" style="border-left: 4px solid #007bff; padding-left: 15px; margin-bottom: 20px;">
            <h3 style="color: #007bff; font-size: 18px;">Our reply:</h3>
            <p style="margin: 0;"><?= Html::encode($replyMessage) ?></p>
        </div>

        <p style="margin-top: 30px; color: #555;">Sincerely,<br>Website Administration</p>
    </div>
    <p class="footer" style="text-align: center; font-size: 14px; color: #aaa; margin-top: 20px;">This is an automated message, please do not reply to it.</p>
</div>