<div class="row">
    <div class="left-panel col-sm-4">

        <div class="border mb-1 shadow">

            <!-- Photo and Name -->
            <div class="img-profile mb-2">
                <img src="img/polar.jpg" alt="Image Profile" width="100%" height="230">
                <h1 class="text-img">My Name</h1>
            </div>
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <div class="d-flex justify-content-center">
                    <a href="/home" class="btn btn-dark btn-edit w-50">Edit</a>
                </div>
            <?php endif; ?>
            <!-- Info Label -->
            <div class="m-2">


                <p><i class="fas fa-briefcase"></i>Web PHP Developer</p>
                <p><i class="fas fa-home"></i>Country</p>
                <p><i class="far fa-envelope"></i>email@email.com</p>
                <p><i class="fas fa-phone"></i>315 999 999 999</p>

                <hr>

                <p><i class="fas fa-bullseye"></i><strong>Skills</strong></p>
                <p class=""><b>Front End</b></p>
                <p>HTML, CSS3, JavaScript and Bootstrap</p>
                <p>Framework: jQuery</p>

                <hr>

                <p><strong>Back End</strong></p>
                <p>PHP</p>
                <p>Framework: Laravel</p>

                <hr>

                <p class=""><b>Database and SQL</b></p>
                <p>MySQL</p>

                <hr>

                <p><i class="fas fa-globe-europe"></i><strong>Languages</strong></p>
                <p>Portuguese</p>
                <p>English</p>

            </div>

        </div>

    </div>

