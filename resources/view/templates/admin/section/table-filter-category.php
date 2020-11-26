<?php require_once __DIR__ . '/../../../includes/header.php' ?>

<div class="d-flex align-items-center justify-content-between">
    <input type="text" id="searchCourse" class="mt-2" onkeyup="inputSearchCourses()"
           placeholder="Search for names courses">
    <a href="/table-courses" class="btn btn-primary btn-back">Back default table</a>
</div>

<table id="tableCourses" class="table table-striped table-bordered mt-1 table-responsive">
    <thead>
    <tr>
        <th class="w-100 text-center">Course</th>
        <th class="text-center">Institution</th>
        <th class="text-center"><b>Category</b></th>
        <th class="text-center">Certified</th>
        <?php if (isset($_SESSION['logged']) == TRUE): ?>
            <th class="text-center">#</th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($queryOnlyCategory as $course): ?>
        <tr>
            <td>
                <?= $course->getCourseName(); ?>
                <?php if (strlen($course->getCourseDescription()) > 0): ?>
                    <hr class="line-table-description">
                    Description:
                    <?= $course->getCourseDescription(); ?>
                <?php endif; ?>
            </td>
            <td class="text-center"><?= \App\Helper\TranslateInstitution::handle($course->getInstitution()); ?></td>
            <td class="text-center">
                <strong>
                <?= \App\Helper\TranslateCategory::handle($course->getCategory()); ?>
                </strong>
            </td>
            <td class="text-center">
                <?php if (strlen($course->getCourseCertified()) > 0) : ?>
                    <a href="<?= '/img/' . $course->getCourseCertified() ?>" target="_blank">View</a>
                <?php elseif (strlen($course->getCourseUrl()) > 0) : ?>
                    <a href="<?= $course->getCourseUrl(); ?>" target="_blank">View</a>
                <?php else: ?>
                    N/A
                <?php endif; ?>
            </td>
            <?php if (isset($_SESSION['logged']) == TRUE): ?>
                <td><a href="/delete-course?id=<?= $course->getCourseId(); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script><?php require_once __DIR__ . '/../../../../../public/js/inputSearch.js'; ?></script>

<?php require_once __DIR__ . '/../../../includes/footer.php' ?>
