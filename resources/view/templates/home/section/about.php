<?php require_once __DIR__ . '/../../../includes/header.php'; ?>

<div class="row mt-3">
    <div class="left-panel col-sm-3">
        <div class="border mb-1 shadow">
            <?php require_once __DIR__ . '/personal-data.php'; ?>
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="container bg-light border rounded">
        <a href="/home" class="btn btn-back mt-2">Home</a>
        <h4 class="text-center mb-3"><u>About</u></h4><hr>
        <p><?= nl2br($queryAbout['text']); ?></p>
    </div>
</div>

<?php require_once __DIR__ . '/../../../includes/footer.php'; ?>