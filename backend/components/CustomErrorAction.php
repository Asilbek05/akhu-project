<?php

namespace backend\components;

use yii\web\ErrorAction;

class CustomErrorAction extends ErrorAction
{
    public $layout = 'blank';

    public function run()
    {
        \Yii::$app->controller->layout = $this->layout;
        return parent::run();
    }
}
