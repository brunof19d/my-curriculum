<div class="row">
    <div class="left-panel col-sm-4">

        <div class="border mb-1 shadow">
            <?php /** @var FormEditPersonalData $row */ ?>
            <!-- Photo and Name -->
            <div class="img-profile mb-2">
                <img src="img/<?= $row['photo']; ?>" alt="Image Profile" width="100%" height="230">
                <h1 class="text-img"><?= $row['name']; ?></h1>
            </div>

            <!-- Button Edit -->
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <div class="d-flex justify-content-start">
                    <a href="/edit-personal-data" class="btn btn-dark btn-sm m-2">Edit</a>
                </div>
            <?php endif; ?>

            <!-- Info Label -->
            <div class="m-2">


                <p><i class="fas fa-briefcase"></i><?= $row['job']; ?></p>
                <p><i class="fas fa-home"></i><?= $row['city']; ?>, <?= $row['country']; ?></p>
                <p><i class="far fa-envelope"></i><?= $row['email']; ?></p>
                <p><i class="fas fa-phone"></i><?= $row['phone']; ?></p>

                <hr>

                <p><i class="fas fa-bullseye"></i><strong>Skills</strong></p>
                <!-- Button Edit -->
                <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                    <div class="d-flex justify-content-start">
                        <a href="/edit-skills" class="btn btn-dark btn-sm">Manage</a>
                    </div>
                <?php endif; ?>
                <p class=""><b>Front End</b></p>
                <?php foreach ($queryFrontEnd as $row): ?>
                <p><?= $row['name_skill']; ?></p>
                <?php endforeach; ?>
                <p>Framework: jQuery</p>

                <hr>

                <p><strong>Back End</strong></p>
                <p>PHP</p>
                <p>Framework: Laravel</p>

                <hr>

                <p class=""><b>Database and SQL</b></p>
                <p>MySQL</p>

                <hr>

                <p><i class="fas fa-globe-europe"></i><strong>Languages</strong></p>
                <p>Portuguese</p>
                <p>English</p>

            </div>

        </div>

    </div>

