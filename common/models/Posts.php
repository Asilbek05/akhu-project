<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
    public $images;

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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public function rules()
    {
        return [
            [['content', 'image'], 'default', 'value' => null],
            [['is_published'], 'boolean'],
            [['is_published'], 'default', 'value' => 0],
            [['user_id', 'title', 'slug'], 'required'],
            [['user_id'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['images'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10],
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
//
//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            if (Yii::$app->user && Yii::$app->user->id) {
//                $this->user_id = Yii::$app->user->id;
//            }
//        }
//        if (parent::beforeSave($insert)) {
//            if (empty($this->slug)) {
//                $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $this->title);
//                $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
//                $slug = strtolower(trim($slug, '-'));
//                $this->slug = $slug;
//            }
//            return true;
//        }
//        return false;
//    }

}
