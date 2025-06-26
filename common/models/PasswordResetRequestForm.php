<?php
// models/PasswordResetRequestForm.php

namespace common\models;

use yii\base\Model;


class PasswordResetRequestForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => User::className(),
                'targetAttribute' => 'email',
                'message' => 'There is no user with this email address.'
            ],
        ];
    }

    public function sendEmail()
    {
        /** @var User $user */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }

        // create and send token logic...

        return true;
    }
}
