<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-2"><?php echo $success; ?></p>
        <p class="red-text darken-2"><?php echo $error; ?></p>

        <form action="<?php echo site_url("update-notice-exe"); ?>" method="post">
            
            <input type="hidden" name="id" value="<?php echo $notice["id"]; ?>">

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $notice["title"]; ?>">
            </div>
            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" value="<?php echo $notice["slug"]; ?>" name="slug" id="slug" class="form-control">
            </div>
            <div class="mb-3">
                <label for="date">Date</label>
                <input value="<?php echo $notice["date"]; ?>" type="text" name="date" id="date" class="form-control">
            </div>
            <div class="mb-3">
                <label for="department">Department</label>
                <select name="department" id="department" class="form-control">
                    <option value="general" <?php if($notice["department"]=="general"){echo "selected";} ?>>General</option>
                    <option value="marketing" <?php if($notice["department"]=="marketing"){echo "selected";} ?>>Marketing</option>
                    <option value="sales" <?php if($notice["department"]=="sales"){echo "selected";} ?>>Sales</option>
                    <option value="hr" <?php if($notice["department"]=="hr"){echo "selected";} ?>>Human Resource</option>
                    <option value="design" <?php if($notice["department"]=="design"){echo "selected";} ?>>Design</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="link">Link</label>
                <input type="text" value="<?php echo $notice["link"]; ?>" name="link" id="link" class="form-control">
            </div>
            <div class="mb-3">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control"><?php echo $notice["body"]; ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Update</button>
            
        </form>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>