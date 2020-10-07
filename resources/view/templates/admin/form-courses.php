<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<?php require_once __DIR__ . '/../../includes/alert.php'; ?>

<div class="container bg-light">
    <h4 class="text-center">Courses</h4>
    <form method="post" action="/controller-courses" enctype="multipart/form-data">

        <!-- Institution -->
        <div class="d-flex align-items-baseline">
            <label>Institution</label>
            <select class=" w-25 ml-1" name="institution">
                <?php foreach ($queryInstitution as $institution): ?>
                    <option value="<?= $institution->getInstitutionId(); ?>">
                        <?= $institution->getInstitutionName(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Category -->
        <div class="d-flex align-items-baseline">
            <label>Category</label>
            <select class=" w-25 ml-1" name="category">
                <?php foreach ($queryCategory as $category): ?>
                    <option value="<?= $category->getCategoryId(); ?>">
                        <?= $category->getCategoryName(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Course -->
        <div class="form-group">
            <label>Course</label>
            <input type="text" name="course_name" class="w-75">
        </div>

        <!-- Description -->
        <div class="form-group">
            <label>Description ( Optional )</label>
            <textarea name="course_description" class="form-control"></textarea>
        </div>

        <!-- Certified -->
        <label>Certified ( Optional )</label>
        <div class="custom-file w-25">
            <input type="file" class="custom-file-input" name="certified_file">
            <label class="custom-file-label">Choose file</label>
        </div>

        <div class="form-group">
            <label>If you prefer you can put a URL to forward to the site. (Optional)</label>
            <input type="text" class="form-control" name="certified_url">
        </div>


        <button type="submit" name="register_course" class="btn btn-success mb-3 w-25 d-block mt-3">Save</button>

    </form>
</div>

<div class="container bg-light mt-3">
    <form method="post" class="" action="/controller-courses">
        <div class="form-group">
            <label>Register Institution:</label>
            <input type="text" class="form-control" name="institution_name">
        </div>
        <button name="register_institution" type="submit" class="btn btn-primary w-25 mb-2">Register</button>
    </form>
</div>

<div class="container bg-light mt-3">
    <form method="post" class="" action="/controller-courses">
        <div class="form-group">
            <label>Register Category:</label>
            <input type="text" class="form-control" name="name_category">
        </div>
        <button name="register_category" type="submit" class="btn btn-primary w-25 mb-2">Register</button>
    </form>
</div>