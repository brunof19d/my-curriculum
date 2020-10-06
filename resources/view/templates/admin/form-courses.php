<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

<?php require_once __DIR__ . '/../../includes/alert.php'; ?>
<div class="container bg-light">

    <h4 class="text-center">Courses</h4>

    <form method="post" action="/controller-courses" enctype="multipart/form-data">
        <div class="d-flex align-items-baseline">
            <label>Institution</label>
            <select class=" w-25 ml-1">
                <option>Alura</option>
                <option>Udemy</option>
            </select>
        </div>
        <div class="d-flex align-items-baseline">
            <label>Category</label>
            <select class=" w-25 ml-1">
                <option>FrontEnd</option>
                <option>BackEnd</option>
            </select>
        </div>
        <div class="form-group">
            <label>Course</label>
            <input type="text" name="course_name" class="w-75">
        </div>
        <div class="form-group">
            <label>Certified</label>
            <input type="file" name="">
        </div>
        <button class="btn btn-success mb-3 w-25"> Save</button>
    </form>
</div>

<div class="container bg-light mt-3">
    <form method="post" class="" action="/controller-courses">
        <div class="form-group">
            <label>Register Institution:</label>
            <input type="text" class="form-control" name="institution_name">
        </div>
        <button name="register_institution" type="submit" class="btn btn-primary w-25 mb-2">Register</button>
    </form>
</div>

<div class="container bg-light mt-3">
    <form method="post" class="" action="/controller-courses">
        <div class="form-group">
            <label>Register Category:</label>
            <input type="text" class="form-control" name="name_category">
        </div>
        <button name="register_category" type="submit" class="btn btn-primary w-25 mb-2">Register</button>
    </form>
</div>