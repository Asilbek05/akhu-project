<?php

namespace common\models;

use common\models\ApplicationRequests;
use common\models\User;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "application_replies".
 *
 * @property int $id
 * @property int $request_id
 * @property int $user_id
 * @property string $reply_message
 * @property int $created_at
 *
 * @property ApplicationRequests $request
 * @property User $user
 */
class ApplicationReplies extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return '{{%application_replies}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id', 'user_id', 'reply_message'], 'required'],
            [['request_id', 'user_id', 'created_at'], 'integer'],
            [['reply_message'], 'string'],
            [['created_at'], 'safe'],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => ApplicationRequests::class, 'targetAttribute' => ['request_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'So‘rov ID',
            'user_id' => 'Javob beruvchi ID',
            'reply_message' => 'Javob matni',
            'created_at' => 'Yuborilgan sana',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(ApplicationRequests::class, ['id' => 'request_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at'],
                ],

                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }
}