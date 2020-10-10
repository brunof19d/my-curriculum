<div class="container bg-light mt-3">
    <h4 class="text-center">Categories</h4>

    <div class="d-flex justify-content-center align-items-center">

        <form method="post" class="" action="/controller-courses">
            <div class="form-group">
                <label>Register Category:</label>
                <input type="text" class="form-control" name="name_category">
            </div>
            <button name="register_category" type="submit" class="btn btn-primary w-100">Register</button>
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
