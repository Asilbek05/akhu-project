<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "application_requests".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $message 
 * @property int|null $status
 * @property string|null $created_at
 */
class ApplicationRequests extends \yii\db\ActiveRecord
{

    const STATUS_PENDING = 0;
    const STATUS_REVIEWED = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application_requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 0],
            [['name', 'phone','email'], 'required'],
            [['message'], 'string'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'phone','email'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 32],
            ['email', 'email'],
            ['code', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'code' => 'Code',
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->code = Yii::$app->security->generateRandomString(5);
            }
            return true;
        }
        return false;
    }
    public function getReply()
    {
        return $this->hasOne(ApplicationReplies::class, ['request_id' => 'id']);
    }
    public function getReplies()
    {
        // 'request_id' - bu sizning ApplicationReplies jadvalingizdagi ustun nomi
        // 'id' - bu ApplicationRequests jadvalidagi ustun nomi
        return $this->hasMany(ApplicationReplies::class, ['request_id' => 'id']);
    }

}