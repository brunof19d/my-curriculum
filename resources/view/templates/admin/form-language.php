<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<div class="container border bg-light">

    <h4 class="text-center">Languages</h4>

    <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

    <form method="post" action="/save-language">

        <div class="form-group">
            <label for="inputLanguage">Language</label>
            <input type="text" class="form-control w-25" id="inputLanguage" name="language">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="level_language" id="radio1" value="Native or Fluent" checked>
            <label class="form-check-label" for="radio1">Native or fluent</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="level_language" id="radio2" value="Advanced">
            <label class="form-check-label" for="radio2">Advanced</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="level_language" id="radio3" value="Intermediate">
            <label class="form-check-label" for="radio3">Intermediate</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="level_language" id="exampleRadios3" value="Basic">
            <label class="form-check-label" for="exampleRadios3">Basic</label>
        </div>

        <button type="submit" class="btn btn-success mt-3 mb-1 w-100">Save</button>

    </form>

</div>


