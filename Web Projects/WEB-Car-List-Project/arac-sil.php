<?php
define("SEC", true);
require_once("inc/_header.php");

if ( !$user->isLoggedIn() ) {
    header('Location: login.php');
};

global $conn;
    $id = $_GET["id"];
    $query = $conn->prepare("SELECT * FROM araclar WHERE id = :id");
    $query->bindValue(":id", $id);
    $query->execute();
        $arac = $query->fetch();

    if ($_GET["cevap"] == "evet") {
        $query = $conn->prepare("DELETE FROM araclar WHERE id = :id");
        $query->bindValue(":id", $id);
        $query->execute();

        header('Location: arac-listele.php');

    } elseif (isset($_GET["cevap"]) && $_GET["cevap"] == "hayir") {
        header('Location: arac-listele.php');
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

<?php?>

<div class="box m-t-lg" style="max-width: 720px; margin: 0 auto;">
    <div class="box-header light-blue-200">
        <h3>Araç Silme</h3>
        <small><?php echo $arac["markaadi"]." ".$arac["modeladi"] ; ?> silinecek.</small>
    </div>
    <div class="box-body">
        <p class="m-a-0 m-b text-center">Silmek istediğinize emin misiniz?</p>
        <p class="text-center">
            <a href="arac-sil.php?id=<?php echo $id; ?>&cevap=evet"><button class="btn btn-fw success">Evet</button><a/>
            <a href="arac-sil.php?id=<?php echo $id; ?>&cevap=hayir"><button class="btn btn-fw danger">Hayır</button></a>
        </p>
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