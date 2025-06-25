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
            [['name', 'phone'], 'required'],
            [['message'], 'string'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 255],
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
            'phone' => 'Phone',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

}
