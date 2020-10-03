<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">
    <h4 class="text-center">Skills</h4>
    <?php require_once __DIR__ . '/../../includes/alert.php'; ?>
    <div class="d-flex justify-content-center justify-content-lg-around mt-3">

        <!--  FrontEnd -->
        <div class="card m-1">
            <a href="/add-skills" class="btn btn-success btn-sm">Add</a>
            <p class="m-2 font-weight-bold text-info text-center">FrontEnd</p>
            <div class="d-block m-2">
                <ul class="list-group list-group-flush d-flex">
                    <?php foreach ($queryFrontEnd as $row): ?>
                    <li class="list-group-item">
                        <b class="font-italic"><?= $row['name_skill']; ?></b>
                        <a href="/delete-skills?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!--  BackEnd -->
        <div class="card m-1">
            <a href="/add-skills" class="btn btn-success btn-sm">Add</a>
            <p class="m-2 font-weight-bold text-info text-center">BackEnd</p>
            <div class="d-block m-2">
                <ul class="list-group list-group-flush d-flex">
                    <?php foreach ($queryBackEnd as $row): ?>
                    <li class="list-group-item">
                        <b class="font-italic"><?= $row['name_skill']; ?></b>
                        <a href="/delete-skills?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!--  Database -->
        <div class="card m-1">
            <a href="/add-skills" class="btn btn-success btn-sm">Add</a>
            <p class="m-2 font-weight-bold text-info text-center">Database</p>
            <div class="d-block m-2">
                <ul class="list-group list-group-flush d-flex">
                    <?php foreach ($queryDatabase as $row): ?>
                    <li class="list-group-item">
                        <b class="font-italic"><?= $row['name_skill']; ?></b>
                        <a href="/delete-skills?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</div>
