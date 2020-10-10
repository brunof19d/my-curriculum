<?php require_once __DIR__ . '/../../../includes/header.php' ?>

<?php if (isset($_SESSION['logged']) == TRUE): ?>
    <div class="d-flex justify-content-start">
        <a href="/add-course" class="btn btn-success m-1">Add</a>
        <a href="/admin" class="btn btn-primary m-1">Back admin page</a>
    </div>
<?php endif; ?>

<div class="d-flex align-items-center justify-content-between">
    <input type="text" id="searchCourse" class="mt-2" onkeyup="inputSearchCourses()"
           placeholder="Search for names courses">
    <a href="/home" class="btn btn-primary">Back</a>
</div>

<?php require_once __DIR__ . '/../../../includes/alert.php'; ?>

<table id="tableCourses" class="table table-striped table-bordered mt-1 table-responsive">
    <thead>
    <tr>
        <th class="w-100 text-center">
            Course
            <?php require_once __DIR__ . '/../../../includes/filter-table-course.php'; ?>
        </th>
        <th class="text-center">Institution</th>
        <th class="text-center">Category</th>
        <th class="text-center">Certified</th>
        <th class="text-center">Featured in the table (only 5)</th>
        <?php if (isset($_SESSION['logged']) == TRUE): ?>
            <th class="text-center">#</th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($queryCourses as $course): ?>
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
            <td class="text-center"><?= \App\Helper\TranslateCategory::handle($course->getCategory()); ?></td>
            <td class="text-center">
                <?php if (strlen($course->getCourseCertified()) > 0) : ?>
                    <a href="<?= '/img/' . $course->getCourseCertified() ?>" target="_blank">View</a>
                <?php elseif (strlen($course->getCourseUrl()) > 0) : ?>
                    <a href="<?= $course->getCourseUrl(); ?>" target="_blank">View</a>
                <?php else: ?>
                    N/A
                <?php endif; ?>
            </td>


            <?php if ($course->getHighlight() == 0 && ($highlightLimit == TRUE)): ?>
                <td>
                    <a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=true"
                       class="btn btn-sm btn-info disabled">Destacar</a>
                </td>
            <?php elseif ($course->getHighlight() == 0 && ($highlightLimit == FALSE)): ?>
                <td>
                    <a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=true"
                       class="btn btn-sm btn-info">Destacar</a>
                </td>
            <?php elseif ($course->getHighlight() == 1) : ?>
                <td><a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=false"
                       class="btn btn-sm btn-warning">Shuft off</a></td>

            <?php endif; ?>

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
