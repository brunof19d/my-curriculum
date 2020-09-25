<!-- Label Work -->
<div class="border shadow">
    <div class="m-2">
        <p class="title-main">
            <i class="fas fa-briefcase"></i>
            <strong>Work Experience</strong>
            <a href="/add-work-page" class="btn btn-success btn-sm ml-1">Add</a>
        </p>

        <?php /** @var \App\Entity\Model\Admin $query */ ?>
        <?php foreach ($query as $work): ?>
            <hr>
            <p><strong><?= $work->getTitleJob(); ?></strong></p>

            <i class="far fa-calendar-alt"></i>
            <?= $work->getDataBegin(); ?>
            <span class="ml-1 mr-1">-</span>
            <?= $work->getDataEnd(); ?>

            <p class="mt-2"><?= $work->getDescription(); ?></p>

            <!-- Buttons -->
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <div class="d-flex align-items-center">
                    <a href="/edit-work?edit=<?= $work->getId(); ?>" class="btn btn-dark btn-sm ml-1">Edit</a>
                    <a href="/edit-work" class="btn btn-danger btn-sm ml-1">Delete</a>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>

    </div>
</div>
