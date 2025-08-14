<?php

namespace frontend\controllers;

use common\models\ApplicationRequests;
use common\models\Settings;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\Response;
use Yii;
use yii\filters\VerbFilter;

class ContactController extends Controller
{
    /**
     * Renders the contact page and handles form submissions.
     */
    public function actionIndex()
    {
        $model = new ApplicationRequests();
        $settings = Settings::find()->one();

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->code = Yii::$app->security->generateRandomString(5);
            $model->status = 0;

            if ($model->save()) {
                Yii::$app->mailer->compose()
                    ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                    ->setTo($model->email)
                    ->setSubject('Your request has been accepted!')
                    ->setHtmlBody("
                        <p>Hello, <b>{$model->name}</b>!</p>
                        <p>Your request has been successfully received. We will contact you soon.</p>
                        <p>Please use the following code to check the status of your request:</p>
                        <h3><b>{$model->code}</b></h3>
                        <p>Sincerely,<br>Your team.</p>
                    ")
                    ->send();

                $successMessage = 'Your message has been sent. Your tracking code is: <b>' . Html::encode($model->code) . '</b>. Please save this code.';

                Yii::$app->session->setFlash('success', $successMessage);
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Please check the entered information.');
            }
        }

        return $this->render('index', [
            'model' => $model,
            'settings' => $settings,
        ]);
    }

    /**
     * AJAX method to check the status of a request
     */
    public function actionCheckStatus()
    {
        Yii::$app->response->format = Response::FORMAT_HTML;

        if (Yii::$app->request->isPost) {
            $code = Yii::$app->request->post('code');
            $application = ApplicationRequests::findOne(['code' => $code]);

            if ($application) {
                $replies = $application->getReplies()->orderBy(['created_at' => SORT_ASC])->all();

                return $this->renderPartial('_status_view', [
                    'application' => $application,
                    'replies' => $replies,
                ]);
            } else {
                return '<div class="alert alert-warning">No request found with that tracking code.</div>';
            }
        }

        return '';
    }
    public function beforeAction($action)
{
    if (Yii::$app->request->isPost) {
        $ip = Yii::$app->request->userIP;
        $cache = Yii::$app->cache;

        $key = 'contact_attempts_' . $ip;
        $attempts = $cache->get($key) ?: 0;

        if ($attempts >= 5) {
            Yii::$app->session->setFlash('error', 'Too many attempts, please try again later.');
            return $this->redirect(Yii::$app->request->referrer ?: ['/']);
        }

        $cache->set($key, $attempts + 1, 60);
    }

    return parent::beforeAction($action);
}
}