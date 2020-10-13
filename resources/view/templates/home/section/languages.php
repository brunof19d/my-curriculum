<p class="left-icon">
    <i class="fas fa-globe-europe"></i>
    <strong>Languages</strong>
    <!-- Button Add Admin -->
    <?php \App\Helper\ButtonAdmin::addButton('/add-language'); ?>
</p>
<div id="loop-hr">
<?php foreach ($queryLanguage as $language): ?>

    <div class="d-flex align-items-center justify-content-between">
        <p class="m-1"><strong><?= $language->getNameLanguage(); ?></strong><br>
            <?= $language->getLevelLanguage(); ?>
        </p>

        <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
            <a href="/delete-language?id=<?= $language->getId(); ?>" class="btn btn-danger btn-sm"> Delete </a>
        <?php endif; ?>
    </div>
<hr>
<?php endforeach; ?>
</div>
