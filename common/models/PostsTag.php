<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "posts_tag".
 *
 * @property int $posts_id
 * @property int $tag_id
 *
 * @property Posts $posts
 * @property Tag $tag
 */
class PostsTag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posts_id', 'tag_id'], 'required'],
            [['posts_id', 'tag_id'], 'integer'],
            [['posts_id', 'tag_id'], 'unique', 'targetAttribute' => ['posts_id', 'tag_id']],
            [['posts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::class, 'targetAttribute' => ['posts_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::class, 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'posts_id' => 'Posts ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasOne(Posts::class, ['id' => 'posts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']);
    }
}