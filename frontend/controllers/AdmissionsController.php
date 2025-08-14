<?php

namespace frontend\controllers;

class AdmissionsController extends \yii\web\Controller
{
    public function actionAdmissionOverview(){
        return $this->render('admission-overview');
    }

    public function actionTuitionFees(){
        return $this->render('tuition-fees');
    }
    public function actionCalculator(){
        return $this->render('calculator');
    }
    public function actionApplyNow(){
        return $this->render('apply-now');
    }

}