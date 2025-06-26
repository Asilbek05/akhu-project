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

    public function actionUpdateSection($id, $section)
    {
        $model = Settings::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("Sozlamalar topilmadi.");
        }

        if ($model->load(Yii::$app->request->post())) {
            switch ($section) {
                case 'contacts':
                    $model->contacts = Yii::$app->request->post('Settings')['contacts'];
                    break;
                case 'location':
                    $model->location = Yii::$app->request->post('Settings')['location'];
                    break;
                case 'socials':
                    $model->socials = Yii::$app->request->post('Settings')['socials'];
                    break;
                default:
                    throw new BadRequestHttpException('Noto‘g‘ri bo‘lim.');
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Sozlama yangilandi');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'section' => $section,
        ]);
    }

}