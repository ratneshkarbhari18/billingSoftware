<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        
        <?php if(count($tasks)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Title</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Due Date</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tasks as $task): ?>
                    <tr>
                        <td><?php echo $task['title']; ?></td>
                        <td><?php echo $task['due_date']; ?></td>
                        <td>
                            <a class="btn blue modal-trigger" href="#<?php echo $task["id"]; ?>">Read</a>
                            <div class="modal" id="<?php echo $task["id"]; ?>">
                                <div class="modal-content">
                                    <?php echo $task["title"]; ?>
                                    <?php echo $task["description"]; ?>
                                </div>
                                <div class="modal-footer">
                                    <a target="_blank" href="<?php echo site_url("task-details/".$task["slug"]); ?>" class="modal-close  waves-effect waves-green btn-flat">More Details</a>
                                </div>
                            </div>
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