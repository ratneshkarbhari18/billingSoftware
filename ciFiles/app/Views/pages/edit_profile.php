<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-2"><?php echo $success; ?></p>
        <p class="red-text darken-2"><?php echo $error; ?></p>
        <form action="<?php echo site_url("update-profile-exe"); ?>" method="post">
            
            <input type="hidden" name="code" id="code" value="<?php echo $employee["code"]; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $employee["id"]; ?>">

            <div class="mb-3">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $employee["fname"]; ?>">
            </div>
            <div class="mb-3">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $employee["lname"]; ?>">
            </div>
            <input type="hidden" name="department" value="<?php echo $employee["role"]; ?>">
            <input type="hidden" name="status" value="<?php echo $employee["status"]; ?>">
            
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?php echo $employee["email"]; ?>">
            </div>
            <div class="mb-3">
                <label for="date">New Password</label>
                <input type="text" name="password" id="password" class="form-control" >
            </div>
            
            <br>
            <button type="submit" class="btn btn-success">Update Profile</button>
            
        </form>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>