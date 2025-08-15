<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Calculator';

?>
<section class="about pt-120 pb-130 pattern-section">
    <div class="right-bg-pattern">
        <div class="left-bg-pattern">
            <div class="container">
                <div class="row align-items-center mt-none-30">
                    <h2 class="details_item_title">
                        Online equivalency calculator
                    </h2>
                    <p>Applicants with an international certificate (SAT, International Baccalaureate (IB), International AS & A Levels) may be exempt from the entrance exam for undergraduate programs. Their math section scores from international certificates will be considered. The online equivalency calculator is made to compare international certificate math section scores with the entrance exam scores.</p>
                    <p class="py-3">If applicants prefer, they may still take the entrance exam. In case of a difference between the entrance exam score and the score derived from their international certificate, the higher score will be considered.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bg-white border rounded-4 p-3">
                                <h5>Your Score</h5>
                                <div class="row g-2 pt-3">
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <select class="form-select" id="floatingSelectGrid">
                                                <option value="1">SAT (Math section)</option>
                                                <option value="2">International Baccalaureate (IB) (Mathematics)</option>
                                                <option value="3">International AS & A Levels (Mathematics)</option>
                                            </select>
                                            <label for="floatingSelectGrid">International certificate:</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="email" class="form-control bg-white border rounded" id="floatingInputGrid" placeholder="name@example.com" value="70">
                                            <label for="floatingInputGrid">Insert/Select your Grade:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-3 mt-3">
                                    <h6>Al-Khwarizmi University
                                        Entrance Exam Score: <span>Pass</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
