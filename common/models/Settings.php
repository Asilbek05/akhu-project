<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string|null $contacts
 * @property string|null $location
 * @property string|null $socials
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Settings extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contacts', 'location', 'socials'], 'default', 'value' => null],
            [['contacts', 'socials', 'location', 'created_at', 'updated_at'], 'safe'],
            [['location'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contacts' => 'Contacts',
            'location' => 'Location',
            'socials' => 'Socials',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        if (is_array($this->contacts)) {
            $this->contacts = json_encode($this->contacts);
        }
        if (is_array($this->socials)) {
            $this->socials = json_encode($this->socials);
        }
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->contacts = json_decode($this->contacts, true);
        $this->socials = json_decode($this->socials, true);
    }



}
