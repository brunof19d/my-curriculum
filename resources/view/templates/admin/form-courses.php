<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<?php require_once __DIR__ . '/../../includes/alert.php'; ?>

<div class="container bg-light">

    <!-- Title and Button all courses -->
    <div class="d-flex m-3 justify-content-center">
        <h4 class="text-center">Courses</h4>
        <a href="/table-courses" class="btn btn-dark ml-3">Show all Courses </a>
    </div>

    <form method="post" action="/controller-courses" enctype="multipart/form-data">

        <!-- Institution Select -->
        <div class="d-flex align-items-baseline">
            <label>Institution</label>
            <select class=" w-25 ml-1" name="institution">
                <option selected disabled value="">Choose...</option>
                <?php foreach ($queryInstitution as $institution): ?>
                    <option value="<?= $institution->getInstitutionId(); ?>"><?= $institution->getInstitutionName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Category Select -->
        <div class="d-flex align-items-baseline">
            <label>Category</label>
            <select class=" w-25 ml-1" name="category">
                <option selected disabled value="">Choose...</option>
                <?php foreach ($queryCategory as $category): ?>
                    <option value="<?= $category->getCategoryId(); ?>"><?= $category->getCategoryName(); ?></option>
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

        <!-- Certified File -->
        <label>Certified ( Optional )</label>
        <div class="custom-file w-25">
            <input type="file" class="custom-file-input" name="certified_file">
            <label class="custom-file-label">Choose file</label>
        </div>

        <!-- Certified URL -->
        <div class="form-group">
            <label>If you prefer you can put a URL to forward to the site. (Optional)</label>
            <input type="text" class="form-control" name="certified_url">
        </div>

        <button type="submit" name="register_course" class="btn btn-success mb-3 w-25 d-block mt-3">Save</button>

    </form>

</div>

<!-- Form Institution -->
<?php require_once __DIR__ . '/section/form-institution.php'; ?>

<!-- Form Category -->
<?php require_once __DIR__ . '/section/form-category.php'; ?>