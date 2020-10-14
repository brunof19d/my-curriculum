<div class="container bg-light mt-3">

    <h4 class="text-center"><u>Institution</u></h4>

    <div class=" d-flex justify-content-center align-items-center">

        <form id="instituion" method="post" class="m-5" action="/controller-courses">

            <div class="form-group">

                <label for="registerInstitution">Register Institution:</label>
                <input id="registerInstitution" type="text" class="form-control" name="institution_name" placeholder="Name Institution" required>

            </div>

            <button name="register_institution" type="submit" class="btn btn-success w-100">Register</button>

        </form>

        <ul class="list-group m-5">

            <?php foreach ($queryInstitution as $institution): ?>

                <li class="list-group-item d-flex justify-content-between">
                    <?= $institution->getInstitutionName(); ?>
                    <a href="/delete-institution?id=<?= $institution->getInstitutionId(); ?>"
                       class="btn btn-danger btn-sm ml-2">Delete</a>
                </li>

            <?php endforeach; ?>

        </ul>

    </div>

</div>
