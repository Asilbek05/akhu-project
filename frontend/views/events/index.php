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

<section class="events-hero-section">
    <div class="hero-gradient-bg">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">Our Events</h1>
                <p class="hero-subtitle">Discover amazing experiences and connect with our community</p>
            </div>
        </div>
    </div>
</section>

<section class="events-section pt-120 pb-120">
    <div class="container">
        <!-- Featured Events Section -->
        <div class="section-header text-center mb-80">
            <h2 class="section-title">Featured Events</h2>
            <div class="title-underline"></div>
            <p class="section-description">Stay updated with our latest and upcoming events</p>
        </div>

        <div class="highlight-events-block mb-80">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <?php if ($lastEvent): ?>
                        <div class="highlight-card last-event-card">
                            <div class="card-overlay"></div>
                            <span class="event-tag past-event">
                                <i class="fas fa-history"></i>
                                Past Event
                            </span>
                            <div class="event-content">
                                <h3 class="event-title">
                                    <a href="<?= Url::to(['events/view', 'id' => $lastEvent->id]) ?>">
                                        <?= Html::encode($lastEvent->title) ?>
                                    </a>
                                </h3>
                                <div class="event-meta">
                                    <div class="event-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <?= Yii::$app->formatter->asDate($lastEvent->start_date, 'dd MMM yyyy') ?>
                                    </div>
                                    <div class="event-status completed">
                                        <i class="fas fa-check-circle"></i>
                                        Completed
                                    </div>
                                </div>
                                <p class="event-description">
                                    <?= Html::encode(StringHelper::truncate($lastEvent->description, 150, '...')) ?>
                                </p>
                                <a class="read-more-btn primary-btn" href="<?= Url::to(['events/view', 'id' => $lastEvent->id]) ?>">
                                    View Details
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="highlight-card empty-card">
                            <div class="empty-state">
                                <i class="fas fa-calendar-times"></i>
                                <h4>No Past Events</h4>
                                <p>Check back soon for past event highlights</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6">
                    <?php if ($upcomingEvent): ?>
                        <div class="highlight-card upcoming-event-card">
                            <div class="card-overlay upcoming-overlay"></div>
                            <span class="event-tag upcoming-event">
                                <i class="fas fa-star"></i>
                                Upcoming Event
                            </span>
                            <div class="event-content">
                                <h3 class="event-title">
                                    <a href="<?= Url::to(['events/view', 'id' => $upcomingEvent->id]) ?>">
                                        <?= Html::encode($upcomingEvent->title) ?>
                                    </a>
                                </h3>
                                <div class="event-meta">
                                    <div class="event-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <?= Yii::$app->formatter->asDate($upcomingEvent->start_date, 'dd MMM yyyy') ?>
                                    </div>
                                    <div class="event-status upcoming">
                                        <i class="fas fa-clock"></i>
                                        Coming Soon
                                    </div>
                                </div>
                                <p class="event-description">
                                    <?= Html::encode(StringHelper::truncate($upcomingEvent->description, 150, '...')) ?>
                                </p>
                                <a class="read-more-btn gradient-btn" href="<?= Url::to(['events/view', 'id' => $upcomingEvent->id]) ?>">
                                    Learn More
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="highlight-card empty-card">
                            <div class="empty-state">
                                <i class="fas fa-calendar-plus"></i>
                                <h4>No Upcoming Events</h4>
                                <p>Stay tuned for exciting new events!</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- All Events Section -->
        <div class="all-events-section">
            <div class="section-header text-center mb-60">
                <h2 class="section-title">All Events</h2>
                <div class="title-underline"></div>
            </div>

            <div class="events-grid">
                <div class="row">
                    <?php foreach ($events as $event): ?>
                        <div class="col-lg-6 col-md-6 mb-40">
                            <div class="event-card modern-card">
                                <div class="card-header">
                                    <div class="event-date-badge">
                                        <span class="day"><?= date('d', strtotime($event->start_date)) ?></span>
                                        <span class="month"><?= date('M', strtotime($event->start_date)) ?></span>
                                    </div>
                                    <div class="event-meta-info">
                                        <span class="created-date">
                                            <i class="far fa-clock"></i>
                                            <?= Yii::$app->formatter->asDate($event->created_at, 'dd/MM/yyyy') ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="card-content">
                                    <h3 class="event-title">
                                        <a href="<?= Url::to(['events/view', 'id' => $event->id]) ?>">
                                            <?= Html::encode(StringHelper::truncate($event->title, 70, '...')) ?>
                                        </a>
                                    </h3>
                                    <p class="event-description">
                                        <?= Html::encode(StringHelper::truncate($event->description, 120, '...')) ?>
                                    </p>
                                </div>

                                <div class="card-footer">
                                    <a class="event-link" href="<?= Url::to(['events/view', 'id' => $event->id]) ?>">
                                        <span>Read More</span>
                                        <div class="arrow-icon">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M4.16667 10H15.8333M15.8333 10L10.8333 5M15.8333 10L10.8333 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Hero Section */
    .events-hero-section {
        position: relative;
        min-height: 300px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        width: 100%;
        position: relative;
    }

    .hero-gradient-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23FFF" stop-opacity="0.1"/><stop offset="100%" stop-color="%23FFF" stop-opacity="0"/></radialGradient></defs><circle cx="10" cy="10" r="10" fill="url(%23a)"/><circle cx="30" cy="5" r="8" fill="url(%23a)"/><circle cx="60" cy="15" r="6" fill="url(%23a)"/><circle cx="80" cy="8" r="12" fill="url(%23a)"/></svg>') repeat;
        opacity: 0.1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 80px 0;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 0;
        font-weight: 300;
    }

    /* Section Headers */
    .section-header {
        margin-bottom: 60px;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .title-underline {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        margin: 0 auto 20px;
        border-radius: 2px;
    }

    .section-description {
        font-size: 1.1rem;
        color: #6c757d;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Featured Events Cards */
    .highlight-events-block {
        margin-bottom: 100px;
    }

    .highlight-card {
        background: #fff;
        border-radius: 20px;
        padding: 40px;
        height: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .highlight-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }

    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(108, 117, 125, 0.05) 0%, rgba(108, 117, 125, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .upcoming-overlay {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.1) 100%);
    }

    .highlight-card:hover .card-overlay {
        opacity: 1;
    }

    .event-tag {
        position: absolute;
        top: 0;
        right: 30px;
        padding: 12px 24px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #fff;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .past-event {
        background: linear-gradient(135deg, #6c757d, #5a6268);
    }

    .upcoming-event {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .event-content {
        margin-top: 30px;
        position: relative;
        z-index: 2;
    }

    .event-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.3;
    }

    .event-title a {
        color: #2c3e50;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .event-title a:hover {
        color: #667eea;
    }

    .event-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .event-date {
        font-size: 1rem;
        color: #6c757d;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .event-status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .event-status.completed {
        background-color: #d4edda;
        color: #155724;
    }

    .event-status.upcoming {
        background-color: #cce7ff;
        color: #004085;
    }

    .event-description {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #495057;
        margin-bottom: 30px;
    }

    .read-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .primary-btn {
        background-color: #6c757d;
        color: #fff;
    }

    .primary-btn:hover {
        background-color: #5a6268;
        transform: translateX(5px);
    }

    .gradient-btn {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
    }

    .gradient-btn:hover {
        background: linear-gradient(135deg, #764ba2, #667eea);
        transform: translateX(5px);
    }

    /* Empty State */
    .empty-card {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 300px;
    }

    .empty-state {
        text-align: center;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    .empty-state h4 {
        font-size: 1.3rem;
        margin-bottom: 10px;
        color: #495057;
    }

    /* Modern Event Cards */
    .events-grid {
        margin-top: 40px;
    }

    .event-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    }

    .card-header {
        padding: 25px 25px 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .event-date-badge {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        padding: 15px;
        border-radius: 12px;
        text-align: center;
        min-width: 70px;
    }

    .event-date-badge .day {
        display: block;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
    }

    .event-date-badge .month {
        display: block;
        font-size: 0.8rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 2px;
    }

    .event-meta-info {
        text-align: right;
    }

    .created-date {
        color: #6c757d;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .card-content {
        padding: 20px 25px;
        flex-grow: 1;
    }

    .card-content .event-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .card-content .event-title a {
        color: #2c3e50;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .card-content .event-title a:hover {
        color: #667eea;
    }

    .card-content .event-description {
        color: #6c757d;
        line-height: 1.6;
        font-size: 1rem;
        margin-bottom: 0;
    }

    .card-footer {
        padding: 0 25px 25px;
        margin-top: auto;
    }

    .event-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .event-link:hover {
        color: #764ba2;
        transform: translateX(3px);
    }

    .arrow-icon {
        transition: transform 0.3s ease;
    }

    .event-link:hover .arrow-icon {
        transform: translateX(3px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .highlight-card {
            padding: 30px 25px;
            margin-bottom: 30px;
        }

        .event-title {
            font-size: 1.5rem;
        }

        .event-meta {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-header {
            padding: 20px 20px 0;
        }

        .card-content {
            padding: 15px 20px;
        }

        .card-footer {
            padding: 0 20px 20px;
        }
    }

    /* Animation for page load */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .highlight-card,
    .event-card {
        animation: fadeInUp 0.6s ease forwards;
    }

    .highlight-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .event-card:nth-child(odd) {
        animation-delay: 0.2s;
    }

    .event-card:nth-child(even) {
        animation-delay: 0.3s;
    }
</style>