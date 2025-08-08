<?php

/* @var $this yii\web\View */
/* @var $events common\models\Events[] */
/* @var $lastEvent common\models\Events */
/* @var $upcomingEvent common\models\Events */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use common\models\Events;

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;

// Find the latest completed event
$lastEvent = Events::find()
    ->where(['<', 'start_date', date('Y-m-d')])
    ->orderBy(['start_date' => SORT_DESC])
    ->one();

// Find the next upcoming event
$upcomingEvent = Events::find()
    ->where(['>', 'start_date', date('Y-m-d')])
    ->orderBy(['start_date' => SORT_ASC])
    ->one();
?>

<section class="events-section pt-120 pb-120" data-bg-color="#f8fafd">
    <div class="container">

        <div class="highlight-events-block mb-80">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <?php if ($lastEvent): ?>
                        <div class="highlight-card last-event-card">
                            <span class="event-tag">Past Event</span>
                            <div class="event-content">
                                <h3 class="event-title">
                                    <a href="<?= Url::to(['events/view', 'id' => $lastEvent->id]) ?>">
                                        <?= Html::encode($lastEvent->title) ?>
                                    </a>
                                </h3>
                                <p class="event-date">
                                    <i class="far fa-calendar-alt"></i> <?= Yii::$app->formatter->asDate($lastEvent->start_date, 'dd/MM/yyyy') ?>
                                </p>
                                <p class="event-description">
                                    <?= Html::encode(StringHelper::truncate($lastEvent->description, 150, '...')) ?>
                                </p>
                                <a class="read-more-link" href="<?= Url::to(['events/view', 'id' => $lastEvent->id]) ?>">
                                    Read more
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="highlight-card last-event-card">
                            <p class="no-event-message">No past events available.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6">
                    <?php if ($upcomingEvent): ?>
                        <div class="highlight-card upcoming-event-card">
                            <span class="event-tag">Upcoming Event</span>
                            <div class="event-content">
                                <h3 class="event-title">
                                    <a href="<?= Url::to(['events/view', 'id' => $upcomingEvent->id]) ?>">
                                        <?= Html::encode($upcomingEvent->title) ?>
                                    </a>
                                </h3>
                                <p class="event-date">
                                    <i class="far fa-calendar-alt"></i> <?= Yii::$app->formatter->asDate($upcomingEvent->start_date, 'dd/MM/yyyy') ?>
                                </p>
                                <p class="event-description">
                                    <?= Html::encode(StringHelper::truncate($upcomingEvent->description, 150, '...')) ?>
                                </p>
                                <a class="read-more-link" href="<?= Url::to(['events/view', 'id' => $upcomingEvent->id]) ?>">
                                    Read more
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="highlight-card upcoming-event-card">
                            <p class="no-event-message">No upcoming events available.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="events-grid-block">
            <div class="row mt-none-30">
                <?php foreach ($events as $event): ?>
                    <div class="col-lg-6 mt-30">
                        <div class="blog_post_block image_left_layout border">
                            <div class="blog_post_content">
                                <div class="post_meta_wrap">
                                    <ul class="category_btns_group unordered_list">
                                        <li>
                                            <a href="#!">
                                                <i class="far fa-clock"></i> <?= Yii::$app->formatter->asDate($event->created_at, 'dd/MM/yyyy') ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="blog_post_title border-effect">
                                    <a href="<?= Url::to(['events/view', 'id' => $event->id]) ?>">
                                        <?= Html::encode(StringHelper::truncate($event->title, 70, '...')) ?>
                                    </a>
                                </h3>
                                <p>
                                    <?= Html::encode(StringHelper::truncate($event->description, 100, '...')) ?>
                                </p>
                                <ul class="post_meta_bottom ul_li">
                                    <li>
                                        <div class="about-btn">
                                            <a class="more-btn" href="<?= Url::to(['events/view', 'id' => $event->id]) ?>">
                                                read more
                                                <span>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.9585 1.66663H8.0418C7.17513 1.66663 6.4668 2.36663 6.4668 3.23329V4.01663C6.4668 4.88329 7.1668 5.58329 8.03346 5.58329H11.9585C12.8251 5.58329 13.5251 4.88329 13.5251 4.01663V3.23329C13.5335 2.36663 12.8251 1.66663 11.9585 1.66663Z" fill="#170006"></path>
                                                        <path d="M14.3667 4.01665C14.3667 5.34165 13.2834 6.42498 11.9584 6.42498H8.0417C6.7167 6.42498 5.63337 5.34165 5.63337 4.01665C5.63337 3.54998 5.13337 3.25832 4.7167 3.47498C3.5417 4.09998 2.7417 5.34165 2.7417 6.76665V14.6083C2.7417 16.6583 4.4167 18.3333 6.4667 18.3333H13.5334C15.5834 18.3333 17.2584 16.6583 17.2584 14.6083V6.76665C17.2584 5.34165 16.4584 4.09998 15.2834 3.47498C14.8667 3.25832 14.3667 3.54998 14.3667 4.01665ZM10.3167 14.125H6.6667C6.32503 14.125 6.0417 13.8417 6.0417 13.5C6.0417 13.1583 6.32503 12.875 6.6667 12.875H10.3167C10.6584 12.875 10.9417 13.1583 10.9417 13.5C10.9417 13.8417 10.6584 14.125 10.3167 14.125ZM12.5 10.7917H6.6667C6.32503 10.7917 6.0417 10.5083 6.0417 10.1667C6.0417 9.82498 6.32503 9.54165 6.6667 9.54165H12.5C12.8417 9.54165 13.125 9.82498 13.125 10.1667C13.125 10.5083 12.8417 10.7917 12.5 10.7917Z" fill="#170006"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<style>
    /* New Styles for Highlight Section */
    .highlight-events-block {
        margin-top: 50px;
    }

    .highlight-card {
        background-color: #fff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .last-event-card {
        border: 2px solid #e0e0e0;
    }

    .upcoming-event-card {
        border: 2px solid #007bff;
    }

    .highlight-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
    }

    .event-tag {
        position: absolute;
        top: 0;
        right: 40px;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 0.5px;
    }

    .last-event-card .event-tag {
        background-color: #6c757d;
    }

    .event-content {
        margin-top: 20px;
    }

    .event-title {
        font-size: 1.8rem;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 10px;
    }

    .event-title a {
        color: #212529;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .event-title a:hover {
        color: #007bff;
    }

    .event-date {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .event-date i {
        margin-right: 5px;
        color: #007bff;
    }

    .last-event-card .event-date i {
        color: #6c757d;
    }

    .event-description {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #495057;
        margin-bottom: 30px;
    }

    .read-more-link {
        display: inline-flex;
        align-items: center;
        font-weight: bold;
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .read-more-link i {
        margin-left: 10px;
        transition: transform 0.3s ease;
    }

    .read-more-link:hover {
        color: #0056b3;
    }

    .read-more-link:hover i {
        transform: translateX(5px);
    }

    .no-event-message {
        color: #6c757d;
        font-style: italic;
        text-align: center;
        margin: auto;
    }

    /* Existing Styles */
    .blog_section {
        background-color: #f8fafd;
        font-family: 'Poppins', sans-serif;
    }

    .blog_post_block {
        display: flex;
        background-color: #fff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        transition: box-shadow 0.3s ease;
        height: 100%;
        align-items: flex-start;
    }

    .blog_post_block:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .blog_post_content {
        padding: 25px;
        flex: 1;
    }

    .post_meta_wrap {
        margin-bottom: 10px;
    }

    .category_btns_group a {
        color: #6c757d;
        font-size: 14px;
        text-decoration: none;
    }

    .category_btns_group a i {
        margin-right: 5px;
    }

    .blog_post_title a {
        font-size: 1.25rem;
        line-height: 1.4;
        font-weight: 600;
        color: #212529;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog_post_title a:hover {
        color: #007bff;
    }

    .blog_post_block p {
        color: #495057;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .post_meta_bottom {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .about-btn a {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        color: #007bff;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    .about-btn a span {
        margin-left: 5px;
    }

    .about-btn a:hover {
        color: #0056b3;
    }

    .about-btn a:hover span {
        transform: translateX(3px);
    }
</style>