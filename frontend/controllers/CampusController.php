<?php

namespace frontend\controllers;

class CampusController extends \yii\web\Controller
{
    public function actionFutureCampus(){
        return $this->render('future-campus');
    }
    public function actionLocationFacilities(){
        return $this->render('location-facilities');
    }
    public function actionStudentLife(){
        return $this->render('student-life');
    }
}