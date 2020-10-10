<?php if ($course->getHighlight() == 0 && ($highlightLimit == TRUE)): ?>
    <td>
        <a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=true"
           class="btn btn-sm btn-info disabled">Highlight
        </a>
    </td>
<?php elseif ($course->getHighlight() == 0 && ($highlightLimit == FALSE)): ?>
    <td>
        <a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=true"
           class="btn btn-sm btn-info">Highlight
        </a>
    </td>
<?php elseif ($course->getHighlight() == 1) : ?>
    <td>
        <a href="/highlight-course?id=<?= $course->getCourseId(); ?>&active=false"
           class="btn btn-sm btn-warning">Turn Off</a>
    </td>
<?php endif; ?>
