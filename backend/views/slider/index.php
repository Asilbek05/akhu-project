<?php

use common\models\Slider;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SliderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


Modal::begin([
    'id' => 'infoModal',
    'title' => 'Slayder Qo‘llanmasi',
]);

echo <<<HTML
    <div style="line-height:1.6">
        <p>
            Ushbu bo‘lim orqali siz <strong>saytingizning bosh sahifasida chiqadigan slayder</strong> ma'lumotlarini kiritishingiz mumkin.
        </p>
        <ul>
            <li><strong>Slayder nomi:</strong> slayderni farqlash uchun ishlatiladi.</li>
            <li><strong>Tavsif:</strong> foydalanuvchiga ko‘rinadigan qisqacha matn.</li>
            <li><strong>Tugma matni:</strong> slayder ichidagi chaqiriq (Call to Action) tugmasining yozuvi.</li>
            <li><strong>Tugma havolasi (URL):</strong> tugma bosilganda foydalanuvchi qayerga yo‘naltirilishini ko‘rsating.</li>
            <li><strong>Fon rasmi:</strong> slayder foniga qo‘yiladigan rasm (jpg/png tavsiya etiladi).</li>
        </ul>
        <p>
            Quyida namunaviy tabiat fon rasmini ko‘rishingiz mumkin:
        </p>
        <div style="text-align:center">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80" 
                 alt="Tabiat rasmi" 
                 style="max-width:100%; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
        </div>
    </div>
HTML;

echo Html::button('Tushunarli', [
    'class' => 'btn btn-primary',
    'data-bs-dismiss' => 'modal'
]);

Modal::end();
?>
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

    <div class="mx-auto">
        <?= Html::button('<i class="bi bi-info-circle me-1"></i> Qo‘llanma', [
            'class' => 'btn btn-outline-info btn-lg',
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#infoModal'
        ]) ?>
    </div>

    <div>
        <?= Html::a('<i class="bi bi-plus-circle me-1"></i> Yangi slider', ['create'], [
            'class' => 'btn btn-primary btn-lg shadow-sm',
            'style' => 'font-weight: 500;',
        ]) ?>
    </div>


    <?= GridView::widget([
        'id' => 'slider-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model) {
            return ['data-key' => $model->id];
        },
        'columns' => [
            'id',
            'name',
            'description:ntext',
            'button_text',
            'button_url:url',
            [
                'label' => 'Tartib',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::tag('div',
                        Html::tag('span', $model->sort_order, ['class' => 'badge bg-secondary me-2']) .
                        Html::a('↑', ['slider/move', 'id' => $model->id, 'direction' => 'up'], [
                            'class' => 'btn btn-sm btn-success me-1',
                            'data-method' => 'post',
                            'title' => 'up',
                        ]) .
                        Html::a('↓', ['slider/move', 'id' => $model->id, 'direction' => 'down'], [
                            'class' => 'btn btn-sm btn-danger',
                            'data-method' => 'post',
                            'title' => 'down',
                        ]),
                        ['class' => 'd-flex align-items-center']
                    );
                }
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="bi bi-eye"></i>', $url, [
                            'class' => 'btn btn-sm btn-info me-1',
                            'title' => 'View',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<i class="bi bi-pencil"></i>', $url, [
                            'class' => 'btn btn-sm btn-warning me-1',
                            'title' => 'Update',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="bi bi-trash"></i>', $url, [
                            'class' => 'btn btn-sm btn-secondary',
                            'title' => 'Delete',
                            'data-confirm' => 'Haqiqatan ham o‘chirmoqchimisiz?',
                            'data-method' => 'post',
                        ]);
                    },

                ],
                'contentOptions' => ['class' => 'text-nowrap'],
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
