<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="row mt-3">
    <div class="left-panel col-sm-3">
        <div class="border mb-1 shadow">
            <?php require_once __DIR__ . '/../home/section/personal-data.php'; ?>
        </div>
    </div>
</div>

<div class="container bg-light col-sm-6 ml-5">

    <div class="m-5">

        <h4 class="text-center">About</h4>

        <form method="post" action="/controller-about">

            <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

            <div class="form-group">
                <input type="hidden" name="id" value="<?= $queryAbout['id']?>">
                <label for="descriptionText" class="font-italic">Description</label>
                <textarea id="descriptionText" name="text" class="form-control" rows="6"><?= $queryAbout['text']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-success w-100 mb-5">Save</button>

        </form>

    </div>

</div>
