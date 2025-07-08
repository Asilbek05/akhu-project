<?php

namespace backend\controllers;

use common\models\Leadership;
use common\models\LoginForm;
use common\models\PasswordResetRequestForm;
use common\models\Posts;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use common\models\User;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout', 'request-password-reset', 'index', 'error'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['request-password-reset'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            $user = Yii::$app->user->identity;
                            return $user && in_array($user->role, ['admin', 'superadmin']);
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'backend\components\CustomErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //Posts count
        $totalPosts = Posts::find()->count();
        $activePosts = Posts::find()->where(['is_published' => 1])->count();
        $inactivePosts = Posts::find()->where(['is_published' => 0])->count();

        $activePercent = $totalPosts > 0 ? round(($activePosts / $totalPosts) * 100) : 0;
        //end

        //EVENTSCount
        $today = (new \DateTime())->format('Y-m-d');
        $tenDaysLater = (new \DateTime('+10 days'))->format('Y-m-d');

        $eventStats = [
            'total' => \common\models\Events::find()->count(),
            'today' => \common\models\Events::find()->where(['start_date' => $today])->count(),
            'upcoming10days' => \common\models\Events::find()
                ->where(['between', 'start_date', $today, $tenDaysLater])
                ->count(),
            'past' => \common\models\Events::find()->where(['<', 'start_date', $today])->count(),
        ];
        //leadership Count
        $leadershipCount = Leadership::find()->count();
        //UsersCount
        $userRolesStats = [
            'superadmin' => User::find()->where(['role' => 'superadmin'])->count(),
            'admin'      => User::find()->where(['role' => 'admin'])->count(),
            'user'       => User::find()->where(['role' => 'user'])->count(),
        ];
        //EventsTable
        $postStats = [
            'total'   => $totalPosts,
            'active'  => $activePosts,
            'inactive'=> $inactivePosts,
            'percent' => $activePercent,
        ];
        $futureDays = [];
        $today = new \DateTime();

        for ($i = 0; $i < 10; $i++) {
            $date = clone $today;
            $date->modify("+$i days");

            $futureDays[] = [
                'label' => $date->format('D'),    // Mon, Tue...
                'day'   => $date->format('d'),    // 01, 02...
                'date'  => $date->format('Y-m-d'),
                'id'    => 'kt_timeline_tab_' . ($i + 1),
                'active'=> $i === 0,
            ];
        }

        $eventsAll = \common\models\Events::find()
            ->where(['between', 'start_date', $today->format('Y-m-d'), (new \DateTime('+9 days'))->format('Y-m-d')])
            ->orderBy(['start_date' => SORT_ASC, 'time' => SORT_ASC])
            ->all();

        $eventsPerDate = [];
        foreach ($eventsAll as $event) {
            $eventsPerDate[$event->start_date][] = $event;
        }

        return $this->render('index', [
            'futureDays' => $futureDays,
            'eventsPerDate' => $eventsPerDate,
            'postStats' => $postStats,
            'leadershipCount' => $leadershipCount,
            'eventStats' => $eventStats,
            'userRolesStats' => $userRolesStats,

        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
        $this->layout = 'blank';

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }


}
