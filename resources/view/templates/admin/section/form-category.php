<div class="container bg-light mt-3">

    <h4 class="text-center"><u>Categories</u></h4>

    <div class="d-flex justify-content-center align-items-center">

        <form id="category" method="post" class="" action="/controller-courses">

            <div class="form-group">

                <label for="nameCategory" class="font-italic">Register Category:</label>
                <input id="nameCategory" type="text" class="form-control" name="name_category" placeholder="Name category" required>

            </div>

            <button name="register_category" type="submit" class="btn btn-success w-100">Register</button>

        </form>

        <ul class="list-group m-5">

            <?php foreach ($queryCategory as $category): ?>

                <li class="list-group-item d-flex justify-content-between">
                    <?= $category->getCategoryName(); ?>
                    <a href="/delete-category?id=<?= $category->getCategoryId(); ?>"
                       class="btn btn-danger btn-sm ml-2">Delete</a>
                </li>

            <?php endforeach; ?>

        </ul>

    </div>

</div>
