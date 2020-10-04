<!-- Label Work -->
<div class="border shadow">
    <div class="m-2">

        <p class="title-main">
            <i class="fas fa-briefcase"></i>
            <strong>Work Experience</strong>
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <a href="/add-work-page" class="btn btn-success btn-sm ml-1">Add</a>
            <?php endif; ?>
        </p>

        <?php /** @var \App\Entity\Model\Admin $query */ ?>
        <?php foreach ($queryWork as $work): ?>

            <!-- Title Job -->
            <p><strong><?= $work->getTitleJob(); ?> / <?= $work->getCompanyName(); ?></strong></p>

            <!-- Dates Section Begin -->
            <i class="far fa-calendar-alt"></i>
            <?php
            $dateDatabase = $work->getDataBegin();
            $date = new DateTime($dateDatabase);
            echo $date->format('M Y');
            ?>
            <span class="ml-1 mr-1">-</span>
            <?php
            if ($work->getCurrent() == 1) {
                echo 'Current';
            } else {
                $dateDatabase = $work->getDataEnd();
                $date = new DateTime($dateDatabase);
                echo $date->format('M Y');
            }
            ?>
            <!-- Dates Section End -->

            <!-- Description -->
            <p class="mt-2"><?= $work->getDescription(); ?></p>

            <!-- Buttons -->
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <div class="d-flex align-items-center">
                    <a href="/edit-work?edit=<?= $work->getId(); ?>" class="btn btn-dark btn-sm ml-1">Edit</a>
                    <a href="/delete-work?id=<?= $work->getId(); ?>" class="btn btn-danger btn-sm ml-1">Delete</a>
                </div>
            <?php endif; ?>
            <hr>
        <?php endforeach; ?>

    </div>
</div>
