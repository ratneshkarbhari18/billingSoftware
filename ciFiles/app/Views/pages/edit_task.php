<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-2"><?php echo $success; ?></p>
        <p class="red-text darken-2"><?php echo $error; ?></p>

        <form enctype="multipart/form-data" action="<?php echo site_url("update-task-exe"); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $taskData["id"]; ?>">
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $taskData["title"]; ?>" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="<?php echo $taskData["slug"]; ?>">
            </div>
            <div class="mb-3">
                <label for="due_date">Due Date</label>
                <input value="<?php echo $taskData["due_date"]; ?>" type="text" name="date" id="date" class="form-control">
            </div>
            <?php if($taskData["files"]!=""): ?>
            <label for="">Task Files</label>
            <?php $taskFiles = json_decode($taskData["files"],TRUE); $i=1; foreach($taskFiles as $tf):  ?>
            <div class="w-20">
                <a href="<?php echo 
                site_url('assets/task_files/'.$tf);
                 ?>"  id="<?php echo $tf; ?>"  download>File <?php echo $i; ?></a> <a class="btn red delete-file-link" fileName="<?php echo $tf; ?>" href="#"><i class="material-icons">delete</i></a>
            </div>
            <?php $i++; endforeach; endif; ?>
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
                            <input type="checkbox" name="users[]" value="<?php echo $employee['id']; ?>" <?php $users = json_decode($taskData["staff"],TRUE); if(in_array($employee["id"],$users)){echo "checked";} ?> />
                            <span><?php echo $employee["fname"].' '.$employee["lname"]; ?></span>
                        </label>
                    </p>
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?php echo $taskData["description"]; ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Update Task</button>
            
        </form>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
    $(".delete-file-link").click(function (e) { 
        e.preventDefault();
        let fileName = $(this).attr("fileName");
        console.log(fileName);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url("task-file-delete-api"); ?>",
            data: {
                "task_id" : "<?php echo $taskData["id"] ?>",
                "fileName" : fileName,
                "fileListJson" : '<?php echo $taskData["files"]; ?>'
            },
            success: function (response) {
              if (response=="done") {
                window.location.href="<?php echo site_url("edit-task/".$taskData["id"]) ?>";
              }
            }
        });
    });
</script>