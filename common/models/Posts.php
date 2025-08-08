<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Inflector;

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
    public $tags_array;
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
    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios['create'] = ['title', 'content', 'slug', 'images', 'user_id', 'tags_array', 'is_published'];
        $scenarios['update'] = ['title', 'content', 'slug', 'images', 'user_id', 'tags_array', 'is_published'];

        return $scenarios;
    }
    public function rules()
    {
        return [
            [['content'], 'default', 'value' => null],
            [['is_published'], 'boolean'],
            [['is_published'], 'default', 'value' => 0],
            [['user_id', 'title', 'slug'], 'required'],
            [['user_id'], 'integer'],
            [['content'], 'string'],
            ['tags_array', 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            ['images', 'required', 'on' => 'create'],
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
            'is_published' => 'Is Published',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'tags_array' => 'Tags',
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
    public function getImagesUrls()
    {
        $images = PostImages::find()->where(['post_id' => $this->id])->all();
        $urls = [];
        foreach ($images as $img) {
            $urls[] = Yii::$app->params['uploadBaseUrl'] . '/posts/' . $img->image;
        }
        return $urls;
    }
    public function getFirstImage()
    {
        return $this->hasOne(PostImages::class, ['post_id' => 'id'])->orderBy(['id' => SORT_ASC]);
    }

    public function getImagesPreviewConfig()
    {
        $images = PostImages::find()->where(['post_id' => $this->id])->all();
        $config = [];
        foreach ($images as $img) {
            $config[] = [
                'caption' => $img->image,
                'key' => $img->id,
                'url' => \yii\helpers\Url::to(['delete-image', 'id' => $img->id]),
            ];
        }
        return $config;
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

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])
            ->viaTable('{{%posts_tag}}', ['posts_id' => 'id']);
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->tags_array = $this->getTags()->select('name')->column();
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->isNewRecord || $this->isAttributeChanged('title')) {
            $this->slug = Inflector::slug($this->title);
        }

        if (Yii::$app->user && Yii::$app->user->id) {
            $this->user_id = Yii::$app->user->id;
        }

        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($this->tags_array !== null) {
            $this->saveTags($this->tags_array);
        }
    }

    private function saveTags($tags)
    {
        $this->unlinkAll('tags', true);

        if (is_array($tags)) {
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);
                if (empty($tagName)) {
                    continue;
                }

                $tag = Tag::findOne(['name' => $tagName]);

                if (!$tag) {
                    $tag = new Tag();
                    $tag->name = $tagName;
                    $tag->slug = Inflector::slug($tagName);

                    if (!$tag->save()) {
                        Yii::error('Yangi teg saqlashda xato: ' . json_encode($tag->errors), 'posts.afterSave');
                        throw new \Exception('Yangi teg saqlashda xato: ' . json_encode($tag->errors));
                    }
                }
                $this->link('tags', $tag);
            }
        }
    }

}
