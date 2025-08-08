<?php

namespace frontend\controllers;

use common\models\Posts;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

/**
 * PostsController postlar sahifasini boshqaradi.
 */
class PostsController extends Controller
{
    /**
     * Postlar ro'yxatini aks ettiradi.
     * @return string
     */
    public function actionIndex($tag = null)
    {
        $query = Posts::find()
            ->with('tags')
            ->where(['is_published' => true])
            ->orderBy(['created_at' => SORT_DESC]);

        if ($tag) {
            $query->joinWith('tags')
                ->andWhere(['tag.slug' => $tag]);
        }

        $posts = $query->all();

        return $this->render('index', [
            'posts' => $posts,
            'selectedTag' => $tag,
        ]);
    }

    /**
     * Bitta postning to'liq ma'lumotini ko'rsatish
     * @param string $slug Postning slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
        // Slug bo'yicha postni topish
        $post = Posts::findOne(['slug' => $slug]);

        if ($post === null) {
            throw new \yii\web\NotFoundHttpException('Sahifa topilmadi.');
        }

        return $this->render('view', [
            'post' => $post,
        ]);
    }
}

