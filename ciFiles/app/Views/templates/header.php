<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Conferesk</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo site_url("assets/css/materialize.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo site_url("assets/css/app.min.css"); ?>">
    
</head>
<body>
    <script src="<?php echo site_url("assets/js/jquery.min.js"); ?>"></script>
    <?php if(isset($_SESSION["logged_in"])): ?>
        <header id="app">
            <nav>
                <div class="nav-wrapper">
                    <ul id="slide-out" class="sidenav sidenav-fixed">
                        <li><div class="user-view">                        
                        <a href="#name"><span class="black-text name"><?php echo $_SESSION["first_name"].' '.$_SESSION["last_name"]; ?></span></a>
                        <a href="#email"><span class="black-text email"><?php echo $_SESSION["username"]; ?></span></a>
                        <a href="<?php echo site_url("edit-profile"); ?>"><span class="blue-text email">Edit Profile</span></a>
                        </div></li>
                        <li><a class="waves-effect" href="<?php echo site_url(); ?>">Dashboard</a></li>
                        <li><a class="waves-effect" href="<?php echo site_url("items-mgt"); ?>">Items</a></li>
                        <li><a class="waves-effect" href="<?php echo site_url("bills-mgt"); ?>">Bills</a></li>
                    </ul>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <a href="<?php echo site_url("/"); ?>" class="brand-logo center">Billing</a>
                    <ul id="nav-mobile" class="right">
                        <li><a href="<?php echo site_url("logout-exe"); ?>"><i class="material-icons">logout</i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
    <?php endif; ?>