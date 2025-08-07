<?php

namespace backend\controllers;

use backend\components\AdminController;
use common\models\Logs;
use common\models\LogsSearch;
use common\models\Slider;
use common\models\SliderSearch;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends AdminController
{

    /**
     * Lists all Slider models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws Exception
     */
    // frontend/controllers/SliderController.php
    public function actionCreate()
    {
        $model = new Slider();

        try {
            if ($model->load(Yii::$app->request->post())) {
                $file = UploadedFile::getInstance($model, 'background_image_file');

                if ($file) {
                    $dir = Yii::getAlias('@frontend/web/uploads/sliders/');
                    if (!is_dir($dir)) {
                        mkdir($dir, 0777, true);
                    }

                    $fileName = uniqid() . '.' . $file->extension;
                    if ($file->saveAs($dir . $fileName)) {
                        $model->background_image = '/uploads/sliders/' . $fileName;
                    } else {
                        Yii::$app->session->setFlash('error', 'Rasm yuklanmadi. Iltimos, qayta urinib ko‘ring.');
                        Logs::add('slider_create_error', 'Rasmni saqlashda xato yuz berdi', 'error');
                        return $this->redirect(['index']);
                    }
                }

                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Slayder muvaffaqiyatli yaratildi.');
                    Logs::add('slider_create', 'Slider yaratildi: ' . $model->name, 'create');
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Xatolik yuz berdi. Maʼlumotlar saqlanmadi.');
                    Logs::add('slider_create_error', 'Modelni saqlashda validatsiya xatosi: ' . json_encode($model->errors), 'error');
                    return $this->redirect(['index']);
                }
            }
        } catch (\Throwable $e) {
            Yii::$app->session->setFlash('error', 'Nomaʼlum server xatosi: ' . $e->getMessage());
            Logs::add('slider_create_error', 'Exception: ' . $e->getMessage(), 'error');
            throw $e;
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }






    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Slider::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('Slider topilmadi.');
        }

        $oldImage = $model->background_image;

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'background_image_file');

            if ($file) {
                // delete old image
                if (!empty($oldImage)) {
                    $oldFilePath = Yii::getAlias('@frontend/web') . $oldImage;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // save new image
                $dir = Yii::getAlias('@frontend/web/uploads/sliders/');
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }

                $fileName = uniqid() . '.' . $file->extension;
                if ($file->saveAs($dir . $fileName)) {
                    $model->background_image = '/uploads/sliders/' . $fileName;
                } else {
                    Yii::$app->session->setFlash('error', 'Rasmni yuklashda xatolik yuz berdi.');
                }
            } else {
                $model->background_image = $oldImage; // keep old image
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Slayder muvaffaqiyatli yangilandi.');
                Logs::add('slider-update', 'Slider yangilandi: ' . $model->name, 'update');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Xatolik yuz berdi. Maʼlumotlar yangilanmadi.');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }




    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $name = $model->name;
        $model->delete();

        Logs::add('slider-delete', "Slider o`chirildi: {$name}", 'delete');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */


    protected function findModel($id)
    {
        if (($model = Slider::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // actionMove // up, down
    public function actionMove($id, $direction)
    {
        $model = \common\models\Slider::findOne($id);
        if (!$model) return $this->redirect(['index']);

        $op = $direction === 'up' ? '<' : '>';
        $order = $direction === 'up' ? SORT_DESC : SORT_ASC;

        $neighbor = \common\models\Slider::find()
            ->where([$op, 'sort_order', $model->sort_order])
            ->orderBy(['sort_order' => $order])
            ->one();

        if ($neighbor) {
            $temp = $model->sort_order;
            $model->sort_order = $neighbor->sort_order;
            $neighbor->sort_order = $temp;

            $model->save(false);
            $neighbor->save(false);
        }

        return $this->redirect(['index']);
    }
}
