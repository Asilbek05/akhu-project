<?php

namespace frontend\controllers;

class AboutController extends \yii\web\Controller
{
    public function actionAboutUs(){
        return $this->render('about-us');
    }
    public function actionVisionMission(){
        return $this->render('vision-mission');
    }
    public function actionPresidentialDecree(){
        return $this->render('presidential-decree');
    }
    public function actionLeadership(){
        return $this->render('leadership');
    }
    public function actionGovernancePartners(){
        return $this->render('governance-partners');
    }
}
