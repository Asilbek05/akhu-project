<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Admission Overview';

?>

<main>
    <section class="breadcrumb bg_img ul_li" data-background="<?= Yii::$app->request->baseUrl . '/img/bg/breadcrump.png' ?>">
        <div class="container">
            <div class="breadcrumb__content text-center">
                <h2 class="breadcrumb__title">Admission Overview</h2>
                <p class="breadcrumb__desc">Admissions</p>
            </div>
        </div>
    </section>
    <section class="about pt-120 pb-120 pattern-section">
        <div class="right-bg-pattern">
            <div class="left-bg-pattern">
                <div class="container">
                    <div class="row align-items-center mt-none-30">
                        <div class="course-single-content mt-25">
                            <h2>Admission Overview</h2>
                            <p>Al-Khwarizmi University provides a vibrant and challenging academic setting aimed at equipping students with the essential knowledge and skills for achievement.</p>
                            <h3>Majors</h3>
                            <div class="row pb-4">
                                <div class="col-lg-4">
                                    <div class="card rounded-4 border-0">
                                        <div class="card-header bg-base-color text-light border-0 rounded-top-4 fs-6">
                                            School of Artificial Intelligence
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text"><span class="pe-2 animation-circle">&#9679;</span> Artificial Intelligence </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card rounded-4 border-0">
                                        <div class="card-header bg-base-color text-light border-0 rounded-top-4 fs-6">
                                            School of Mathematics & Informatics
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text"><span class="pe-2 animation-circle">&#9679;</span> Software Engineering </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card rounded-4 border-0">
                                        <div class="card-header bg-base-color text-light border-0 rounded-top-4 fs-6">
                                            School of Aerospace Technologies Engineering
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text"><span class="pe-2 animation-circle">&#9679;</span> Engineering of Drone Technologies </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <h3 class="mt-30">Admissions Timeline</h3>
                            <p class="pt-2">1. 18th June - Start of Admission </p>
                            <p class="pt-2">2. Within 3 working days after submission - Application Review</p>
                            <p class="pt-2">3. Within 2 working days after receiving email notification (if the application is incomplete) - Submission of Additional Documents</p>
                            <p class="pt-2">4. 18th August - Deadline for Registration</p>
                            <p class="pt-2">5. By 21st August (placed in the applicant’s personal cabinet) - Permit Card Availability</p>
                            <p class="pt-2">6. By 26th August - Permit Card Download and Print</p>
                            <p class="pt-2">7. 26th August - Exam date <br> <span><b>Note:</b> You must bring your permit card and passport or ID card to enter the exam venue.</span></p>
                            <p class="pt-2">8. By 5th September <br> <span>Deadline for Submission of Documents</span></p>
                            <hr>
                            <ul>
                                <li>English proficiency test certificate (IELTS, TOEFL iBT, CEFR or other equivalents)</li>
                                <li>International certificate (SAT, International Baccalaureate (IB), International AS & A Levels) - if available</li>
                                <li>Secondary school / Academic lyceum / Professional college diploma with academic transcripts</li>
                                <li>Document of Unified Register of Social Protection (Ijtimoiy himoya yagona reestri) - if available</li>
                                <li>International Olympiad certificate - if available</li>
                            </ul>
                            <h2 class="pt-3">General Entry Requirements</h2>
                            <h3>Educational Background:</h3>
                            <p>Applicants must have completed secondary school, academic lyceum, or professional college and provide diploma with academic transcripts.</p>
                            <h3>Minimum English Proficiency:</h3>
                            <ul class="xb-list list-unstyled mb-15">
                                <li><span><?= Html::img(Yii::$app->request->baseUrl . '/img/icon/check-2.svg', ['alt' => '']) ?></span>IELTS: 5.5 or;</li>
                                <li><span><?= Html::img(Yii::$app->request->baseUrl . '/img/icon/check-2.svg', ['alt' => '']) ?></span>CEFR: B2 or;</li>
                                <li><span><?= Html::img(Yii::$app->request->baseUrl . '/img/icon/check-2.svg', ['alt' => '']) ?></span>TOEFL iBT: 46 or equivalents</li>
                            </ul>
                            <i>Note: Only TOEFL iBT tests taken at approved test centers are accepted. The TOEFL iBT Home Edition is not accepted.) </i>
                            <h3 class="pt-3">Entrance Exam Requirement:</h3>
                            <p>Applicants must pass the Math & Logical Thinking entrance exam. </p>
                            <p>Applicants with an international certificate (SAT, International Baccalaureate (IB), International AS & A Levels) may be exempt from the entrance exam. Their math section scores from international certificates will be considered. </p>
                            <p>To compare international certificate math scores with the entrance exam scores, applicants may use the online equivalency calculator. </p>
                            <p>If applicants prefer, they may still take the entrance exam. In case of a difference between the entrance exam score and the score derived from their international certificate, the higher score will be considered.</p>
                            <div class="xb-btn pt-60">
                                <a class="thm-btn text-capitalize" href="<?= Url::to(['/site/apply-now']) ?>">Start Your Aplication
                                    <span class="icon"><svg width="21" height="21" viewBox="0 0 21 21" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.4795 21C9.10959 21 7.81507 20.7539 6.59589 20.2617C5.37671 19.7695 4.30137 19.0962 3.36986 18.2417C2.43836 17.3872 1.67808 16.3857 1.08904 15.2373C0.486301 14.0752 0.123288 12.8311 0 11.5049V11.4639H8.56849V14.3145C8.56849 14.5742 8.66096 14.7998 8.84589 14.9912C9.03082 15.1826 9.25342 15.2783 9.5137 15.2783C9.65068 15.2783 9.7774 15.251 9.89384 15.1963C10.0103 15.1416 10.1096 15.0732 10.1918 14.9912L14.0137 11.1768C14.0959 11.0947 14.1644 10.9956 14.2192 10.8794C14.274 10.7632 14.3014 10.6367 14.3014 10.5C14.3014 10.3633 14.274 10.2368 14.2192 10.1206C14.1644 10.0044 14.0959 9.90527 14.0137 9.82324L10.1918 6.00879C10.1096 5.92676 10.0103 5.8584 9.89384 5.80371C9.7774 5.74902 9.65068 5.72168 9.5137 5.72168C9.25342 5.72168 9.0274 5.81738 8.83562 6.00879C8.64384 6.2002 8.54794 6.42578 8.54794 6.68555V9.53613H0C0.123288 8.19629 0.486301 6.94531 1.08904 5.7832C1.67808 4.62109 2.44178 3.61279 3.38014 2.7583C4.31849 1.90381 5.39041 1.23047 6.59589 0.738281C7.81507 0.246094 9.10959 0 10.4795 0C11.9315 0 13.2945 0.273439 14.5685 0.820312C15.8425 1.38086 16.9555 2.13623 17.9075 3.08643C18.8596 4.03662 19.6096 5.14746 20.1575 6.41895C20.7192 7.69043 21 9.05078 21 10.5C21 11.9492 20.7192 13.3096 20.1575 14.5811C19.6096 15.8662 18.8596 16.9839 17.9075 17.9341C16.9555 18.8843 15.8425 19.6328 14.5685 20.1797C13.2945 20.7266 11.9315 21 10.4795 21Z" fill="#ffffff"></path>
                                    </svg></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
