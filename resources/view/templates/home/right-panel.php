<div class="right-panel col-sm-8 shadow-lg">
    <!-- Label Work -->
    <div class="border shadow">
        <div class="m-2">
            <p class="title-main"><i class="fas fa-briefcase"></i><strong>Work Experience</strong></p>

            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <div class="d-flex justify-content-center">
                    <a href="/edit-work" class="btn btn-dark btn-edit w-25">Edit</a>
                </div>
            <?php endif; ?>

            <?php /** @var \App\Entity\Model\Admin $query */ ?>
            <?php foreach ($query as $work): ?>
                <hr>
                <!-- Title Job -->
                <p><strong><?= $work->getTitleJob(); ?></strong></p>
                <!-- Dates -->
                <p>
                    <i class="far fa-calendar-alt"></i>
                    <!-- Date Begin-->
                    <?= $work->getDataBegin(); ?>
                    <span>-</span>
                    <!-- Date End-->
                    <?= $work->getDataEnd(); ?>
                </p>
                <!-- Descriptions -->
                <p><?= $work->getDescription(); ?></p>
            <?php endforeach; ?>

        </div>
    </div>

    <div class="border mt-3 shadow">
        <div class="m-2">
            <p class="title-main"><i class="fas fa-university"></i><strong>Education</strong>

                <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
            <div class="d-flex justify-content-center">
                <a href="/home" class="btn btn-dark btn-edit mb-2 w-25">Edit</a>
            </div>
            <?php endif; ?>

            <p><strong>University</strong></p>
            <p><i class="far fa-calendar-alt"></i><strong> 2010 - 2015</strong></p>
            <p>Bachelor Degree</p>

            <hr>

            <p><strong>Technical</strong></p>
            <p><i class="far fa-calendar-alt"></i><strong> 2005 - 2008</strong></p>
            <p>Computer technical course.</p>

            <hr>

            <p class="title-main"><i class="fas fa-graduation-cap"></i><strong>Courses</strong></p>

            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <div class="d-flex justify-content-center">
                    <a href="/home" class="btn btn-dark btn-edit w-25">Edit</a>
                </div>
            <?php endif; ?>

            <!-- Buttons -->
            <div class="m-2 d-flex justify-content-center">
                <a href="#" class="myButton">Show all</a>
            </div>

        </div>
    </div>

</div>
