<div class="edit-basic">

    <h4 class="text-center">Basic Data</h4>

    <?php /** @var FormEditPersonalData $row */ ?>
    <input name="id" type="hidden" value="<?= $row['id']; ?>">

    <!-- Photo -->
    <div class="form-group">
        <label>Photo Profile</label>
        <input name="photo_profile" type="file" class="form-control-file">
        <input type="hidden" name="photo_current" value="<?= $row['photo']; ?>">
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
        <div class="form-group col-md-3">
            <label>City:</label>
            <input type="text" class="form-control w-75">
        </div>
        <div class="form-group col-md-3">
            <label>Country:</label>
            <input type="text" class="form-control w-75">
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