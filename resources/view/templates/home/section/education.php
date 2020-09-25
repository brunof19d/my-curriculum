<div class="border mt-3 shadow">
    <div class="m-2">
        <p class="title-main"><i class="fas fa-university"></i><strong>Education</strong></p>
        <!-- Button Edit -->
        <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
            <div class="d-flex justify-content-center">
                <a href="/home" class="btn btn-dark btn-edit w-25">Edit</a>
            </div>
        <?php endif; ?>

        <!-- University -->
        <p><strong>University</strong></p>
        <p><i class="far fa-calendar-alt"></i><strong> 2010 - 2015</strong></p>
        <p>Bachelor Degree</p>
        <hr>

        <!-- Technical -->
        <p><strong>Technical</strong></p>
        <p><i class="far fa-calendar-alt"></i><strong> 2005 - 2008</strong></p>
        <p>Computer technical course.</p>
        <hr>

        <!-- Courses -->
        <p class="title-main"><i class="fas fa-graduation-cap"></i><strong>Courses</strong></p>

        <!-- Button Edit -->
        <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
            <div class="d-flex justify-content-center">
                <a href="/home" class="btn btn-dark btn-edit w-25">Edit</a>
            </div>
        <?php endif; ?>

        <div class="m-2 d-flex justify-content-center">
            <a href="#" class="myButton">Show all</a>
        </div>

    </div>
</div>
