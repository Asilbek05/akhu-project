<?php

namespace backend\components;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class AdminController extends Controller
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
                        'matchCallback' => function () {
                            return in_array(Yii::$app->user->identity->role, ['admin', 'superadmin']);
                        },
                    ],
                ],
            ],
        ];
    }
}
