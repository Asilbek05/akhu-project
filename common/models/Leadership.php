<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leadership".
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $photo
 * @property int|null $sort_order
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property LeadershipSections[] $leadershipSections
 */
class Leadership extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leadership';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'photo'], 'default', 'value' => null],
            [['sort_order'], 'default', 'value' => 0],
            [['name', 'position'], 'required'],
            [['sort_order'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'position', 'email', 'phone', 'photo'], 'string', 'max' => 255],
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
            'position' => 'Position',
            'email' => 'Email',
            'phone' => 'Phone',
            'photo' => 'Photo',
            'sort_order' => 'Sort Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[LeadershipSections]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeadershipSections()
    {
        return $this->hasMany(LeadershipSections::class, ['leadership_id' => 'id']);
    }

}
