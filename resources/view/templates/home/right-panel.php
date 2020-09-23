<div class="right-panel col-sm-8 shadow-lg">
    <!-- Label Work -->
    <div class="border shadow">
        <div class="m-2">
            <p class="title-main"><i class="fas fa-briefcase"></i><strong>Work Experience</strong></p>
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <div class="d-flex justify-content-center">
                    <a href="/edit-work" class="btn btn-dark btn-edit w-25">Edit</a>
                </div>
            <?php endif; ?>
            <p><strong> Job Title </strong></p>
            <p><i class="far fa-calendar-alt"></i><strong>January 2020 - <span>Current</span></strong></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut varius varius lorem vel lacinia.
                Donec egestas mauris tortor, nec consequat lorem rhoncus id.
            </p>

            <hr>
            <p><b> Job Title </b></p>

            <p><i class="far fa-calendar-alt"></i><strong> January 2014 - December 2019</strong></p>
            <p>Quisque maximus sem lorem, a elementum libero auctor quis.
                Mauris erat turpis, tristique ut fermentum in, viverra eu enim.
            </p>
        </div>
    </div>

    <div class="border mt-3 shadow">
        <div class="m-2">
            <p class="title-main"><i class="fas fa-university"></i><strong>Education</strong><p>
                <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                    <a href="/home" class="btn btn-dark btn-edit mb-2">Edit</a>
                <?php endif; ?>
            <p><strong>University</strong></p>
            <p><i class="far fa-calendar-alt"></i><strong> 2010 - 2015</strong></p>
            <p>Bachelor Degree</p>

            <hr>

            <p><strong>Technical</strong></p>
            <p><i class="far fa-calendar-alt"></i><strong> 2005 - 2008</strong></p>
            <p>Computer technical course.</p>

            <hr>

            <p class="title-main"><i class="fas fa-graduation-cap"></i><strong>Courses</strong></p>
            <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                <a href="/home" class="btn btn-dark btn-edit">Edit</a>
            <?php endif; ?>
            <!-- Buttons -->
            <div class="m-2 d-flex justify-content-center">
                <a href="#" class="myButton">Show all</a>
            </div>

        </div>
    </div>

</div>
