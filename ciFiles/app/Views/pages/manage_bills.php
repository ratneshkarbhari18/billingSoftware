<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h3 class="welcome-text"><?php echo $title; ?></h3>
        <p class="green-text darken-3"><?php echo $success; ?></p>
        <p class="red-text darken-3"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-new-bill"); ?>" class="btn">+ bill</a>
        <br><br>
        
        <?php if(count($bills)>0): ?>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td style="font-size: 1.2rem; font-weight: 500;">Payee Name</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Bill Number</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Amount</td>
                        <td style="font-size: 1.2rem; font-weight: 500;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bills as $bill): ?>
                    <tr>
                        <td><?php echo $bill['payee_name']; ?></td>
                        <td><?php echo $bill['bill_number']; ?></td>
                        <td><?php echo $bill['bill_amount']; ?></td>
                        <td><?php echo $bill['date']; ?></td>
                        <td>
                            <form action="<?php echo site_url('delete-bill-exe'); ?>" style="display: inline;" method="post">
                                <input type="hidden" name="id" value="<?php echo $bill['id']; ?>">
                                <button type="submit" class="btn red">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <h6>No bills Added</h6>

        <?php endif; ?>`
        
    </div>
</main>