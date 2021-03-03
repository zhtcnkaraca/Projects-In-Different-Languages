<?php
define("SEC", true);
require_once("inc/_header.php");

if ( !$user->isLoggedIn() ) {
    header('Location: login.php');
};

global $conn;

    $_SESSION['karsilastirmalistesi'] = [];
    $karsilastirmalistesi = $_POST["karsilastirmalistesi"] ? $_POST["karsilastirmalistesi"] : $_SESSION['karsilastirmalistesi'];
    
    $query = $conn->prepare("SELECT * FROM araclar");
    $query->execute();
        $araclar = $query->fetchAll();

    if (count($karsilastirmalistesi) > 5) {
        $message = "Karşılaştırma listesine eklemek için en fazla 5 araç seçebilirsiniz.";
    } elseif (count($karsilastirmalistesi) > 0) {
        $message = count($karsilastirmalistesi) ." araç karşılaştırma listesine eklendi. ";
        $message .= "Listeyi açmak için <a href='karsilastirma.php'>buraya</a> tıklayın.";

        $_SESSION['karsilastirmalistesi'] = $karsilastirmalistesi;
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

<div class="box" style="max-width: 960px;">
	<div class="box-header dker">
		<h3><?php $app->name(); ?> Araç Listeleme</h3>
		<small>Buradan kayıtlı bütün araçları görebilir ve araçlarla ilgili işlemleri yapabilirsiniz.</small>
	</div>
	<div class="box-body">
    <div class="arac-listesi">

        <?php if ( $message ) : ?>
            <div class="alert alert-info text-sm">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="arac-listele.php" method="POST" autocomplete="off">
            <table class="arac-listesi table table-hover b-t">
            <thead>
                <tr>
                    <th class="text-center">Seç</th>
                    <th>Araç Adı</th>
                    <th>Araç Modeli</th>
                    <th>Araç Yılı</th>
                    <th>KM</th>
                    <th class="text-center">Sil</th>
                    <th class="text-center">Düzenle</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($araclar as $arac) : ?>
                <tr>
                    <td class="text-center">
                        <input <?php echo in_array($arac["id"], $karsilastirmalistesi) ? "checked" : ""; ?> type="checkbox" name="karsilastirmalistesi[]" value="<?php echo $arac["id"]; ?>"/>
                    </td>
                    <td><?php echo $arac["markaadi"]; ?></td>
                    <td><?php echo $arac["modeladi"]; ?></td>
                    <td><?php echo $arac["yil"]; ?></td>
                    <td><?php echo $arac["km"]; ?></td>
                    <td class="text-center"><a href="arac-sil.php?id=<?php echo $arac["id"]; ?>">Sil</a></td>
                    <td class="text-center"><a href="arac-duzenle.php?id=<?php echo $arac["id"]; ?>">Düzenle</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            </table>

            <div class="form-group row buttons text-center">
                <button type="submit" class="btn primary">Seçilenleri karşılaştırma listesine ekle</button>
            </div>
        </form>
        
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