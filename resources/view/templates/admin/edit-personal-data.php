<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

    <div class="container border bg-light">
        <form method="post" action="" class="mt-3">
            <div class="d-flex justify-content-end">
                <a href="/admin" class="btn btn-dark">Back</a>
            </div>
            <div class="edit-basic">
                <h4 class="text-center">Basic Data</h4>

                <!-- Photo -->
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo Profile</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <!--  Label Name  -->
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-row">

                    <!--  Profession -->
                    <div class="form-group col-md-6">
                        <label>Profession:</label>
                        <input type="text" class="form-control w-75">
                        <small id="emailHelp" class="form-text text-muted">Example: Web Developer.</small>
                    </div>

                    <!--  City and Country -->
                    <div class="form-group col-md-6">
                        <label>Country and City:</label>
                        <input type="text" class="form-control w-75">
                        <small id="emailHelp" class="form-text text-muted">Example: Porto, Portugal.</small>
                    </div>

                </div>
                <div class="form-row">
                    <!--  Email -->
                    <div class="form-group col-md-6">
                        <label>Email:</label>
                        <input type="text" class="form-control w-75">
                    </div>

                    <!--  Phone -->
                    <div class="form-group col-md-6">
                        <label>Phone:</label>
                        <input type="text" class="form-control w-75">
                        <small id="emailHelp" class="form-text text-muted">Example: 315 999 999 999</small>
                    </div>
                </div>
                <hr>
            </div>

            <div class="edit-skills">
                <h4 class="text-center">Skills</h4>
                <div class="d-flex justify-content-between">
                    <!--  FrontEnd -->
                    <div class="form-check">
                        <p><strong>FrontEnd</strong></p>
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck12">HTML5</label>
                    </div>
                    <!--  BackEnd -->
                    <div class="form-check">
                        <p><strong>BackEnd</strong></p>
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck13">PHP</label>
                    </div>
                    <!--  Database -->
                    <div class="form-check">
                        <p><strong>Database</strong></p>
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">MySQL</label>
                    </div>
                </div>
                <hr>
            </div>

            <!--  Languages -->
            <div class="edit-languages">
                <h4 class="text-center">Languages</h4>
                <div class="text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">Portuguese</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">English</label>
                    </div>
                </div>
            </div>
            <hr>
            <a href="" class="btn btn-success w-100 mb-3 mt-3">Save</a>
        </form>
    </div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>