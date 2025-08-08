<?php

namespace frontend\controllers;

use common\models\Events;
use common\models\Posts;

class EventsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $events = Events::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        return $this->render('index', [
            'events' => $events
        ]);
    }
}