<?php require_once __DIR__ . "/../../includes/header.php"; ?>

<div class="container">

    <?php /** @var \App\Helper\RenderHtml $action */ ?>
    <form method="post" action="<?= $action; ?>" class="card mx-auto w-50">

        <div class="card-header p-5 text-center">
            <h1>Administrative Page.</h1>

            <?php if ($_SERVER['PATH_INFO'] == '/register'): ?>
                <a href="/admin" class="btn btn-dark m-2">Back</a>
            <?php endif; ?>

        </div>

        <div class="card-body p-5">

            <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

            <!-- Input Email -->
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" placeholder="email@email.com"/>
            </div>

            <!-- Input Password -->
            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" placeholder="*****"/>
            </div>

            <!-- Input Button -->
            <div class="form-group">
                <?php /** @var \App\Helper\RenderHtml $button */ ?>
                <button class="btn btn-dark btn-lg"><?= $button; ?></button>
            </div>

        </div>
    </form>
</div>


