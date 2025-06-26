<?php

namespace backend\controllers;

use common\models\PostImages;
use common\models\Posts;
use common\models\PostsSearch;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
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
        $model = new Posts();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->isGuest ? 1 : Yii::$app->user->id;
            $model->slug = \yii\helpers\Inflector::slug($model->title);

            if ($model->save()) {
                $images = UploadedFile::getInstances($model, 'images');

                $uploadDir = Yii::getAlias('@frontend/web/uploads/posts/');
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }

                foreach ($images as $img) {
                    $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $img->extension;
                    $uploadPath = $uploadDir . $fileName;

                    if ($img->saveAs($uploadPath)) {
                        $imageModel = new PostImages();
                        $imageModel->post_id = $model->id;
                        $imageModel->image = $fileName;
                        $imageModel->save();
                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
            throw new NotFoundHttpException('Post not found.');
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->isGuest ? 1 : Yii::$app->user->id;

            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = \yii\helpers\Inflector::slug($model->title);
            }

            if ($model->save()) {
                $images = UploadedFile::getInstances($model, 'images');

                if (!empty($images)) {
                    // 1. Eski rasm fayllarini papkadan o‘chiramiz
                    $oldImages = PostImages::find()->where(['post_id' => $model->id])->all();
                    foreach ($oldImages as $oldImage) {
                        $filePath = Yii::getAlias('@frontend/web/uploads/posts/') . $oldImage->image;
                        if (file_exists($filePath)) {
                            @unlink($filePath);
                        }
                    }

                    PostImages::deleteAll(['post_id' => $model->id]);

                    $uploadDir = Yii::getAlias('@frontend/web/uploads/posts/');
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0775, true);
                    }

                    foreach ($images as $img) {
                        $fileName = time() . '_' . Yii::$app->security->generateRandomString(8) . '.' . $img->extension;
                        $uploadPath = $uploadDir . $fileName;

                        if ($img->saveAs($uploadPath)) {
                            $imageModel = new PostImages();
                            $imageModel->post_id = $model->id;
                            $imageModel->image = $fileName;
                            $imageModel->save();
                        }
                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
}
