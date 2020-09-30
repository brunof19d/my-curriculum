<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

    <div class="container border bg-light">

        <form method="post" action="/controller-personal-data" enctype="multipart/form-data" class="mt-3">

            <?php

            require_once __DIR__ . '/../../includes/alert.php';

            require_once __DIR__ . '/section/basic-data.php';

            require_once __DIR__ . '/section/skills.php';

            require_once __DIR__ . '/section/languages.php';

            ?>

            <button class="btn btn-success w-100 mb-3">Save</button>

        </form>

    </div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>