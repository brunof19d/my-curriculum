<div class="border mt-3 shadow">
    <div class="m-2">

        <p class="title-main">
            <i class="fas fa-university"></i>
            <strong>Education</strong>
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <a href="/add-education" class="btn btn-success btn-sm ml-1">Add</a>
            <?php endif; ?>
        </p>

        <?php /** @var Admin | Main $queryEducation */ ?>
        <?php foreach ($queryEducation as $education): ?>

            <!-- Name College -->
            <p><strong><?= $education->getCollegeName(); ?></strong></p>


            <!-- Dates -->
            <p>
                <i class="far fa-calendar-alt"></i>
                <strong>
                    <?php
                    $dateBeginDB = $education->getDataBegin();
                    $date = new DateTime($dateBeginDB);
                    echo $date->format('Y');
                    ?>
                    -
                    <?php
                    $dateBeginDB = $education->getDataEnd();
                    $date = new DateTime($dateBeginDB);
                    echo $date->format('Y');
                    ?>
                </strong>
            </p>

            <!-- Degree -->
            <p> <?= $education->getDegree(); ?> </p>

            <!-- Buttons -->
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <div class="d-flex justify-content-start">
                    <a href="/edit-education?id=<?= $education->getId(); ?>" class="btn btn-dark btn-sm ml-1">Edit</a>
                    <a href="/delete-education?id=<?= $education->getId(); ?>" class="btn btn-danger btn-sm ml-1">Delete</a>
                </div>
            <?php endif; ?>
            <hr>
        <?php endforeach; ?>

        <!-- Courses -->
        <p class="title-main"><i class="fas fa-graduation-cap"></i><strong>Courses</strong></p>

        <!-- Button Edit -->
        <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
            <div class="d-flex justify-content-center">
                <a href="/home" class="btn btn-dark btn-edit w-25">Edit</a>
            </div>
        <?php endif; ?>

        <div class="m-2 d-flex justify-content-center">
            <a href="#" class="myButton">Show all</a>
        </div>

    </div>
</div>
