<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-new-notice"); ?>" class="btn">+ Notice</a>
        <br><br>
        
        <?php if(count($notices)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Title</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Link</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Date</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Department</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notices as $notice): ?>
                    <tr>
                        <td><?php echo $notice['title']; ?></td>
                        <td><a href="<?php echo $notice["link"]; ?>" target="_blank" ><?php echo $notice["link"]; ?></a></td>
                        <td><?php echo $notice['date']; ?></td>
                        <td><?php echo $notice['department']; ?></td>
                        <td>
                            <a class="btn blue modal-trigger" href="#<?php echo $notice["id"]; ?>">Read</a>
                            <div class="modal" id="<?php echo $notice["id"]; ?>">
                                <div class="modal-content">
                                    <?php echo $notice["body"]; ?>
                                </div>
                                <?php if($notice["link"]!=''): ?>
                                <div class="modal-footer">
                                    <a target="_blank" href="<?php echo $notice["link"]; ?>" class="modal-close waves-effect waves-green btn-flat">Link</a>
                                </div>
                                <?php endif; ?>
                            </div>
                            <a class="btn green" href="<?php echo site_url('edit-notice/'.$notice['slug']); ?>">Edit</a>
                            <form action="<?php echo site_url('delete-notice-exe'); ?>" style="display: inline;" method="post">
                                <input type="hidden" name="id" value="<?php echo $notice['id']; ?>">
                                <button type="submit" class="btn red">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No Notices Added</h6>

        <?php endif; ?>`
        
    </div>
</main>