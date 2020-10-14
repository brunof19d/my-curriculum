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
                <label for="titleJobName" class="font-italic">Title name job</label>
                <input id="titleJobName" name="title_job" type="text" class="form-control" value="<?= isset($row) ? $row['title_job'] : ''; ?>" placeholder="Example: Web Developer">
            </div>

            <!--  Company  -->
            <div class="form-group">
                <label for="companyName" class="font-italic">Company Name</label>
                <input id="companyName"name="company_name" type="text" class="form-control" value="<?= isset($row) ? $row['company_name'] : ''; ?>" placeholder="Company">
            </div>

            <!--  Dates -->
            <div class="d-flex justify-content-center align-items-center mt-3">

                <!-- Begin-->
                <div class="form-group mr-2 text-center">
                    <label class="font-italic">Date Begin</label>
                    <input name="date_begin" type="date" class="form-control" value="<?= isset($row) ? $row['date_begin'] : ''; ?>">
                </div>

                <!-- End-->
                <div class="form-group ml-2 text-center">
                    <label id="label_end" style="display:<?= $cssDisplay ?>" class="font-italic">Date End</label>
                    <input id="date_end" style="display:<?= $cssDisplay ?>" name="date_end" type="date" class="form-control" value="<?= isset($row) ? $row['date_end'] : ''; ?>">
                </div>

                <!--  Check Current -->
                <div class="form-check-inline ml-2 mt-3">
                    <label for="check" class="form-check-label font-italic">Current</label>
                    <input id="check" onclick="checkBox()" name="current" type="checkbox" class="form-check-input ml-2" value="1" <?= isset($row) ? ($row['current'] == 1) ? 'checked' : '' : ''; ?>/>
                </div>

            </div>

            <!--  Description -->
            <div class="form-group">
                <label for="descriptionText" class="font-italic">Description</label>
                <textarea id="descriptionText" name="description" class="form-control" rows="6" placeholder="Description text here"><?= isset($row) ? $row['description'] : ''; ?></textarea>
            </div>

            <button class="btn btn-success w-100 mb-3 mt-3"><?= $button; ?></button>

    </form>

</div>

<!-- JavaScript Function for input Date End ( Enable/Disable ) -->
<script >
   <?php require __DIR__ . '/../../../../public/js/checkCurrent.js'; ?>
</script>