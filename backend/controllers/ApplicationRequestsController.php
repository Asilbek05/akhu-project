<?php

namespace backend\controllers;

use backend\components\AdminController;
use Yii;
use common\models\ApplicationRequests;
use common\models\ApplicationRequestsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ApplicationRequestsController extends AdminController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'set-status' => ['POST'],
                ],
            ],
        ];
    }

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

        $Count = (clone $baseQuery)->count();
        $viewCount = (clone $baseQuery)->andWhere(['status' => 1])->count();
        $noviewCount = (clone $baseQuery)->andWhere(['status' => 0])->count();

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
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $id = Yii::$app->request->post('id');
        $status = Yii::$app->request->post('status');

        if (!$id || $status === null) {
            return ['success' => false, 'message' => 'ID yoki status yuborilmadi'];
        }

        $model = ApplicationRequests::findOne($id);
        if (!$model) {
            return ['success' => false, 'message' => 'Xabar topilmadi'];
        }

        $model->status = (int)$status;
        if ($model->save(false)) {
            return ['success' => true];
        }

        return ['success' => false, 'message' => 'Saqlashda xato'];
    }

}
