<div class="ml-5">

    <form method="post" action="/table-filter-category">

        <label>Filter by category</label>
        <select class="w-25 m-1" name="category">
            <?php foreach ($queryCategory as $category): ?>
                <option value="<?= $category->getCategoryId(); ?>">
                    <?= $category->getCategoryName(); ?>
                </option>
            <?php endforeach; ?>

        </select>

        <button class="btn btn-dark btn-sm mt-1"> Apply</button>

    </form>

</div>

