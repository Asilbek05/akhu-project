<?php

namespace backend\controllers;

use common\models\Logs;
use Yii;
use common\models\User;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'denyCallback' => function ($rule, $action) {
                    Yii::$app->user->logout();
                    return Yii::$app->response->redirect(['site/login']);
                },
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if (in_array($action->id, ['delete', 'create'])) {
                                return Yii::$app->user->identity->role === 'superadmin';
                            }
                            return in_array(Yii::$app->user->identity->role, ['admin', 'superadmin']);
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $users = User::find()->all();

        return $this->render('index', [
            'users' => $users,
        ]);
    }
    public function actionCreate()
    {
        $model = new \common\models\User();
        $model = new User(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {
            $model->status = \common\models\User::STATUS_ACTIVE;
            $model->created_at = time();
            $model->updated_at = time();
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            $model->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'User successfully created.');
                Logs::add('user-create', 'User yaratildi: ' . $model->username, 'create');

                return $this->redirect(['index']);
            }
        }

        Yii::$app->session->setFlash('error', 'Failed to create user.');
        return $this->redirect(['index']);
    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->role === 'superadmin' && Yii::$app->user->identity->role !== 'superadmin') {
            throw new \yii\web\ForbiddenHttpException('Siz superadminni o‘zgartira olmaysiz.');
        }

        if ($model->load(Yii::$app->request->post())) {
            if (!empty($model->password)) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            }

            $model->updated_at = time();

            if ($model->save(false)) {
                Logs::add('user-update', 'User tahrirlandi: ' . $model->username, 'update');
                Yii::$app->session->setFlash('success', 'Foydalanuvchi muvaffaqiyatli tahrirlandi.');

                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionLoadUpdateForm($id)
    {
        $model = $this->findModel($id);

        return $this->renderAjax('_update_form_wrapper', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->role === 'superadmin') {
            throw new \yii\web\ForbiddenHttpException('Superadmin foydalanuvchisini o‘chirish mumkin emas.');
        }
        Logs::add('user-delete', 'User o`chirildi: ' . $model->username, 'delete');
        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionChangePassword($id)
    {
        $model = $this->findModel($id);

        $currentUser = Yii::$app->user->identity;

        // Only superadmin or the user themself can change the password
        if ($currentUser->id !== $model->id && $currentUser->role !== 'superadmin') {
            throw new \yii\web\ForbiddenHttpException('You are not allowed to change this user\'s password.');
        }

        $model->scenario = 'changePassword';

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->setPassword($model->password_hash);
            $model->generateAuthKey();
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Password changed successfully.');
                Logs::add('user-password', 'Parol o`zgartirildi: ' . $model->username, 'update');

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Foydalanuvchi topilmadi.');
    }

}
