<!-- Label Work -->
<div class="border shadow">
    <div class="m-4">

        <p class="title-main">
            <i class="fas fa-briefcase"></i>
            <strong>Work Experience</strong>
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <a href="/add-work-page" class="btn btn-success btn-sm ml-1">Add</a>
            <?php endif; ?>
        </p>
        <div id="loop-hr">
        <?php /** @var \App\Entity\Model\Admin $query */ ?>
        <?php foreach ($queryWork as $work): ?>

            <!-- Title Job -->
            <p class="p-color"><strong><?= $work->getTitleJob(); ?> / <?= $work->getCompanyName(); ?></strong></p>

            <!-- Dates Section Begin -->
            <i class="far fa-calendar-alt"></i>
            <?php
            $dateDatabase = $work->getDataBegin();
            $date = new DateTime($dateDatabase);
            echo $date->format('M Y');
            ?>
            <span class="">-</span>
            <?php if ($work->getCurrent() == 1) : ?>
                <b class="current-border"><?= 'Current'; ?></b>
            <?php else:
                $dateDatabase = $work->getDataEnd();
                $date = new DateTime($dateDatabase);
                echo $date->format('M Y');
                endif;
            ?>
            <!-- Dates Section End -->

            <!-- Description -->
            <p class="m-2"><?= nl2br($work->getDescription()); ?></p>

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
</div>
