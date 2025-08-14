<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $action
 * @property string|null $message
 * @property string|null $ip
 * @property string|null $user_agent
 * @property string $level
 * @property int $created_at
 *
 * @property User $user
 */
class Logs extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'integer'],
            [['action', 'created_at'], 'required'],
            [['message'], 'string'],
            [['action', 'ip', 'level'], 'string', 'max' => 255],
            [['user_agent'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Foydalanuvchi',
            'action' => 'Amal',
            'message' => 'Xabar',
            'ip' => 'IP manzil',
            'user_agent' => 'Brauzer',
            'level' => 'Daraja',
            'created_at' => 'Yaratilgan vaqt',
        ];
    }

    /**
     * Gets related User
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Qo'shish uchun helper
     *
     * @param string $action
     * @param string|null $message
     * @param string $level
     * @return bool
     */
    public static function add($action, $message = null, $level = 'info')
    {
        $log = new self();
        $log->user_id = Yii::$app->user->id ?? null;
        $log->action = $action;
        $log->message = $message;
        $log->level = $level;
        $log->ip = Yii::$app->request->userIP;
        $log->user_agent = Yii::$app->request->userAgent;
        $log->created_at = time();
        return $log->save(false);
    }
}
