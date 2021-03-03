<?php
define("SEC", true);
require_once "inc/_header.php";

if ( !$user->isLoggedIn() ) {
    header('Location: login.php');
};
?>
<div class="app" id="app">

<?php require "inc/_menu.php"; ?>

<div class="app-content box-shadow-z0" id="content">

<div class="app-header dark box-shadow">
    <div class="navbar">
        <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up"><i class="material-icons">menu</i></a>
    </div>
</div> 

<div class="app-body" id="view1">
<div class="padding">

    <?php?>

</div>
</div> 

<div class="app-footer">
    <div class="p-a text-xs monospace">
        <div class="pull-right text-muted">2020 © <strong><?php $app->name(); ?></strong>
            <span class="hidden-xs-down">- Built with Love <?php $app->version(); ?></span>
            <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
    </div>
</div>

</div> 
</div> 
<?php require_once("inc/_footer.php"); ?>