<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property string|null $image
 * @property int|null $is_published
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property PostImages[] $postImages
 * @property User $user
 */
class Posts extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'image'], 'default', 'value' => null],
            [['is_published'], 'default', 'value' => 1],
            [['user_id', 'title', 'slug'], 'required'],
            [['user_id', 'is_published'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'image'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'content' => 'Content',
            'image' => 'Image',
            'is_published' => 'Is Published',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[PostImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostImages()
    {
        return $this->hasMany(PostImages::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
