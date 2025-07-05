<?php

namespace backend\controllers;

use backend\components\AdminController;
use common\models\Events;
use common\models\EventSchedule;
use common\models\EventScheduleSearch;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventScheduleController implements the CRUD actions for EventSchedule model.
 */
class EventScheduleController extends AdminController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all EventSchedule models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EventScheduleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    //manage
    public function actionManage($event_id)
    {
        $event = Events::findOne($event_id);
        if (!$event) {
            throw new NotFoundHttpException("Event not found.");
        }

        $schedules = EventSchedule::find()
            ->where(['event_id' => $event_id])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all();

        return $this->render('manage', [
            'event' => $event,
            'schedules' => $schedules,
        ]);
    }


    /**
     * Displays a single EventSchedule model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EventSchedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($event_id)
    {
        $model = new \common\models\EventSchedule();
        $model->event_id = $event_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['manage', 'event_id' => $event_id]);
        }

        return $this->render('create', ['model' => $model]);
    }


    /**
     * Updates an existing EventSchedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $event_id = $model->event_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['manage', 'event_id' => $event_id]);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing EventSchedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $event_id = $model->event_id;
        $model->delete();

        return $this->redirect(['manage', 'event_id' => $event_id]);
    }

    /**
     * Finds the EventSchedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return EventSchedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventSchedule::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
