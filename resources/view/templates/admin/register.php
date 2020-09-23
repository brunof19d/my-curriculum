<?php require_once __DIR__ . '/form.php'; ?>

<table class="table table-striped table-bordered mt-3 text-center">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col" class="">Email</th>
        <th scope="col" class="d-flex justify-content-center">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php /** @var \App\Controller\Admin\FormRegister $query */ ?>
    <?php foreach ($query as $user): ?>
        <tr>
            <th><?= $user->getId(); ?></th>
            <td><?= $user->getEmail(); ?></td>
            <td class="d-flex justify-content-center"><a href="/delete-admin?id=<?=$user->getId();?>" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
