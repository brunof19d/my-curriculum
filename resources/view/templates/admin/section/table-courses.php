<?php require_once __DIR__ . '/../../../includes/header.php' ?>

<!-- Buttons Admin -->
<?php if (isset($_SESSION['logged']) == TRUE): ?>
    <div class="d-flex justify-content-start">
        <a href="/add-course" class="btn btn-success m-1">Add</a>
        <a href="/admin" class="btn btn-primary m-1">Back admin page</a>
    </div>
<?php endif; ?>

<!-- Input search and Button back Home -->
<div class="d-flex align-items-center justify-content-between">
    <input type="text" id="searchCourse" class="mt-2" onkeyup="inputSearchCourses()"
           placeholder="Search for names courses">
    <a href="/home" class="btn btn-primary btn-back">Back</a>
</div>

<?php require_once __DIR__ . '/../../../includes/alert.php'; ?>

<table id="tableCourses" class="table table-striped table-bordered mt-1 table-responsive">

    <thead class="text-center">
    <tr>
        <th class="w-100">
            <p>Course</p>
            <?php require_once __DIR__ . '/../../../includes/filter-table-course.php'; ?>
        </th>
        <th>Institution</th>
        <th>Category</th>
        <th>Certified</th>
        <th>Featured in the table (only 5)</th>
        <?php if (isset($_SESSION['logged']) == TRUE): ?>
            <th class="text-center">#</th>
        <?php endif; ?>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($queryCourses as $course): ?>
        <tr>
            <td>
                <p><?= $course->getCourseName(); ?></p>
                <?php if (strlen($course->getCourseDescription()) > 0): ?>
                    <hr class="line-table-description"><p><?= $course->getCourseDescription(); ?></p>
                <?php endif; ?>
            </td>
            <td class="text-center"><?= \App\Helper\TranslateInstitution::handle($course->getInstitution()); ?></td>
            <td class="text-center"><?= \App\Helper\TranslateCategory::handle($course->getCategory()); ?></td>
            <td class="text-center"><?php require __DIR__ . '/../../../includes/certified-file-url.php'; ?></td>
            <!-- Highlight <td> -->
            <?php require __DIR__ . '/../../../includes/table-highlight-course.php'; ?>

            <!-- Button Delete Course -->
            <?php if (isset($_SESSION['logged']) == TRUE): ?>
                <td>
                    <a href="/delete-course?id=<?= $course->getCourseId(); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>

<script><?php require __DIR__ . '/../../../../../public/js/inputSearch.js'; ?></script>

<?php require_once __DIR__ . '/../../../includes/footer.php' ?>
