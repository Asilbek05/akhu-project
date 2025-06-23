<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $button_text
 * @property string|null $button_url
 * @property string|null $background_image
 * @property int|null $sort_order
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Slider extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'button_text', 'button_url', 'background_image'], 'default', 'value' => null],
            [['sort_order'], 'default', 'value' => 0],
            [['name'], 'required'],
            [['description'], 'string'],
            [['sort_order'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'button_text', 'button_url', 'background_image'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'button_text' => 'Button Text',
            'button_url' => 'Button Url',
            'background_image' => 'Background Image',
            'sort_order' => 'Sort Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
