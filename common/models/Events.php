<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $title
 * @property string|null $location
 * @property string $start_date
 * @property string|null $end_date
 * @property string|null $time
 * @property string|null $description
 * @property string|null $poster
 * @property int $views
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property EventSchedule[] $eventSchedules
 */
class Events extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    self::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location', 'end_date', 'time', 'description'], 'default', 'value' => null],
            [['views'], 'default', 'value' => 0],
            [['title', 'start_date'], 'required'],
            [['start_date', 'end_date', 'time', 'created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['views'], 'integer'],
            [['title', 'location'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'location' => 'Location',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'time' => 'Time',
            'description' => 'Description',
            'views' => 'Views',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[EventSchedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventSchedules()
    {
        return $this->hasMany(EventSchedule::class, ['event_id' => 'id']);
    }


}
