<!-- Courses -->
<p class="title-main"><i class="fas fa-graduation-cap"></i><strong>Courses</strong></p>

<?php \App\Helper\ButtonAdmin::addButton('/add-course'); ?>

<div class="m-2 d-flex justify-content-center">
    <a href="#" class="myButton">Show all</a>
</div>


<table class="table table-striped table-bordered mt-3">
    <thead>
    <tr>
        <th>ID</th>
        <th class="w-50">Curso</th>
        <th class="text-center">Instituicao</th>
        <th>Category</th>
        <th class="text-center">Certificado</th>
    </tr>
    </thead>
    <tbody>
    <?php /** @var \App\Entity\Model\Courses\Course $course */
    foreach ($queryCourses as $course): ?>
        <tr>
            <th><?= $course->getCourseId(); ?></th>
            <th>
                <?= $course->getCourseName(); ?>
            </th>
            <th class="text-center"><?= \App\Helper\TranslateInstitution::handle($course->getInstitution()); ?></th>
            <th class="text-center"><?= \App\Helper\TranslateCategory::handle($course->getCategory()); ?></th>
            <th class="text-center">
                <?php if (strlen($course->getCourseCertified()) > 0) : ?>
                    <a href="<?= '/img/' . $course->getCourseCertified() ?>" target="_blank">Aqui</a>
                <?php elseif (strlen($course->getCourseUrl()) > 0) : ?>
                    <a href="<?= $course->getCourseUrl(); ?>" target="_blank">Aqui</a>
                <?php else: ?>
                    <p>N/A</p>
                <?php endif; ?>
            </th>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
