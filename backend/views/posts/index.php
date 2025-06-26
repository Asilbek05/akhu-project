<?php

use common\models\Posts;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PostsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;



Modal::begin([
    'id' => 'infoModal',
    'title' => 'Post Qo‘llanmasi',
]);

echo <<<HTML
    <div style="line-height:1.6">
        <p>
            Ushbu bo‘lim orqali siz <strong>yangiliklar, maqolalar yoki blog postlar</strong>ini yaratishingiz mumkin.
        </p>
        <ul>
            <li><strong>Sarlavha (Title):</strong> Postning asosiy nomi, foydalanuvchiga birinchi ko‘rinadigan matn.</li>
            <li><strong>Tavsif (Content):</strong> Postning batafsil matni yoki mazmuni.</li>
            <li><strong>Slug:</strong> Post URL manzilida chiqadigan qisqa nom. Agar kiritilmasa, sarlavhadan avtomatik yaratiladi.</li>
            <li><strong>Rasmlar:</strong> Bir nechta rasm tanlashingiz mumkin. Har bir post uchun maxsus galereya shakllanadi.</li>
            <li><strong>Holat (Is Published):</strong> Bu post foydalanuvchilarga ochiq yoki yo‘qligini belgilaydi (1 – ochiq, 0 – yashirin).</li>
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

<div class="flex-fill text-center">
    <?= Html::button('<i class="bi bi-info-circle me-1"></i> Qo‘llanma', [
        'class' => 'btn btn-outline-light btn-lg px-4',
        'data-bs-toggle' => 'modal',
        'data-bs-target' => '#infoModal'
    ]) ?>
</div>

<!-- Yangi slider tugmasi -->
<div>
    <?= Html::a('<i class="bi bi-plus-circle me-1"></i> Yangi slider', ['create'], [
        'class' => 'btn btn-primary btn-lg shadow-sm px-4',
    ]) ?>
</div>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'user_id',
                'label' => 'Creator',
                'value' => function ($model) {
                    return $model->user->username ?? '(nomalum)';
                }
            ],
            'title',
            'slug',

            'content:ntext',
            //'image',
            //'is_published',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="bi bi-eye"></i>', $url, [
                            'class' => 'btn btn-sm btn-info me-1',
                            'title' => 'Ko‘rish',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<i class="bi bi-pencil"></i>', $url, [
                            'class' => 'btn btn-sm btn-warning me-1',
                            'title' => 'Tahrirlash',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="bi bi-trash"></i>', $url, [
                            'class' => 'btn btn-sm btn-secondary',
                            'title' => 'O‘chirish',
                            'data-confirm' => 'Haqiqatan ham o‘chirmoqchimisiz?',
                            'data-method' => 'post',
                        ]);
                    },

                ],
                'contentOptions' => ['class' => 'text-nowrap'],
                'urlCreator' => function ($action, Posts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            //ispublished -->start
            [
                'attribute' => 'is_published',
                'format' => 'raw',
                'label' => 'Holati',
                'value' => function ($model) {
                    $isActive = $model->is_published;
                    $badgeClass = $isActive ? 'bg-success' : 'bg-secondary';
                    $text = $isActive ? 'Faol' : 'Nofaol';
                    $tooltip = $isActive ? 'Bosib nofaol qilish' : 'Bosib faollashtirish';
                    $icon = $isActive ? 'bi-toggle-on' : 'bi-toggle-off';

                    return Html::a(
                        "<span class='badge $badgeClass p-2'>
                <i class='bi $icon me-1'></i> $text
             </span>",
                        ['toggle-status', 'id' => $model->id],
                        [
                            'data-method' => 'post',
                            'data-pjax' => '1',
                            'title' => $tooltip,
                            'aria-label' => $tooltip,
                            'style' => 'text-decoration: none;',
                        ]
                    );
                },
                'contentOptions' => ['class' => 'text-center'],
            ],

        ],
    ]); ?>
<div>
    <?= Html::a('<i class="bi bi-plus-circle me-1"></i> Yangi slider', ['create'], [
        'class' => 'btn btn-primary btn-lg shadow-sm px-4',
    ]) ?>
</div>


</div>
