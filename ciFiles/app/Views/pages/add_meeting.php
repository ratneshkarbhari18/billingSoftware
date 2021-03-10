<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-2"><?php echo $success; ?></p>
        <p class="red-text darken-2"><?php echo $error; ?></p>

        <form enctype="multipart/form-data" action="<?php echo site_url("create-meeting-exe"); ?>" method="post">
            <div class="mb-3">
                <label for="public_id">Public ID</label>
                <input type="text" name="public_id" id="public_id" readonly value="<?php echo uniqid(); ?>" class="form-control">
            </div>
            <br>
            <div class="mb-3">
                <label for="users">Add Users to task</label>
                <?php foreach($employees as $employee): ?>
                    <p>
                        <label>
                            <input type="checkbox" name="users[]" value="<?php echo $employee['id']; ?>"/>
                            <span><?php echo $employee["fname"].' '.$employee["lname"].' ('.ucfirst($employee["role"]).') ';  ?></span>
                        </label>
                    </p>
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Add Meeting</button>
        </form>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>