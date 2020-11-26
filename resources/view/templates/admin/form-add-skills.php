<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">

    <h4 class="text-center mt-3"><u>Add Skills</u></h4>

    <form method="post" action="/controller-skills" class="mt-3">

        <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

        <div class="form-group">
            <label for="category" class="font-italic">Category</label>
            <select id="category" name="category_skill" class="form-control" required>
                <option value="" selected disabled> Choose...</option>
                <option value="1">Front-end</option>
                <option value="4">Framework Front</option>
                <option value="2">Back-end</option>
                <option value="5">Framework Back</option>
                <option value="3">Database</option>
            </select>
        </div>

       <div class="form-group">
           <label for="nameSkill" class="font-italic">Name</label>
           <input id="nameSkill" name="name_skill" type="text" class="form-control" placeholder="Name Skill" required>
       </div>

        <button type="submit" class="btn btn-success w-100 mb-2">Save</button>

    </form>

</div>

