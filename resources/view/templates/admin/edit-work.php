<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">
    <form method="post" action="" class="mt-3">
        <div class="d-flex justify-content-end">
            <a href="/admin" class="btn btn-dark">Back</a>
        </div>
        <div class="edit-basic">
            <h4 class="text-center">Work Experience</h4>

            <!--  Title Name -->
            <div class="d-flex justify-content-center align-items-center">
                <label>Titlle name job:</label>
                <input type="text" class="ml-2 form-control w-50" value="Title name">
            </div>
            <hr>

            <!--  Dates Jobs-->
            <div class="d-flex justify-content-center align-items-center mt-3">
                <!--  Dates Begin-->
                <div class="form-group">
                    <label>Date Begin:</label>
                    <input type="text" class="form-control" value="Title name">
                </div>
                <!--  Dates End-->
                <div class="form-group ml-2">
                    <label>Date End:</label>
                    <input type="text" class="form-control" value="Title name">
                </div>
                <!--  Check Current -->
                <div class="form-check-inline ml-2 mt-3">
                    <label class="form-check-label">Current</label>
                    <input type="checkbox" class="form-check-input ml-2" value="">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="comment">Description:</label>
                <textarea class="form-control" rows="6" id="comment"></textarea>
            </div>
            <hr>
            <a href="" class="btn btn-success w-100 mb-3 mt-3">Save</a>
    </form>
</div>