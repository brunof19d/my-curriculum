<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>


<div class="container bg-light">

    <div class="m-5">

        <h4 class="text-center">About</h4>

        <form method="post">

            <div class="form-group">

                <label for="descriptionText" class="font-italic">Description</label>

                <textarea id="descriptionText" name="description" class="form-control" rows="6" placeholder="Description text here"></textarea>

            </div>

            <button type="submit" class="btn btn-dark w-100 mb-5">Edit</button>

        </form>

    </div>

</div>