<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">

    <form method="post" action="/controller-skills" class="mt-3">

        <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

        <div class="form-group w-25">
            <label>Category</label>
            <select name="category_skill" class="form-control">
                <option value="1">Front-end</option>
                <option value="2">Back-end</option>
                <option value="3">Database</option>
            </select>
        </div>

       <div class="form-group">
           <label>Name</label>
           <input name="name_skill" type="text" class="form-control w-25">
       </div>

        <hr><button type="submit" class="btn btn-success m-2">Save</button>

    </form>

</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

