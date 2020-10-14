<?php if ($course->getHighlight() == 0 && ($highlightLimit == TRUE)): ?>

    <a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=true" class="btn btn-sm btn-info disabled">Highlight</a>

<?php elseif ($course->getHighlight() == 0 && ($highlightLimit == FALSE)): ?>

    <a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=true" class="btn btn-sm btn-info">Highlight</a>

<?php elseif ($course->getHighlight() == 1) : ?>

    <a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=false" class="btn btn-sm btn-warning">Turn Off</a>

<?php endif; ?>
