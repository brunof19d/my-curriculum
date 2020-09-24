<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">
    <form method="post" action="/make-edit-work" class="mt-3">
        <div class="d-flex justify-content-end">
            <a href="/admin" class="btn btn-dark">Back</a>
        </div>

        <div class="edit-basic">
            <h4 class="text-center">Work Experience</h4>

            <!--  Title Job Name -->
            <div class="d-flex justify-content-center align-items-center">
                <label>Titlle name job:</label>
                <input name="title_job" type="text" class="ml-2 form-control w-50" value="">
            </div>
            <hr>

            <!--  Dates Jobs-->
            <div class="d-flex justify-content-center align-items-center mt-3">
                <!--  Dates Begin-->
                <div class="form-group">
                    <label>Date Begin:</label>
                    <input name="date_begin" type="date" class="form-control" value="">
                </div>
                <!--  Dates End-->
                <div class="form-group ml-2">
                    <label>Date End:</label>
                    <input name="date_end" type="date" class="form-control" value="">
                </div>
                <!--  Check Current -->
                <div class="form-check-inline ml-2 mt-3">
                    <label class="form-check-label">Current</label>
                    <input name="current" type="checkbox" class="form-check-input ml-2" value="1">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="comment">Description:</label>
                <textarea name="description" class="form-control" rows="6" id="comment"></textarea>
            </div>
            <hr>
            <button class="btn btn-success w-100 mb-3 mt-3">Save</button>
    </form>
</div>