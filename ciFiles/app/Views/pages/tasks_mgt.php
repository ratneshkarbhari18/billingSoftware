<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-new-task"); ?>" class="btn btn-success">+ Task</a>
        <br><br>
        
        <?php if(count($tasks)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Title</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Due Date</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Status</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tasks as $task): ?>
                    <tr>
                        <td><?php echo $task['title']; ?></td>
                        <td><?php echo $task["due_date"]; ?></td>
                        <td><?php echo $task['status']; ?></td>
                        <td>
                            <a class="btn green" href="<?php echo site_url('edit-task/'.$task['id']); ?>">Edit</a>
                            <form action="<?php echo site_url('delete-task-exe'); ?>" style="display: inline;" method="post">
                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                <button type="submit" class="btn red">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No Tasks Added</h6>

        <?php endif; ?>`
        
    </div>
</main>