<?php if (strlen($course->getCourseCertified()) > 0) : ?>
    <a href="<?= '/img/' . $course->getCourseCertified() ?>" target="_blank">View</a>
<?php elseif (strlen($course->getCourseUrl()) > 0) : ?>
    <a href="<?= $course->getCourseUrl(); ?>" target="_blank">View</a>
<?php else: ?>
    N/A
<?php endif; ?>
