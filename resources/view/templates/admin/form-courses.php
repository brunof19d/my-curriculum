<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<?php require_once __DIR__ . '/../../includes/alert.php'; ?>

    <div class="container bg-light">

        <!-- Title and Button all courses -->
        <div class="d-flex m-3 justify-content-center align-items-center">
            <h4 class="mt-3"><u>Courses</u></h4>
        </div>

        <form method="post" action="/controller-courses" enctype="multipart/form-data">

            <!-- Institution Select -->
            <div class="form-group">
                <label for="selectInstitution" class="font-italic">Institution</label>
                <a href="#instituion" class="btn btn-success btn-sm">Add</a>
                <select id="selectInstitution" class="form-control" name="institution" required>
                    <option selected disabled value="">Choose...</option>
                    <?php foreach ($queryInstitution as $institution): ?>
                        <option value="<?= $institution->getInstitutionId(); ?>"><?= $institution->getInstitutionName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Category Select -->
            <div class="form-group">
                <label for="selectCategory" class="font-italic">Category</label>
                <a href="#category" class="btn btn-success btn-sm">Add</a>
                <select id="selectCategory" class="form-control" name="category" required>
                    <option selected disabled value="">Choose...</option>
                    <?php foreach ($queryCategory as $category): ?>
                        <option value="<?= $category->getCategoryId(); ?>"><?= $category->getCategoryName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Course -->
            <div class="form-group">
                <label for="nameCourse" class="font-italic">Course</label>
                <input id="nameCourse" type="text" name="course_name" class="form-control" placeholder="Name Course"
                       required>
            </div>


            <!-- Description -->
            <div class="form-group">
                <label for="descriptionCourse" class="font-italic">Description ( Optional )</label>
                <textarea id="descriptionCourse" name="course_description" class="form-control" placeholder="Description here" rows="5"></textarea>
            </div>

            <!-- Certified File -->
            <div class="form-group">
                <label class="font-italic">Certified ( Optional )</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="certified_file">
                    <label class="custom-file-label" class="font-italic">Choose file</label>
                </div>
            </div>

            <!-- Certified URL -->
            <div class="form-group">
                <label for="urlCourse" class="font-italic">If you prefer you can put a URL to forward to the site. (Optional)</label>
                <input id="urlCourse" type="text" class="form-control" name="certified_url" placeholder="https://www.url.com.br/course">
            </div>

            <button type="submit" name="register_course" class="btn btn-success mb-3 w-100">Save</button>

        </form>

    </div>

    <!-- Form Institution -->
<?php require_once __DIR__ . '/section/form-institution.php'; ?>

    <!-- Form Category -->
<?php require_once __DIR__ . '/section/form-category.php'; ?>