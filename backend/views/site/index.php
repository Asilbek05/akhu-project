<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="row g-5 g-xl-10 mb-xl-10">
    <!--begin::Col-->
    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

        <!--begin::Card widget 16-->
        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10" style="background-color: #080655">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                <?= $postStats['total'] ?>
            </span>
                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Jami Postlar</span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->

            <!--begin::Card body-->
            <div class="card-body d-flex align-items-end pt-0">
                <div class="d-flex align-items-center flex-column mt-3 w-100">
                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-50 w-100 mt-auto mb-2">
                        <span><?= $postStats['active'] ?> Faol</span>
                        <span><?= $postStats['percent'] ?>%</span>
                    </div>

                    <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                        <div class="bg-danger rounded h-8px" role="progressbar" style="width: <?= $postStats['percent'] ?>%;" aria-valuenow="<?= $postStats['percent'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="text-white opacity-50 fw-semibold fs-7 mt-2">
                        <?= $postStats['inactive'] ?> Nofaol Postlar
                    </div>
                </div>
            </div>
            <!--end::Card body-->
        </div>


        <!--begin::Card widget 7-->
        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                <?= $leadershipCount ?>
            </span>
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Leadershiplar soni</span>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->

            <!--begin::Card body-->
            <div class="card-body d-flex flex-column justify-content-end pe-0">
                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Active Leadership</span>

                <!-- Avatars guruhi -->
                <div class="symbol-group symbol-hover flex-nowrap">
                    <!-- aynan shu Metronicdagi o'zidagi avatarlar qoladi -->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                    </div>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                        <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo39/assets/media/avatars/300-11.jpg" />
                    </div>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                    </div>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                        <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo39/assets/media/avatars/300-2.jpg" />
                    </div>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
                        <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                    </div>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                        <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo39/assets/media/avatars/300-12.jpg" />
                    </div>
                    <a href="#" class="symbol symbol-35px symbol-circle">
                        <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+<?= ($leadershipCount - 6) ?></span>
                    </a>
                </div>
                <!-- end avatars -->
            </div>
            <!--end::Card body-->
        </div>

        <!--end::Card widget 7-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">

        <!--begin::Card widget 17-->
        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                        <!--begin::Icon-->
                        <i class="ki-outline ki-calendar text-primary fs-2hx me-2"></i>
                        <!--end::Icon-->

                        <!--begin::Total Count-->
                        <span class="fs-2hx fw-bold text-dark lh-1"><?= $eventStats['total'] ?></span>
                        <!--end::Total Count-->

                        <!--begin::Badge-->
                        <span class="badge badge-light-info fs-base ms-2">
                    <?= $eventStats['today'] ?> today
                </span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Info-->

                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Eventlar statistikasi (<?= date('F Y') ?>)</span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->

            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                <!--begin::Chart icon (mockup joy)-->
                <div class="d-flex flex-center me-5 pt-2">
                    <i class="ki-outline ki-graph-up-arrow fs-3hx text-success"></i>
                </div>
                <!--end::Chart icon-->

                <!--begin::Labels-->
                <div class="d-flex flex-column content-justify-center flex-row-fluid">
                    <!-- Upcoming -->
                    <div class="d-flex fw-semibold align-items-center">
                        <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>
                        <div class="text-gray-500 flex-grow-1 me-4">Keyingi 10 kun</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end"><?= $eventStats['upcoming10days'] ?></div>
                    </div>

                    <!-- Past -->
                    <div class="d-flex fw-semibold align-items-center my-3">
                        <div class="bullet w-8px h-3px rounded-2 bg-danger me-3"></div>
                        <div class="text-gray-500 flex-grow-1 me-4">O‘tgan eventlar</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end"><?= $eventStats['past'] ?></div>
                    </div>

                    <!-- Today -->
                    <div class="d-flex fw-semibold align-items-center">
                        <div class="bullet w-8px h-3px rounded-2 bg-warning me-3"></div>
                        <div class="text-gray-500 flex-grow-1 me-4">Bugun</div>
                        <div class="fw-bolder text-gray-700 text-xxl-end"><?= $eventStats['today'] ?></div>
                    </div>
                </div>
                <!--end::Labels-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 17-->

        <!--begin::List widget 25-->
        <div class="card card-flush h-lg-50">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <h3 class="card-title text-gray-800">User Roles Stats</h3>
                <!--end::Title-->
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-5">
                <!--begin::Item Superadmin-->
                <div class="d-flex flex-stack">
                    <div class="text-gray-700 fw-semibold fs-6 me-2">
                        <i class="ki-outline ki-shield-check fs-2 text-primary me-2"></i>
                        Superadmins
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="text-gray-900 fw-bolder fs-6"><?= $userRolesStats['superadmin'] ?></span>
                    </div>
                </div>
                <!--end::Item-->

                <div class="separator separator-dashed my-3"></div>

                <!--begin::Item Admin-->
                <div class="d-flex flex-stack">
                    <div class="text-gray-700 fw-semibold fs-6 me-2">
                        <i class="ki-outline ki-briefcase fs-2 text-success me-2"></i>
                        Admins
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="text-gray-900 fw-bolder fs-6"><?= $userRolesStats['admin'] ?></span>
                    </div>
                </div>
                <!--end::Item-->

                <div class="separator separator-dashed my-3"></div>

                <!--begin::Item User-->
                <div class="d-flex flex-stack">
                    <div class="text-gray-700 fw-semibold fs-6 me-2">
                        <i class="ki-outline ki-user fs-2 text-warning me-2"></i>
                        Users
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="text-gray-900 fw-bolder fs-6"><?= $userRolesStats['user'] ?></span>
                    </div>
                </div>
                <!--end::Item-->
            </div>
            <!--end::Body-->
        </div>

        <!--end::LIst widget 25-->


    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">

        <!--begin::Timeline widget 3-->
        <div class="card h-md-100">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Kelgusi 10 kunlik eventlar</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Rejalashtirilgan tadbirlar ro‘yxati</span>
                </h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-7 px-0">
                <!--begin::Nav pills-->
                <ul class="nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between mb-8 px-5">
                    <?php foreach ($futureDays as $day): ?>
                        <li class="nav-item p-0 ms-0">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-primary <?= $day['active'] ? 'active' : '' ?>"
                               data-bs-toggle="tab"
                               href="#<?= Html::encode($day['id']) ?>">
                                <span class="fs-7 fw-semibold"><?= Html::encode($day['label']) ?></span>
                                <span class="fs-6 fw-bold"><?= Html::encode($day['day']) ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!--end::Nav pills-->

                <!--begin::Tab Content-->
                <div class="tab-content px-5">
                    <?php foreach ($futureDays as $day): ?>
                        <div class="tab-pane fade <?= $day['active'] ? 'show active' : '' ?>" id="<?= Html::encode($day['id']) ?>">
                            <?php $events = $eventsPerDate[$day['date']] ?? []; ?>

                            <?php if (empty($events)): ?>
                                <div class="text-center py-10">
                                    <i class="bi bi-calendar-x fs-1 text-muted mb-3"></i>
                                    <h4 class="mb-2 text-gray-700"><?= Html::encode($day['label']) ?> <?= Html::encode($day['day']) ?> uchun eventlar yo'q</h4>
                                </div>
                            <?php else: ?>
                                <!--begin::Events Table-like Grid-->
                                <div class="border rounded">
                                    <div class="d-none d-md-flex bg-light fw-bold border-bottom px-4 py-3">
                                        <div class="flex-fill">Nomi</div>
                                        <div class="flex-fill">Manzil</div>
                                        <div class="flex-fill">Vaqt</div>
                                        <div class="flex-fill">Izoh</div>
                                    </div>
                                    <?php foreach ($events as $event): ?>
                                        <div class="d-flex flex-column flex-md-row border-bottom px-4 py-3 align-items-start align-items-md-center">
                                            <div class="flex-fill mb-2 mb-md-0 fw-semibold text-dark"><?= Html::encode($event->title) ?></div>
                                            <div class="flex-fill mb-2 mb-md-0 text-gray-600"><?= Html::encode($event->location) ?></div>
                                            <div class="flex-fill mb-2 mb-md-0 text-muted"><?= Html::encode($event->time) ?></div>
                                            <div class="flex-fill text-gray-700"><?= Html::encode($event->description) ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!--end::Events Table-like Grid-->
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end::Body-->
        </div>




        <!--begin::Timeline widget 3-->
        <div class="card card-flush d-none h-md-100">
            <!--begin::Card header-->
            <div class="card-header mt-6">
                <!--begin::Card title-->
                <div class="card-title flex-column">
                    <h3 class="fw-bold mb-1">What's on the road?</h3>

                    <div class="fs-6 text-gray-400">Total 482 participants</div>
                </div>
                <!--end::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Select-->
                    <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-solid form-select-sm fw-bold w-100px">
                        <option value="1" selected>Options</option>
                        <option value="2">Option 1</option>
                        <option value="3">Option 2</option>
                        <option value="4">Option 3</option>
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body p-0">
                <!--begin::Dates-->
                <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2 ms-4">

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_0">

                            <span class="text-gray-400 fs-7 fw-semibold">Fr</span>
                            <span class="fs-6 text-gray-800 fw-bold">20</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_1">

                            <span class="text-gray-400 fs-7 fw-semibold">Sa</span>
                            <span class="fs-6 text-gray-800 fw-bold">21</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_2">

                            <span class="text-gray-400 fs-7 fw-semibold">Su</span>
                            <span class="fs-6 text-gray-800 fw-bold">22</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger active"
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_3">

                            <span class="text-gray-400 fs-7 fw-semibold">Mo</span>
                            <span class="fs-6 text-gray-800 fw-bold">23</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_4">

                            <span class="text-gray-400 fs-7 fw-semibold">Tu</span>
                            <span class="fs-6 text-gray-800 fw-bold">24</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_5">

                            <span class="text-gray-400 fs-7 fw-semibold">We</span>
                            <span class="fs-6 text-gray-800 fw-bold">25</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_6">

                            <span class="text-gray-400 fs-7 fw-semibold">Th</span>
                            <span class="fs-6 text-gray-800 fw-bold">26</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_7">

                            <span class="text-gray-400 fs-7 fw-semibold">Fr</span>
                            <span class="fs-6 text-gray-800 fw-bold">27</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_8">

                            <span class="text-gray-400 fs-7 fw-semibold">Sa</span>
                            <span class="fs-6 text-gray-800 fw-bold">28</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_9">

                            <span class="text-gray-400 fs-7 fw-semibold">Su</span>
                            <span class="fs-6 text-gray-800 fw-bold">29</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_10">

                            <span class="text-gray-400 fs-7 fw-semibold">Mo</span>
                            <span class="fs-6 text-gray-800 fw-bold">30</span>
                        </a>
                    </li>
                    <!--end::Date-->

                    <!--begin::Date-->
                    <li class="nav-item me-1">
                        <a
                                class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger "
                                data-bs-toggle="tab" href="projects.html#kt_schedule_day_11">

                            <span class="text-gray-400 fs-7 fw-semibold">Tu</span>
                            <span class="fs-6 text-gray-800 fw-bold">31</span>
                        </a>
                    </li>
                    <!--end::Date-->
                </ul>
                <!--end::Dates-->

                <!--begin::Tab Content-->
                <div class="tab-content px-9">
                    <!--begin::Day-->
                    <div id="kt_schedule_day_0" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    13:00 - 14:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Marketing Campaign Discussion                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">David Stevenson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    12:00 - 13:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Weekly Team Stand-Up                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Sean Bean</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    14:30 - 15:30

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Team Backlog Grooming Session                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Peter Marcus</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_1" class="tab-pane fade show active">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    10:00 - 11:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Marketing Campaign Discussion                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Peter Marcus</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    14:30 - 15:30

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Committee Review Approvals                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Terry Robins</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    13:00 - 14:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    9 Degree Project Estimation Meeting                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Bob Harris</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_2" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    12:00 - 13:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Dashboard UI/UX Design Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">David Stevenson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    16:30 - 17:30

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Team Backlog Grooming Session                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Michael Walters</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    13:00 - 14:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Committee Review Approvals                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Mark Randall</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_3" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    13:00 - 14:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Lunch & Learn Catch Up                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Walter White</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    10:00 - 11:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Development Team Capacity Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Sean Bean</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    11:00 - 11:45

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Creative Content Initiative                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Kendell Trevor</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_4" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    12:00 - 13:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Development Team Capacity Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Yannis Gloverson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    13:00 - 14:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Creative Content Initiative                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Yannis Gloverson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    11:00 - 11:45

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Dashboard UI/UX Design Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Walter White</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_5" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    11:00 - 11:45

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Development Team Capacity Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Kendell Trevor</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    10:00 - 11:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Sales Pitch Proposal                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Naomi Hayabusa</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    14:30 - 15:30

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Weekly Team Stand-Up                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Yannis Gloverson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_6" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    16:30 - 17:30

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Development Team Capacity Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Mark Randall</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    12:00 - 13:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Team Backlog Grooming Session                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Kendell Trevor</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    9:00 - 10:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Development Team Capacity Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Bob Harris</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_7" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    16:30 - 17:30

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Dashboard UI/UX Design Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Mark Randall</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    13:00 - 14:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Lunch & Learn Catch Up                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Michael Walters</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    12:00 - 13:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Project Review & Testing                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Naomi Hayabusa</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_8" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    13:00 - 14:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Committee Review Approvals                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Peter Marcus</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    10:00 - 11:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    9 Degree Project Estimation Meeting                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Walter White</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    12:00 - 13:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Project Review & Testing                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Caleb Donaldson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_9" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    9:00 - 10:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Creative Content Initiative                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Caleb Donaldson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    11:00 - 11:45

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Sales Pitch Proposal                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Michael Walters</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    12:00 - 13:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Team Backlog Grooming Session                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Peter Marcus</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_10" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    12:00 - 13:00

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Development Team Capacity Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Yannis Gloverson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    11:00 - 11:45

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Weekly Team Stand-Up                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Caleb Donaldson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    16:30 - 17:30

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Weekly Team Stand-Up                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Naomi Hayabusa</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                    <!--begin::Day-->
                    <div id="kt_schedule_day_11" class="tab-pane fade show ">
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    11:00 - 11:45

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Development Team Capacity Review                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Mark Randall</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    11:00 - 11:45

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        am                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Weekly Team Stand-Up                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">Terry Robins</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                        <!--begin::Time-->
                        <div class="d-flex flex-stack position-relative mt-8">
                            <!--begin::Bar-->
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <!--end::Bar-->

                            <!--begin::Info-->
                            <div class="fw-semibold ms-5 text-gray-600">
                                <!--begin::Time-->
                                <div class="fs-5">
                                    14:30 - 15:30

                                    <span class="fs-7 text-gray-400 text-uppercase">
                                        pm                                    </span>
                                </div>
                                <!--end::Time-->

                                <!--begin::Title-->
                                <a href="projects.html#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                    Weekly Team Stand-Up                                </a>
                                <!--end::Title-->

                                <!--begin::User-->
                                <div class="text-gray-400">
                                    Lead by <a href="projects.html#">David Stevenson</a>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->

                            <!--begin::Action-->
                            <a href="projects.html#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Time-->
                    </div>
                    <!--end::Day-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Timeline widget-3-->    </div>
    <!--end::Col-->
