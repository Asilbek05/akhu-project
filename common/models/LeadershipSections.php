<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leadership_sections".
 *
 * @property int $id
 * @property int $leadership_id
 * @property string $title
 * @property string|null $content
 * @property int|null $sort_order
 *
 * @property Leadership $leadership
 */
class LeadershipSections extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leadership_sections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'default', 'value' => null],
            [['sort_order'], 'default', 'value' => 0],
            [['leadership_id', 'title'], 'required'],
            [['leadership_id', 'sort_order'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['leadership_id'], 'exist', 'skipOnError' => true, 'targetClass' => Leadership::class, 'targetAttribute' => ['leadership_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'leadership_id' => 'Leadership ID',
            'title' => 'Title',
            'content' => 'Content',
            'sort_order' => 'Sort Order',
        ];
    }

    /**
     * Gets query for [[Leadership]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLeadership()
    {
        return $this->hasOne(Leadership::class, ['id' => 'leadership_id']);
    }

    public function beforeValidate()
    {
        if ($this->isNewRecord && $this->sort_order === null) {
            $maxSort = self::find()->where(['leadership_id' => $this->leadership_id])->max('sort_order');
            $this->sort_order = $maxSort + 1;
        }
        return parent::beforeValidate();
    }
}
