<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class PostsTag extends ActiveRecord
{
    public static function tableName()
    {
        return 'posts_tag';
    }

    public function rules()
    {
        return [
            [['posts_id', 'tag_id'], 'required'],
            [['posts_id', 'tag_id'], 'integer'],
            [['posts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::class, 'targetAttribute' => ['posts_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::class, 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'posts_id' => 'Posts ID',
            'tag_id' => 'Tag ID',
        ];
    }

    public function getPost()
    {
        return $this->hasOne(Posts::class, ['id' => 'posts_id']);
    }

    public function getTag()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']);
    }
}
