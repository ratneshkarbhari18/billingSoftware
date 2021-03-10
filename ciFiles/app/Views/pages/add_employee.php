<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 page-content">
    <div class="container">
        
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-2"><?php echo $success; ?></p>
        <p class="red-text darken-2"><?php echo $error; ?></p>

        <form action="<?php echo site_url("create-employee-exe"); ?>" method="post">
            
            <div class="mb-3">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="department">Department</label>
                <select name="department" id="department" >
                    <option value="marketing">Marketing</option>
                    <option value="sales">Sales</option>
                    <option value="hr">Human Resource</option>
                    <option value="design">Design</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="date">Temporary Password</label>
                <input value="<?php echo uniqid(); ?>" type="text" name="password" id="password" class="form-control" readonly>
            </div>
            
            <br>
            <button type="submit" class="btn btn-success">Add Employee</button>
            
        </form>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>