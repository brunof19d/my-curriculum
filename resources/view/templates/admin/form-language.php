<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">
    <h4 class="text-center">Languages</h4>

    <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

    <form method="post" action="/save-language" class="d-flex justify-content-center align-items-center">
        <label class="m-1">Language</label>
        <input type="text" name="language" class="m-1">
        <button type="submit" class="btn btn-success m-1">Save</button>
    </form>
</div>

