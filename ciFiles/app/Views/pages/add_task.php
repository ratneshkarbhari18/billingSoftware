<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-2"><?php echo $success; ?></p>
        <p class="red-text darken-2"><?php echo $error; ?></p>

        <form enctype="multipart/form-data" action="<?php echo site_url("create-task-exe"); ?>" method="post">
            
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control">
            </div>
            <div class="mb-3">
                <label for="due_date">Due Date</label>
                <input placeholder="<?php echo date("d-m-Y"); ?>" type="text" name="date" id="date" class="form-control">
            </div>

            <!-- <div class="mb-3">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control">
            </div> -->
            <div class="file-field input-field">
                <div class="btn">
                    <span>Upload Multiple files</span>
                    <input type="file" name="files[]" multiple>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="users">Add Users to task</label>
                <?php foreach($employees as $employee): ?>
                    <p>
                        <label>
                            <input type="checkbox" name="users[]" value="<?php echo $employee['id']; ?>" />
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
            <button type="submit" class="btn btn-success">Add Task</button>
            
        </form>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>