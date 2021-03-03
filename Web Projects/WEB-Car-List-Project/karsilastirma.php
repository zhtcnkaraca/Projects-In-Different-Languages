<?php
define("SEC", true);
require_once("inc/_header.php");

if ( !$user->isLoggedIn() ) {
    header('Location: login.php');
};

global $conn;

    $karsilastirmalistesi = $_POST["karsilastirmalistesi"] ? $_POST["karsilastirmalistesi"] : $_SESSION['karsilastirmalistesi'];

    $sql = "SELECT * FROM araclar WHERE id IN (". implode($karsilastirmalistesi,",") .")";
    $query = $conn->prepare($sql);
    $query->execute();
        $araclar = $query->fetchAll();
    
    switch (count($karsilastirmalistesi)) {
        case '5':
            $column = 2;
            break;
        case '4':
            $column = 3;
            break;
        case '3':
            $column = 4;
            break;
        case '2':
            $column = 6;
            break;
        default:
            $column = 12;
            break;
    }

?>
<div class="app" id="app">

<?php include("inc/_menu.php"); ?>

<div class="app-content box-shadow-z0" id="content">

<div class="app-header dark box-shadow">
    <div class="navbar">
        <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up"><i class="material-icons">menu</i></a>
    </div>
</div> 

<div class="app-body" id="view1">
<div class="padding">

    <div class="p-x-lg">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="row no-gutter">
                    <?php foreach ($araclar as $arac) : ?>
                    <div class="col-sm-<?= $column; ?>">
                        <div class="box m-t-n">
                            <div class="box-body text-center r-t primary">
                                <h6 class="text-u-c p-v-sm m-a-0 m-t"><?php echo $arac["markaadi"]; ?></h6>
                                <h3 class="m-a-0 m-v">
                                    <span class="text-nowrap text-ellipsis"><?php echo $arac["modeladi"]; ?></span>
                                </h3>
                            </div>
                            <ul class="list b-t b-b m-a-0 no-radius karsilastirmalistesi">
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>Yıl:</strong> <?php echo $arac["yil"]; ?>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>KM:</strong> <?php echo $arac["km"]; ?>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>Renk:</strong> <?php echo $arac["renk"]; ?>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>Motor Hacmi:</strong> <?php echo $arac["motorhacmi"]; ?>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>Maks. Hız:</strong> <?php echo $arac["maxhiz"]; ?>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>Ağırlık:</strong> <?php echo $arac["agirlik"]; ?>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>Tekerlek:</strong> <?php echo $arac["tekersayisi"]; ?>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>Vites:</strong> <?php echo $arac["vites"]; ?>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="list-body">
                                        <strong>Sunroof:</strong> <?php echo $arac["sunroof"]; ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


</div>
</div>  

<div class="app-footer">
    <div class="p-a text-xs monospace">
        <div class="pull-right text-muted">© Copyright <strong><?php $app->name(); ?></strong> <span class="hidden-xs-down">- Built with Love <?php $app->version(); ?></span> <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a></div>
    </div>
</div>

</div> 
</div> 
<?php require_once("inc/_footer.php"); ?>