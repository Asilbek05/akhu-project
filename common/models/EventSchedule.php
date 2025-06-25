<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_schedule".
 *
 * @property int $id
 * @property int $event_id
 * @property string $start_time
 * @property string|null $end_time
 * @property string $title
 * @property string|null $description
 * @property int|null $sort_order
 *
 * @property Events $event
 */
class EventSchedule extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['end_time', 'description'], 'default', 'value' => null],
            [['sort_order'], 'default', 'value' => 0],
            [['event_id', 'start_time', 'title'], 'required'],
            [['event_id', 'sort_order'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::class, 'targetAttribute' => ['event_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'title' => 'Title',
            'description' => 'Description',
            'sort_order' => 'Sort Order',
        ];
    }

    /**
     * Gets query for [[Event]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Events::class, ['id' => 'event_id']);
    }

}
