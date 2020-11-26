<!-- Skills -->
<p class="left-icon">
    <strong><i class="fas fa-bullseye"></i>Skills</strong>
</p>

<!-- Button Edit Admin -->
<?php \App\Helper\ButtonAdmin::editButton('/edit-skills'); ?>

<!-- FrontEnd -->
<p class="font-italic"><strong><u>Front End</u></strong></p>
<?php foreach ($queryFrontEnd as $row): ?>
    <p class="m-3 bg-light"><?= $row['name_skill']; ?></p>
<?php endforeach; ?>

<?php foreach ($queryFrameFront as $row): ?>
    <p class="m-3 bg-light">
        <?= $row['name_skill']; ?>
        <strong class="mr-1 font-italic framework-alert">- Framework</strong>
    </p>
<?php endforeach; ?>

<!-- BackEnd -->
<p class="font-italic"><strong><u>Back End</u></strong></p>
<?php foreach ($queryBackEnd as $row): ?>
    <p class="m-3 bg-light"><?= $row['name_skill']; ?></p>
<?php endforeach; ?>

<?php foreach ($queryFrameBack as $row): ?>
    <p class="m-3 bg-light">
        <?= $row['name_skill']; ?>
        <strong class="mr-1 font-italic framework-alert">- Framework</strong>
    </p>
<?php endforeach; ?>

<!-- Database and SQL -->
<p class="font-italic"><strong><u>Database and SQL</u></strong></p>
<?php foreach ($queryDatabase as $row): ?>
    <p class="m-3 bg-light"><?= $row['name_skill']; ?></p>
<?php endforeach; ?>

<hr>
