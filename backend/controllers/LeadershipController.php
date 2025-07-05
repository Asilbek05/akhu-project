<?php

namespace backend\controllers;

use backend\components\AdminController;
use common\models\Leadership;
use common\models\LeadershipSearch;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * LeadershipController implements the CRUD actions for Leadership model.
 */
class LeadershipController extends AdminController
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
     * Lists all Leadership models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LeadershipSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Leadership model.
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
     * Creates a new Leadership model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Leadership();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
            if ($model->validate()) {
                $model->uploadPhoto();
                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Leadership created successfully.');
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Leadership::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Leadership topilmadi.');
        }

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {
            $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
            if ($model->validate()) {
                $model->uploadPhoto();
                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Leadership updated successfully.');
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', ['model' => $model]);
    }
    /**
     * Deletes an existing Leadership model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Leadership model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Leadership the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Leadership::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
