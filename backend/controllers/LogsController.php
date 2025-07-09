<?php

namespace backend\controllers;

use backend\components\AdminController;
use common\models\LogsSearch;
use Yii;
use common\models\Logs;

use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class LogsController extends AdminController
{

    public function actionIndex($level = null)
    {
        $searchModel = new LogsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $level);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'level' => $level,
        ]);
    }



    public function actionView($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->user->identity->role !== 'superadmin' && $model->user_id !== Yii::$app->user->id) {
            throw new ForbiddenHttpException('Sizda huquq yo‘q.');
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', ['model' => $model]);
        }

        return $this->render('view', ['model' => $model]);
    }
    public function actionExport()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 'superadmin') {
            throw new ForbiddenHttpException('Sizda huquq yo‘q.');
        }

        $logs = Logs::find()->orderBy(['created_at' => SORT_DESC])->all();

        // Disable layout & rendering
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        Yii::$app->response->headers->set('Content-Disposition', 'attachment; filename="logs_export_' . date('Y-m-d_H-i') . '.csv"');

        // Clear output buffer
        if (ob_get_length()) ob_clean();
        $out = fopen('php://output', 'w');
        if ($out === false) {
            throw new \yii\web\ServerErrorHttpException('Cannot open output stream.');
        }

        // Header row
        fputcsv($out, ['ID', 'User', 'Action', 'Message', 'Level', 'IP', 'User Agent', 'Created At']);

        foreach ($logs as $log) {
            fputcsv($out, [
                $log->id,
                $log->user ? $log->user->username : 'System',
                $log->action,
                $log->message,
                $log->level,
                $log->ip,
                $log->user_agent,
                date('Y-m-d H:i', $log->created_at),
            ]);
        }

        fclose($out);
        Yii::$app->end();
    }

    protected function findModel($id)
    {
        if (($model = Logs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Sahifa topilmadi.');
    }
}
