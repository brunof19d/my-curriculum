<!-- Photo and Name -->
<div class="img-profile mb-2">
    <img src="img/<?= $queryPersonalData['photo']; ?>" alt="Image Profile" width="100%" height="290">
    <h1 class="text-img"><?= $queryPersonalData['name']; ?></h1>
</div>

<!-- Info Label -->
<div class="m-2">

    <!-- Button Edit Admin -->
    <?php \App\Helper\ButtonAdmin::editButton('/edit-personal-data'); ?>

    <!-- Basic Personal Data -->
    <!-- Job name -->
    <p><i class="fas fa-briefcase"></i><?= $queryPersonalData['job']; ?></p>
    <!-- City, Country -->
    <p><i class="fas fa-home"></i><?= $queryPersonalData['city']; ?>, <?= $queryPersonalData['country']; ?></p>
    <!-- Email -->
    <p><i class="far fa-envelope"></i><?= $queryPersonalData['email']; ?></p>
    <!-- Phone -->
    <p><i class="fas fa-phone"></i><?= $queryPersonalData['phone']; ?></p>

    <hr>
