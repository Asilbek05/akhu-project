<?php

namespace backend\controllers;

use backend\components\AdminController;
use common\models\Leadership;
use common\models\LeadershipSections;
use common\models\LeadershipSectionsSearch;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LeadershipSectionsController implements the CRUD actions for LeadershipSections model.
 */
class LeadershipSectionsController extends AdminController
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
     * Lists all LeadershipSections models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LeadershipSectionsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LeadershipSections model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionManage($leadership_id)
    {
        $leadership = Leadership::findOne($leadership_id);
        if (!$leadership) {
            throw new NotFoundHttpException("Leadership not found.");
        }

        $newSection = new LeadershipSections();
        $newSection->leadership_id = $leadership_id;

        if (Yii::$app->request->isPost && $newSection->load(Yii::$app->request->post())) {
            if ($newSection->save()) {
                Yii::$app->session->setFlash('success', 'Section added successfully.');
                return $this->redirect(['manage', 'leadership_id' => $leadership_id]);
            }
        }

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => LeadershipSections::find()
                ->where(['leadership_id' => $leadership_id])
                ->orderBy(['sort_order' => SORT_ASC]),
            'pagination' => false,
        ]);

        return $this->render('manage', [
            'leadership' => $leadership,
            'newSection' => $newSection,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new LeadershipSections model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($leadership_id)
    {
        $model = new LeadershipSections();
        $model->leadership_id = $leadership_id;
        $maxSort = LeadershipSections::find()->where(['leadership_id' => $leadership_id])->max('sort_order');
        $model->sort_order = $maxSort + 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['manage', 'leadership_id' => $leadership_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LeadershipSections model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $leadership_id = $model->leadership_id;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['manage', 'leadership_id' => $leadership_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LeadershipSections model.
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
     * Finds the LeadershipSections model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LeadershipSections the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LeadershipSections::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
