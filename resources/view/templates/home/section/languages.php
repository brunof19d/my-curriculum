<p>
    <i class="fas fa-globe-europe"></i>
    <strong>Languages</strong>
    <!-- Button Add Admin -->
    <?php \App\Helper\ButtonAdmin::addButton('/add-language'); ?>
</p>

<?php foreach ($queryLanguage as $language): ?>

    <p class="d-flex align-items-center justify-content-between">
        <?= $language->getNameLanguage(); ?><br>
        <?= $language->getLevelLanguage(); ?>
        <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
            <a href="/delete-language?id=<?= $language->getId(); ?>" class="btn btn-danger btn-sm"> Delete </a>
        <?php endif; ?>
    </p>

<?php endforeach; ?>
