<?php require_once __DIR__ . "/../../includes/header.php"; ?>

<div class="container">
    <form method="post" action="/make-login" class="card mx-auto w-50">
        <div class="card-header p-5 text-center">
            <h1>Administrative Page.</h1>
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
                <button class="btn btn-dark btn-lg">Login</button>
            </div>
        </div>
    </form>
</div>


