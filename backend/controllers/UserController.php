<?php

namespace backend\controllers;

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
                'only' => ['index', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            $user = Yii::$app->user->identity;
                            return $user && in_array($user->role, ['admin', 'superadmin']);
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
                return $this->redirect(['index']);
            }
        }

        Yii::$app->session->setFlash('error', 'Failed to create user.');
        return $this->redirect(['index']);
    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->role === 'superadmin' && Yii::$app->user->identity->role !== 'superadmin') {
            throw new \yii\web\ForbiddenHttpException('Siz superadminni o‘zgartira olmaysiz.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->role === 'superadmin') {
            throw new \yii\web\ForbiddenHttpException('Superadmin foydalanuvchisini o‘chirish mumkin emas.');
        }

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
