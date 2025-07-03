<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

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
    public $background_image_file;

    public static function tableName()
    {
        return 'slider';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'), // DATETIME format
            ],
        ];
    }

    public function rules()
    {
        return [
            [['background_image', 'description', 'button_text', 'button_url'], 'required'],
            [['description'], 'string'],
            [['sort_order'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'button_text', 'button_url', 'background_image'], 'string', 'max' => 255],
            [['background_image_file'], 'file', 'extensions' => 'jpg, png, jpeg, gif', 'skipOnEmpty' => true],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'button_text' => 'Button Text',
            'button_url' => 'Button URL',
            'background_image' => 'Background Image',
            'background_image_file' => 'Background Image File',
            'sort_order' => 'Sort Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $maxSort = self::find()->max('sort_order');
                $this->sort_order = $maxSort !== null ? $maxSort + 1 : 1;
            }
            return true;
        }
        return false;
    }

}
