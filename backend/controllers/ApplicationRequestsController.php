<?php

namespace backend\controllers;

use backend\components\AdminController;
use common\models\ApplicationReplies;
use Exception;
use Yii;
use common\models\ApplicationRequests;
use common\models\ApplicationRequestsSearch;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

class ApplicationRequestsController extends AdminController
{

    public function actionIndex()
    {
        $searchModel = new ApplicationRequestsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $statusFilter = $searchModel->status;
        $nameFilter = $searchModel->name;
        $phoneFilter = $searchModel->phone;

        $baseQuery = \common\models\ApplicationRequests::find();
        if ($nameFilter) {
            $baseQuery->andWhere(['like', 'name', $nameFilter]);
        }
        if ($phoneFilter) {
            $baseQuery->andWhere(['like', 'phone', $phoneFilter]);
        }

        $Count = 12; //(clone $baseQuery)->count();
        $viewCount =11; // (clone $baseQuery)->andWhere(['status' => 1])->count();
        $noviewCount = 13; // (clone $baseQuery)->andWhere(['status' => 0])->count();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'Count' => $Count,
            'viewCount' => $viewCount,
            'noviewCount' => $noviewCount,
        ]);
    }
    public function actionSetStatus()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $id = Yii::$app->request->post('id');
        $replyMessage = Yii::$app->request->post('reply_message');
        $status = 1;

        $userId = Yii::$app->user->identity->id ?? null;

        if (!$id || !$replyMessage) {
            return ['success' => false, 'message' => 'ID or reply message was not sent'];
        }

        if (!$userId) {
            return ['success' => false, 'message' => 'User is not authorized'];
        }

        $transaction = Yii::$app->db->beginTransaction();

        try {
            $requestModel = ApplicationRequests::findOne($id);
            if (!$requestModel) {
                throw new Exception('Message not found.');
            }

            $replyModel = ApplicationReplies::findOne(['request_id' => $id]);
            if (!$replyModel) {
                $replyModel = new ApplicationReplies();
                $replyModel->request_id = $id;
            }

            $replyModel->user_id = $userId;
            $replyModel->reply_message = $replyMessage;

            if (!$replyModel->save()) {
                $errors = json_encode($replyModel->getErrors());
                throw new Exception("Error saving reply: " . $errors);
            }

            $requestModel->status = $status;
            if (!$requestModel->save(false)) {
                $errors = json_encode($requestModel->getErrors());
                throw new Exception("Error saving message status: " . $errors);
            }

            // --- THIS PART IS NEW ---
            // Send email to the customer
            if (!empty($requestModel->email)) {
                $subject = "Response to your request";

                Yii::$app->mailer->compose('reply', [
                    'request' => $requestModel,
                    'replyMessage' => $replyMessage,
                ])
                    ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->name])
                    ->setTo($requestModel->email)
                    ->setSubject($subject)
                    ->send();
            }
            $transaction->commit();
            return ['success' => true];

        } catch (Exception $e) {
            $transaction->rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }




}
