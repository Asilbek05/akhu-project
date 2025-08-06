<?php

namespace frontend\controllers;

use common\models\ApplicationRequests;
use common\models\Settings;
use Yii;
use yii\web\Controller;

class ContactController extends Controller
{
    /**
     * Renders the contact page and saves the form data to the database.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new ApplicationRequests();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Thank you for contacting us. Your request has been successfully submitted.');

            // Xabarni email orqali yuborishni istasangiz, bu qismni qo'shishingiz mumkin:
            // Yii::$app->mailer->compose()
            //    ->setTo(Yii::$app->params['adminEmail'])
            //    ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            //    ->setSubject('New Application Request')
            //    ->setTextBody("New request from {$model->name} ({$model->phone}). Message: {$model->message}")
            //    ->send();

            return $this->refresh();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}