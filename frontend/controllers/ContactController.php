<?php

namespace frontend\controllers;

use common\models\ApplicationRequests;
use yii\web\Controller;
use yii\web\Response;
use Yii;

class ContactController extends Controller
{
    /**
     * AJAX method to check the status of a request
     */
    public function actionCheckStatus()
    {
        Yii::$app->response->format = Response::FORMAT_HTML;

        if (Yii::$app->request->isPost) {
            $code = Yii::$app->request->post('code');
            if ($code) {
                $request = ApplicationRequests::findOne(['code' => $code]);

                if ($request) {
                    $statusText = '';
                    $badgeClass = '';

                    switch ($request->status) {
                        case 1:
                            $statusText = 'New';
                            $badgeClass = 'bg-info';
                            break;
                        case 2:
                            $statusText = 'Under Review';
                            $badgeClass = 'bg-warning';
                            break;
                        case 3:
                            $statusText = 'Approved';
                            $badgeClass = 'bg-success';
                            break;
                        case 4:
                            $statusText = 'Rejected';
                            $badgeClass = 'bg-danger';
                            break;
                        default:
                            $statusText = 'Unknown';
                            $badgeClass = 'bg-secondary';
                            break;
                    }

                    return "
                        <div class='card p-3 shadow-sm'>
                            <ul class='list-group list-group-flush'>
                                <li class='list-group-item'>
                                    <strong>Status:</strong> <span class='badge {$badgeClass}'>{$statusText}</span>
                                </li>
                                <li class='list-group-item'>
                                    <strong>Submitted On:</strong> {$request->created_at}
                                </li>
                                <li class='list-group-item'>
                                    <strong>Name:</strong> {$request->name}
                                </li>
                                <li class='list-group-item'>
                                    <strong>Email:</strong> {$request->email}
                                </li>
                                <li class='list-group-item'>
                                    <strong>Message:</strong> {$request->message}
                                </li>
                            </ul>
                        </div>
                    ";
                } else {
                    return '<div class="alert alert-warning">No tracking code found. Please check your code and try again.</div>';
                }
            }
        }
        return '<div class="alert alert-danger">An error occurred while checking the request.</div>';
    }

    /**
     * Contact page
     */
    public function actionIndex()
    {
        $model = new ApplicationRequests();
        $settings = \common\models\Settings::find()->one();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $model->code = Yii::$app->security->generateRandomString(5);
                $model->save(false);

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

                $flashMessage = "Your message has been sent. Your tracking code is: <b>{$model->code}</b>. Please save this code.";
                Yii::$app->session->setFlash('success', $flashMessage);
                return $this->refresh();
            }
        }

        return $this->render('index', [
            'model' => $model,
            'settings' => $settings,
        ]);
    }
}