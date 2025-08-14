<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class ChangePasswordForm extends Model
{
    public $old_password;
    public $new_password;
    public $confirm_password;

    public function rules()
    {
        return [
            [['old_password', 'new_password', 'confirm_password'], 'required'],
            [['old_password'], 'validateOldPassword'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'new_password'],
        ];
    }

    public function validateOldPassword($attribute)
    {
        $user = Yii::$app->user->identity;
        if (!$user || !$user->validatePassword($this->old_password)) {
            $this->addError($attribute, 'Eski parol noto‘g‘ri.');
        }
    }

    public function changePassword()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = Yii::$app->user->identity;
        $user->setPassword($this->new_password);
        return $user->save(false);
    }
}
