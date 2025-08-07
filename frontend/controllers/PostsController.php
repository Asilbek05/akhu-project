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
    public function actionIndex()
    {
        $posts = Posts::find()
            ->with('tags') // Tug'ridan-to'g'ri teglar bilan birga postlarni oladi
            ->where(['is_published' => true])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'posts' => $posts,
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

