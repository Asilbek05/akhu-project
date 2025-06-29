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
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    self::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function() {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }

    public $photoFile;

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
            [['photoFile'], 'required', 'on' => 'create'],
            [['photoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', ],

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

    public function uploadPhoto()
    {
        if ($this->photoFile) {
            $dir = Yii::getAlias('@frontend/web/uploads/leadership/');
            if (!is_dir($dir)) {
                mkdir($dir, 0775, true);
            }

            $filename = uniqid() . '.' . $this->photoFile->extension;
            $path = $dir . $filename;

            if ($this->photoFile->saveAs($path)) {
                $this->photo = '/uploads/leadership/' . $filename;
                return true;
            }
        }

        return true;
    }



    public function beforeSave($insert)
    {
        if ($insert && empty($this->sort_order)) {
            $max = self::find()->max('sort_order');
            $this->sort_order = $max + 1;
        }
        return parent::beforeSave($insert);
    }

}
