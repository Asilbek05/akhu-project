<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\User;
use backend\models\ChangePasswordForm;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'change-password'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = Yii::$app->user->identity;
        return $this->render('index', ['model' => $model]);
    }

    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            Yii::$app->session->setFlash('success', 'Parol muvaffaqiyatli yangilandi.');
            return $this->redirect(['index']);
        }

        return $this->render('change-password', ['model' => $model]);
    }
}
