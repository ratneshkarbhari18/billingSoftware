<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-new-meeting"); ?>" class="btn btn-success">+ Meeting</a>
        <br><br>
        
        <?php if(count($meetings)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Public Id</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Status</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($meetings as $meeting): ?>
                    <tr>
                        <td><?php echo $meeting["public_id"]; ?></td>
                        <td><?php echo $meeting["status"]; ?></td>
                        <td>
                            <a class="btn green" href="<?php echo site_url('edit-meeting/'.$meeting['public_id']); ?>">Edit</a>
                            <form action="<?php echo site_url('delete-meeting-exe'); ?>" style="display: inline;" method="post">
                                <input type="hidden" name="id" value="<?php echo $meeting['id']; ?>">
                                <button type="submit" class="btn red">deactivate</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No Meetings Added</h6>

        <?php endif; ?>`
        
    </div>
</main>