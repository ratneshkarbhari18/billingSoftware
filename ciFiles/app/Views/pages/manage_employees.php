<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-new-employee"); ?>" class="btn btn-success">+ Employee</a>
        <br><br>
        
        <?php if(count($employees)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Name</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Department</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Email</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Status</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee['fname'].' '.$employee["lname"]; ?></td>
                        <td><?php echo $employee['role']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><?php echo $employee['status']; ?></td>
                        <td>
                            <a class="btn green" href="<?php echo site_url('edit-employee/'.$employee['code']); ?>">Edit</a>
                            <!-- <form action="<?php echo site_url('delete-employee-exe'); ?>" style="display: inline;" method="post">
                                <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
                                <button type="submit" class="btn red">deactivate</button>
                            </form> -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No Employees Added</h6>

        <?php endif; ?>`
        
    </div>
</main>