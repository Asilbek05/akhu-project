<?php

namespace frontend\controllers;

use yii\web\NotFoundHttpException;

class ProgramsController extends \yii\web\Controller
{
    public function actionUndergraduate(){
        return $this->render('undergraduate');
    }
    public function actionArtificialIntelligence(){
        return $this->render('artificial-intelligence');
    }
    public function actionSoftwareEngineering(){
        return $this->render('software-engineering');
    }
    public function actionEngineeringOfDrone(){
        return $this->render('engineering-of-drone');
    }
    public function actionScholarshipDetails($slug)
    {
        if ($slug === '1-year-scholarships') {
            return $this->render('first-year-scholarships');
        } elseif ($slug === '4-year-scholarships') {
            return $this->render('fourth-year-scholarships');
        } else {
            throw new NotFoundHttpException('Sahifa topilmadi.');
        }
    }
    public function actionSteamSchool(){
        return $this->render('steam-school');
    }
}