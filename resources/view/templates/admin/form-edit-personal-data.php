<?php require_once __DIR__ . '/../../includes/header-admin.php'; ?>

    <div class="container border bg-light">

        <form method="post" action="/controller-personal-data" enctype="multipart/form-data" class="mt-3">

            <div class="edit-basic">

                <h4 class="text-center">Basic Data</h4>

                <?php require_once __DIR__ . '/../../includes/alert.php'; ?>

                <input name="id" type="hidden" value="<?= $row['id']; ?>">

                <!-- Photo -->
                <div class="form-group">
                    <label class="font-italic">Photo Profile</label>
                    <input name="photo_profile" type="file" class="form-control-file">
                    <input type="hidden" name="photo_current" value="<?= $row['photo']; ?>">
                </div>

                <!--  Label Name  -->
                <div class="form-group">
                    <label class="font-italic">Name:</label>
                    <input name="name" type="text" class="form-control" value="<?= $row['name']; ?>">
                </div>

                <div class="form-row">

                    <!--  Profession -->
                    <div class="form-group col-md-6">
                        <label class="font-italic">Profession:</label>
                        <input name="profession" type="text" class="form-control w-75" value="<?= $row['job']; ?>">
                        <small class="form-text text-muted">Example: Web Developer.</small>
                    </div>

                    <!--  City -->
                    <div class="form-group col-md-3">
                        <label class="font-italic">City:</label>
                        <input name="city" type="text" class="form-control w-75" value="<?= $row['city']; ?>">
                    </div>

                    <!--  Country -->
                    <div class="form-group col-md-3">
                        <label class="font-italic">Country:</label>
                        <input name="country" type="text" class="form-control w-75" value="<?= $row['country']; ?>">
                    </div>

                </div>

                <div class="form-row">

                    <!--  Email -->
                    <div class="form-group col-md-6">
                        <label class="font-italic">Email:</label>
                        <input name="email" type="email" class="form-control w-75" value="<?= $row['email']; ?>">
                    </div>

                    <!--  Phone -->
                    <div class="form-group col-md-6">
                        <label class="font-italic">Phone:</label>
                        <input name="phone" type="text" class="form-control w-75" value="<?= $row['phone']; ?>">
                        <small class="form-text text-muted">Example: 315 999 999 999</small>
                    </div>

                </div>
                <hr>

            </div>

            <button class="btn btn-success w-100 mb-3">Save</button>

        </form>

    </div>
