<?php
use common\models\User;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container py-5">
    <!-- Yangi foydalanuvchi modal -->
    <?php if (Yii::$app->user->identity->role === 'superadmin'): ?>
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                <div class="add-user-card text-center" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <div class="card-body p-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="add-icon mb-3">
                            <i class="bi bi-plus-circle-fill"></i>
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
                            <span class="fw-semibold"><?= Html::encode($user->username) ?></span>
                            <span class="badge role-badge bg-<?= $user->role === 'superadmin' ? 'danger' : ($user->role === 'admin' ? 'primary' : 'secondary') ?>">
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
                    <div class="text-muted small"><?= Html::encode($user->email) ?></div>
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


<style>
    /* ADD NEW USER BUTTON */
    .add-user-card {
        background-color: #f8f9fc;
        border: 2px dashed #cbd5e0;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .add-user-card:hover {
        background-color: #ffffff;
        border-color: #4e73df;
        box-shadow: 0 6px 12px rgba(78, 115, 223, 0.1);
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
        color: #4e73df;
    }

    .add-user-card .add-subtext {
        font-size: 0.9rem;
        color: #6c757d;
        max-width: 80%;
        line-height: 1.3;
    }
    /* USER CARD */
    .user-card {
        background-color: #fff;
        border: 1px solid #e6e6e6;
        box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        transition: 0.2s;
    }
    .user-card:hover {
        box-shadow: 0 8px 16px rgba(0,0,0,0.05);
        border-color: #d0d0d0;
    }

    /* ROLE BADGE */
    .role-badge {
        font-size: 0.7rem;
        padding: 0.25em 0.5em;
        border-radius: 12px;
        opacity: 0.9;
    }


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
        background-color: #e9f3ff;
        color: #4e73df;
    }
    .edit-icon:hover {
        background-color: #d0e7ff;
        color: #3d5ab3;
    }
    .delete-icon {
        background-color: #ffe9e9;
        color: #e74c3c;
    }
    .delete-icon:hover {
        background-color: #ffd0d0;
        color: #c0392b;
    }

</style>