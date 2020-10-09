<p class="title-main"><i class="fas fa-graduation-cap"></i><strong>Courses</strong></p>

<?php \App\Helper\ButtonAdmin::addButton('/add-course'); ?>

<table class="table table-striped table-bordered mt-3  table-responsive">

    <thead>
    <tr>
        <th class="w-100">Course</th>
        <th class="text-center">Institution</th>
        <th class="text-center">Category</th>
        <th class="text-center">Certified</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($queryCoursesLimit as $course): ?>
        <tr>
            <td><?= $course->getCourseName(); ?></td>
            <td class="text-center"><?= \App\Helper\TranslateInstitution::handle($course->getInstitution()); ?></td>
            <td class="text-center"><?= \App\Helper\TranslateCategory::handle($course->getCategory()); ?></td>
            <td class="text-center">
                <?php if (strlen($course->getCourseCertified()) > 0) : ?>
                    <a href="<?= '/img/' . $course->getCourseCertified() ?>" target="_blank">Aqui</a>
                <?php elseif (strlen($course->getCourseUrl()) > 0) : ?>
                    <a href="<?= $course->getCourseUrl(); ?>" target="_blank">Aqui</a>
                <?php else: ?>
                    N/A
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>

<?php if ($countRowCourse > 5 or $_SERVER['PATH_INFO'] == '/admin'): ?>
    <div class="m-2 d-flex justify-content-center">
        <a href="/table-courses" class="myButton">Show all <?= $countRowCourse ?> Courses </a>
    </div>
<?php endif; ?>