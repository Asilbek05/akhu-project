<?php
use common\models\User;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>

    <style>
        /* Dizaynning umumiy qoidalarini aniqlash */
        body {
            /* background-color: #f0f2f5; Agar orqa fon rangini o'zgartirmoqchi bo'lsangiz, shu yerda o'zgartirasiz. */
            color: #212529; /* Umumiy matn rangi */
        }

        /* ADD NEW USER BUTTON */
        .add-user-card {
            background-color: rgba(255, 255, 255, 0.5); /* Shafoflik berildi */
            backdrop-filter: blur(5px); /* Orqa fondagi elementlarni xiralashtiradi */
            border: 2px dashed rgba(0, 0, 0, 0.2); /* Yengilroq border */
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05); /* Yumshoq soya */
        }
        .add-user-card:hover {
            background-color: rgba(255, 255, 255, 0.8);
            border-color: #4e73df;
            box-shadow: 0 6px 16px rgba(78, 115, 223, 0.15);
            transform: translateY(-2px);
        }

        .add-user-card .add-icon i {
            font-size: 2.2rem;
            color: #4e73df;
            transition: color 0.3s;
        }
        .add-user-card:hover .add-icon i {
            color: #2e59d9;
        }

        .add-user-card .add-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: #212529; /* Qora fonda ham ko'rinadi */
        }

        /* USER CARD */
        .user-card {
            background-color: rgba(255, 255, 255, 0.5); /* Shafoflik berildi */
            backdrop-filter: blur(5px);
            border: 1px solid rgba(0,0,0,0.1); /* Yengilroq border */
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            transition: 0.2s;
        }
        .user-card:hover {
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-color: rgba(0,0,0,0.2);
        }

        /* MATN RANGLARI */
        .user-card .user-name {
            color: #212529; /* Asosiy matn uchun to'q rang */
        }
        .user-card .user-email {
            color: #6c757d; /* Kichik matn uchun kulrang */
        }

        /* ROLE BADGE */
        .role-badge {
            font-size: 0.7rem;
            padding: 0.25em 0.5em;
            border-radius: 12px;
            opacity: 0.9;
            color: white; /* Barcha badge'lar matni oq rangda bo'ladi */
        }

        /* ICON PILLS */
        .icon-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50px;
            font-size: 1rem;
            text-decoration: none;
            transition: 0.2s ease;
        }
        .edit-icon {
            background-color: rgba(78, 115, 223, 0.1); /* Yengil shaffof fon */
            color: #4e73df;
        }
        .edit-icon:hover {
            background-color: rgba(78, 115, 223, 0.25);
            color: #3d5ab3;
        }
        .delete-icon {
            background-color: rgba(231, 76, 60, 0.1); /* Yengil shaffof fon */
            color: #e74c3c;
        }
        .delete-icon:hover {
            background-color: rgba(231, 76, 60, 0.25);
            color: #c0392b;
        }
    </style>

    <div class="container py-5">
        <?php if (Yii::$app->user->identity->role === 'superadmin'): ?>
            <div class="row justify-content-center mb-4">
                <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                    <div class="add-user-card text-center" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <div class="card-body p-4 d-flex flex-column align-items-center justify-content-center">
                            <div class="add-icon mb-3">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <h5 class="add-title mb-2">Yangi foydalanuvchi qo‘shish</h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <h1 class="text-center mb-4"><?= Html::encode($this->title) ?></h1>

        <div class="row g-3">
            <?php foreach ($users as $user): ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="user-card p-3 rounded-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-semibold user-name"><?= Html::encode($user->username) ?></span>
                                <span class="badge role-badge text-white bg-<?= $user->role === 'superadmin' ? 'danger' : ($user->role === 'admin' ? 'primary' : 'secondary') ?>">
                                <?= strtoupper($user->role) ?>
                            </span>
                            </div>
                            <div class="d-flex gap-2">
                                <?= Html::button('<i class="bi bi-pencil"></i>', [
                                        'class' => 'icon-pill edit-icon btn-edit-user',
                                        'title' => 'Tahrirlash',
                                        'data-id' => $user->id
                                ]) ?>
                                <?php if ($user->role !== 'superadmin'): ?>
                                    <?= Html::a('<i class="bi bi-trash"></i>', ['delete', 'id' => $user->id], [
                                            'class' => 'icon-pill delete-icon',
                                            'data-method' => 'post',
                                            'data-confirm' => 'Userni o‘chirishni tasdiqlaysizmi?',
                                    ]) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="text-muted small user-email"><?= Html::encode($user->email) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
// CREATE MODAL
$model = new User();
Modal::begin([
        'title' => '<i class="bi bi-person-plus me-2 text-primary"></i> Yangi foydalanuvchi',
        'id' => 'addUserModal',
        'size' => Modal::SIZE_LARGE,
        'options' => ['tabindex' => false],
]);
$form = ActiveForm::begin([
        'action' => ['user/create'],
        'id' => 'create-user-form',
]);
echo $this->render('_form', [
        'model' => $model,
        'form' => $form,
        'isUpdate' => false,
]);
echo Html::submitButton('<i class="bi bi-check-circle me-1"></i> Yaratish', ['class' => 'btn btn-success mt-3']);
ActiveForm::end();
Modal::end();
?>

<?php
// UPDATE MODAL
Modal::begin([
        'id' => 'updateUserModal',
        'title' => 'Foydalanuvchini tahrirlash',
        'size' => Modal::SIZE_LARGE,
]);
?>
    <div id="updateUserContent">Yuklanmoqda...</div>
<?php Modal::end(); ?>

<?php
$this->registerJs(<<<JS
$(document).on('click', '.btn-edit-user', function () {
    const userId = $(this).data('id');
    $('#updateUserModal').modal('show');
    $('#updateUserContent').html('<div class="p-3 text-center text-muted">Yuklanmoqda...</div>');
    $.get('/user/load-update-form?id=' + userId, function(data) {
        $('#updateUserContent').html(data);
    });
});
JS);
?>