<?php

use yii\helpers\Html;

/** @var common\models\Logs $model */
?>

<div class="log-detail">
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <td><?= Html::encode($model->id) ?></td>
        </tr>
        <tr>
            <th>Foydalanuvchi</th>
            <td><?= Html::encode($model->user ? $model->user->username : 'System') ?></td>
        </tr>
        <tr>
            <th>Action</th>
            <td><?= Html::encode($model->action) ?></td>
        </tr>
        <tr>
            <th>Message</th>
            <td style="white-space: pre-wrap;"><?= Html::encode($model->message) ?></td>
        </tr>
        <tr>
            <th>Level</th>
            <td>
                <span class="badge bg-secondary">
                    <?= Html::encode(ucfirst($model->level)) ?>
                </span>
            </td>
        </tr>
        <tr>
            <th>IP</th>
            <td><?= Html::encode($model->ip) ?></td>
        </tr>
        <tr>
            <th>User Agent</th>
            <td style="word-break: break-all;"><?= Html::encode($model->user_agent) ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?= Yii::$app->formatter->asDatetime($model->created_at) ?></td>
        </tr>
    </table>
</div>