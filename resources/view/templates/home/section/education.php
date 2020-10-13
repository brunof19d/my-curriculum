<p class="title-main"><i class="fas fa-university"></i><strong>Education</strong>
    <?php \App\Helper\ButtonAdmin::addButton('/add-education'); ?>
</p>

<?php foreach ($queryEducation as $education): ?>

    <!-- Name College -->
    <p class="p-color"><strong><?= $education->getCollegeName(); ?></strong></p>

    <!-- Dates -->
    <p class="p-color"><i class="far fa-calendar-alt"></i>
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


