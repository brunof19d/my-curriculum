<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">

    <h4 class="text-center mt-3"><u>Education </u></h4>

    <form method="post" action="/controller-education" class="mt-3">

        <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

        <input type="hidden" name="id" value="<?= isset($row) ? $row['id'] : ''; ?>">

        <!-- College Name -->
        <div class="form-group">
            <label for="collegeName">College Name</label>
            <input id="collegeName" type="text" class="form-control" name="college_name"
                   value="<?= isset($row) ? $row['name_college'] : ''; ?>"
                   placeholder="Example: University of Michigan">
        </div>

        <!-- Dates -->
        <div class="d-flex justify-content-center align-items-center mt-3">
            <!--  Begin -->
            <div class="form-group mr-2 text-center">
                <label for="dateBegin" class="font-italic">Date Begin</label>
                <input id="dateBegin" name="date_begin" type="date" class="form-control"
                       value="<?= isset($row) ? $row['date_begin'] : ''; ?>">
            </div>
            <!--  End -->
            <div class="form-group ml-2 text-center">
                <label for="dateEnd" class="font-italic">Date End</label>
                <input id="dateEnd" name="date_end" type="date" class="form-control"
                       value="<?= isset($row) ? $row['date_end'] : ''; ?>">
            </div>
        </div>

        <!-- Degree -->
        <div class="form-group">
            <label for="degreeName">Degree</label>
            <input id="degreeName" type="text" name="degree" class="form-control"
                   value="<?= isset($row) ? $row['degree'] : ''; ?>"
                   placeholder="Example: Bachelor's Degree in Computer Science">
        </div>

        <button class="btn btn-success w-100 mb-2" type="submit"><?= $button; ?></button>

    </form>

</div>

