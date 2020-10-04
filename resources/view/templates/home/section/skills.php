<!-- Skills -->
<p><i class="fas fa-bullseye"></i><strong>Skills</strong></p>

<!-- Button Edit Admin -->
<?php \App\Helper\ButtonAdmin::editButton('/edit-skills'); ?>


<p class=""><b>Front End</b></p>

<?php foreach ($queryFrontEnd as $row): ?>
    <p><?= $row['name_skill']; ?></p>
<?php endforeach; ?>
<p>Framework: jQuery</p>

<hr>

<p><strong>Back End</strong></p>
<?php foreach ($queryBackEnd as $row): ?>
    <p><?= $row['name_skill']; ?></p>
<?php endforeach; ?>
<p>Framework: Laravel</p>

<hr>

<p class=""><b>Database and SQL</b></p>
<?php foreach ($queryDatabase as $row): ?>
    <p><?= $row['name_skill']; ?></p>
<?php endforeach; ?>

<hr>
