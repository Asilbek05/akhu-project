<?php

namespace backend\controllers;

use backend\components\AdminController;
use common\models\PostImages;
use common\models\Posts;
use common\models\PostsSearch;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends AdminController
{
    /**
     * Lists all Posts models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
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
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionCreate()
    {
        $model = new Posts(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->isGuest ? 1 : Yii::$app->user->id;
            $model->slug = \yii\helpers\Inflector::slug($model->title);

            if ($model->validate() && $model->save()) {
                $this->saveImages($model);
                Yii::$app->session->setFlash('success', 'Post yaratildi!');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', ['model' => $model]);
    }




    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Posts::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Post topilmadi.');
        }

        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->isGuest ? 1 : Yii::$app->user->id;

            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = \yii\helpers\Inflector::slug($model->title);
            }

            if ($model->validate() && $model->save()) {
                $this->saveImages($model);
                Yii::$app->session->setFlash('success', 'Post yangilandi!');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', ['model' => $model]);
    }

    protected function saveImages($model)
    {
        $images = UploadedFile::getInstances($model, 'images');
        $uploadDir = Yii::getAlias('@frontend/web/uploads/posts/');
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        foreach ($images as $img) {
            $fileName = uniqid('post_') . '.' . $img->extension;
            if ($img->saveAs($uploadDir . $fileName)) {
                $imageModel = new PostImages();
                $imageModel->post_id = $model->id;
                $imageModel->image = $fileName;
                $imageModel->save();
            }
        }
    }



    /**
     * Deletes an existing Posts model.
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
    public function actionToggleStatus($id)
    {
        $model = Posts::findOne($id);
        if ($model) {
            $model->is_published = !$model->is_published;
            $model->save(false);
        }

        if (Yii::$app->request->isPjax) {
            return $this->renderPartial('_grid', [
                'dataProvider' => $this->getDataProvider(),
                'searchModel' => $this->getSearchModel(),
            ]);
        }

        return $this->redirect(['index']);
    }



    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDeleteImage($id)
    {
        $image = PostImages::findOne($id);
        if (!$image) {
            throw new NotFoundHttpException('Rasm topilmadi.');
        }

        $filePath = Yii::getAlias('@frontend/web/uploads/posts/') . $image->image;
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $image->delete();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['success' => true];
    }
}