</div>
<!--begin::Row-->
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <!--begin::Col-->
    <div class="col-xxl-6">

        <!--begin::Card widget 18-->
        <div class="card card-flush h-md-100">
            <!--begin::Body-->
            <div class="card-body py-9">
                <!--begin::Row-->
                <div class="row gx-9 h-100">
                    <!--begin::Col-->
                    <div class="col-sm-6 mb-10 mb-sm-0">
                        <!--begin::Image-->
                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100"
                             style="background-size: 100% 100%; background-image: url('<?= Yii::getAlias('@web') ?>/metronic/assets/media/stock/600x600/img-33.jpg');">
                        </div>

                        <!--end::Image-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-sm-6">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column h-100">
                            <!--begin::Header-->
                            <div class="mb-7">
                                <!--begin::Headin-->
                                <div class="d-flex flex-stack mb-6">
                                    <!--begin::Title-->
                                    <div class="flex-shrink-0 me-5">
                                        <span class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">Featured</span>

                                        <span class="text-gray-800 fs-1 fw-bold">9 Degree</span>
                                    </div>
                                    <!--end::Title-->

                                    <span class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">In Process</span>
                                </div>
                                <!--end::Heading-->

                                <!--begin::Items-->
                                <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center me-5 me-xl-13">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-30px symbol-circle me-3">
                                            <img src="<?= Yii::getAlias('@web') ?>/metronic/assets/media/avatars/300-3.jpg" alt="" class=""/>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <span class="fw-semibold text-gray-400 d-block fs-8">Manager</span>
                                            <a href="../pages/user-profile/overview.html" class="fw-bold text-gray-800 text-hover-primary fs-7">Robert Fox</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-30px symbol-circle me-3">
                                    <span class="symbol-label bg-success">
                                        <i class="ki-outline ki-abstract-41 fs-5 text-white"></i>                                    </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <span class="fw-semibold text-gray-400 d-block fs-8">Budget</span>
                                            <span class="fw-bold text-gray-800 fs-7">$64.800</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="mb-6">
                                <!--begin::Text-->
                                <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                            Flat cartoony illustrations with vivid
                            unblended colors and asymmetrical  beautiful purple hair lady
                        </span>
                                <!--end::Text-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                        <!--begin::Date-->
                                        <span class="fs-6 text-gray-700 fw-bold">Feb 6, 2021 </span>
                                        <!--end::Date-->

                                        <!--begin::Label-->
                                        <div class="fw-semibold text-gray-400">Due Date</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->

                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                        <!--begin::Number-->
                                        <span class="fs-6 text-gray-700 fw-bold">$<span class="ms-n1" data-kt-countup="true" data-kt-countup-value="284,900.00">0</span></span>
                                        <!--end::Number-->

                                        <!--begin::Label-->
                                        <div class="fw-semibold text-gray-400">Budget</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->

                            <!--begin::Footer-->
                            <div class="d-flex flex-stack mt-auto bd-highlight">
                                <!--begin::Users group-->
                                <div class="symbol-group symbol-hover flex-nowrap">
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                        <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo39/assets/media/avatars/300-2.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                                        <img alt="Pic" src="../assets/media/avatars/300-3.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                    </div>

                                </div>
                                <!--end::Users group-->

                                <!--begin::Actions-->
                                <a href="../apps/projects/project.html" class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">
                                    View Project

                                    <i class="ki-outline ki-exit-right-corner fs-4 ms-1"></i>
                                </a>
                                <!--end::Actions-->
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 18-->


    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-xxl-6">
        <!--begin::Engage widget 8-->
        <div class="card border-0 h-md-100" data-bs-theme="light" style="background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%)">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row align-items-center h-100">
                    <!--begin::Col-->
                    <div class="col-7 ps-xl-13">
                        <!--begin::Title-->
                        <div class="text-white mb-6 pt-6">
                            <span class="fs-4 fw-semibold me-2 d-block lh-1 pb-2 opacity-75">Get best offer</span>

                            <span class="fs-2qx fw-bold">Upgrade Your Plan</span>
                        </div>
                        <!--end::Title-->

                        <!--begin::Text-->
                        <span class="fw-semibold text-white fs-6 mb-8 d-block opacity-75">
                    Flat cartoony and illustrations with vivid unblended purple hair lady
                </span>
                        <!--end::Text-->

                        <!--begin::Items-->
                        <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-10 mb-xl-20">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center me-5 me-xl-13">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label" style="background: #35C7FF">
                                <i class="ki-outline ki-abstract-41 fs-5 text-white"></i>                            </span>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Info-->
                                <div class="text-white">
                                    <span class="fw-semibold d-block fs-8 opacity-75">Projects</span>
                                    <span class="fw-bold fs-7">Up to 500</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label" style="background: #35C7FF">
                                <i class="ki-outline ki-abstract-26 fs-5 text-white"></i>                            </span>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Info-->
                                <div class="text-white">
                                    <span class="fw-semibold opacity-75 d-block fs-8">Tasks</span>
                                    <span class="fw-bold fs-7">Unlimited</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->

                        <!--begin::Action-->
                        <div class="d-flex flex-column flex-sm-row d-grid gap-2">
                            <a href="projects.html#" class="btn btn-success flex-shrink-0 me-lg-2"  data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a>
                            <a href="projects.html#" class="btn btn-primary flex-shrink-0" style="background: rgba(255, 255, 255, 0.2)"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Read Guides</a>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-5 pt-10">
                        <!--begin::Illustration-->
                        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-end h-225px" style="background-image:url('/metronic8/demo39/assets/media/svg/illustrations/easy/5.svg">
                        </div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Engage widget 8-->

    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
