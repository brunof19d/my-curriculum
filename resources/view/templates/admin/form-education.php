<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">
    <h4 class="text-center mt-3"> Education </h4>
    <form method="post" action="/controller-education" class="mt-3">

        <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

        <input type="hidden" name="id" value="<?= isset($row) ? $row['id']: ''; ?>">
        <!-- College Name -->
        <div class="form-group">
            <label>College Name</label>
            <input type="text" class="form-control" name="college_name" value="<?= isset($row) ? $row['name_college']: ''; ?>">
        </div>

        <!-- Dates -->
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="form-group mr-2 text-center">
                <label class="font-italic">Date Begin</label>
                <input name="date_begin" type="date" class="form-control" value="<?= isset($row) ? $row['date_begin']: ''; ?>">
            </div>
            <div class="form-group ml-2 text-center">
                <label id="label_end" class="font-italic">Date End</label>
                <input id="date_end" name="date_end" type="date" class="form-control" value="<?= isset($row) ? $row['date_end']: ''; ?>">
            </div>
        </div>

        <!-- Degree -->
        <div class="form-group">
            <label>Type of Degree</label>
            <input type="text" name="degree" class="form-control" value="<?= isset($row) ? $row['degree']: ''; ?>">
            <small> Example: Bachelor`s Degree, Technical Degree, Master Degree, etc</small>
        </div>
        <hr>
        <!-- Buttons -->
        <?php /** @var FormAddEducation | FormEditEducation $button */ ?>
        <button class="btn btn-success w-100 mb-2" type="submit"><?= $button; ?></button>
    </form>


</div>
