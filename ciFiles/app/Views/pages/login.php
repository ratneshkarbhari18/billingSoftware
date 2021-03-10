<main class="page-content" id="login" style="padding: 3% 0;">

    <div class="row">

        <div class="col l4 m12 s12"></div>
        <div class="col l4 m12 s12">

            <div class="logo-container center">
                <h4 class="center">Login</h4>
                <p class="red-text"><?php echo $error; ?></p>
            </div>            



            <form action="<?php echo site_url("login-exe"); ?>" method="post">

                <div class="input-fieldx">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="input-fieldx">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password">
                </div>
                
                <button type="submit" class="btn w-100">Login</button>
            
            </form> 

        </div>
        <div class="col l4 m12 s12"></div>
    
    </div>

</main>