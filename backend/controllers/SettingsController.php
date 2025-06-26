<?php

namespace backend\controllers;

use Yii;
use common\models\Settings;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SettingsController extends Controller
{
    public function actionIndex()
    {
        $model = Settings::findOne(1);
        if (!$model) {
            throw new NotFoundHttpException('Sozlamalar topilmadi.');
        }
        return $this->render('index', ['model' => $model]);
    }

    public function actionUpdate($section)
    {
        $model = Settings::findOne(1);
        if (!$model) {
            throw new NotFoundHttpException('Sozlamalar topilmadi.');
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Ma’lumotlar yangilandi.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'section' => $section,
        ]);
    }
}