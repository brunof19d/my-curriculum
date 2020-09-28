<?php

// Require Header Admin
require_once __DIR__ . '/../../includes/header-admin.php';

// Enable and Disable label date_end
if (isset($row)) {
    if ($row['current'] == 1) {
        $cssDisplay = 'none';
    } else {
        $cssDisplay = 'block';
    }
}

?>

<div class="container border bg-light mt-4">

    <form method="post" action="/controller-work">

        <input type="hidden" name="id" value="<?= isset($row) ? $row['id'] : ''; ?>"/>

        <div class="edit-basic mt-3">
            <h4 class="text-center">Work Experience</h4>

            <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

            <!--  Title Job Name -->
            <div class="form-group">
                <label class="font-italic">Title name job</label>
                <input name="title_job" type="text" class="form-control"
                       value="<?= isset($row) ? $row['title_job'] : ''; ?>">
            </div>

            <!--  Company  -->
            <div class="form-group">
                <label class="font-italic">Company Name</label>
                <input name="company_name" type="text" class="form-control"
                       value="<?= isset($row) ? $row['company_name'] : ''; ?>">
            </div>

            <!--  Dates Jobs-->
            <div class="d-flex justify-content-center align-items-center mt-3">

                <!--  Dates Begin-->
                <div class="form-group mr-2 text-center">
                    <label class="font-italic">Date Begin</label>
                    <input name="date_begin" type="date" class="form-control" value="<?= isset($row) ? $row['data_begin'] : ''; ?>">
                </div>

                <!--  Dates End-->
                <div class="form-group ml-2 text-center">
                    <label id="label_end" style="display:<?= $cssDisplay ?>" class="font-italic">Date End</label>
                    <input id="date_end" style="display:<?= $cssDisplay ?>" name="date_end" type="date" class="form-control" value="<?= isset($row) ? $row['data_end'] : ''; ?>">
                </div>

                <!--  Check Current -->
                <div class="form-check-inline ml-2 mt-3">
                    <label class="form-check-label font-italic">Current</label>
                    <input id="check" onclick="checkBox()" name="current" type="checkbox" class="form-check-input ml-2" value="1" <?= isset($row) ? ($row['current'] == 1) ? 'checked' : '' : ''; ?>/>
                </div>
            </div>

            <!--  Description -->
            <div class="form-group">
                <label class="font-italic">Description</label>
                <textarea name="description" class="form-control" rows="6"><?= isset($row) ? $row['description'] : ''; ?></textarea>
            </div>
            <hr>

            <?php /** @var FormEditWork | FormAddWork $button */ ?>
            <button class="btn btn-success w-100 mb-3 mt-3"><?= $button; ?></button>

    </form>

</div>

<!-- JavaScript Function for input Date End ( Enable/Disable ) -->
<script >
    function checkBox() {
        if (document.getElementById("check").checked === true) {
            document.getElementById("label_end").style.display = "none"
            document.getElementById("date_end").style.display = "none"
        } else {
            document.getElementById("label_end").style.display = "block"
            document.getElementById("date_end").style.display = "block"
        }
    }
</script>