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

    $query = $conn->prepare("SELECT * FROM markalar");
    $query->execute();
        $markalar__tmp = $query->fetchAll();

        $markalar = [];
        foreach ($markalar__tmp as $marka) {
            $markalar[$marka["id"]] = $marka["marka"];
        }

    $markaid = $arac["markaid"];

    $query = $conn->prepare("SELECT * FROM modeller WHERE markaid = :markaid");
    $query->bindValue(":markaid", $markaid);
    $query->execute();
        $modeller__tmp = $query->fetchAll();

        $modeller = [];
        foreach ($modeller__tmp as $model) {
            $modeller[$model["id"]] = $model["model"];
        }

    if($arac){ 
        
        $query = $conn->prepare(
            "UPDATE araclar 
             SET    markaid = :markaid, markaadi = :markaadi, modelid = :modelid, modeladi = :modeladi, 
                    yil = :yil, km = :km, renk = :renk, motorhacmi = :motorhacmi, maxhiz = :maxhiz, 
                    agirlik = :agirlik, tekersayisi = :tekersayisi, vites = :vites, sunroof = :sunroof 
             WHERE id = :id"
        );
        $query->bindValue(":markaid", $_POST["markaid"]);
        $query->bindValue(":markaadi", $markalar[$_POST["markaid"]]);
        $query->bindValue(":modelid", $_POST["modelid"]);
        $query->bindValue(":modeladi", $modeller[$_POST["modelid"]]);
        $query->bindValue(":yil", $_POST["yil"]);
        $query->bindValue(":km", $_POST["km"]);
        $query->bindValue(":renk", $_POST["renk"]);
        $query->bindValue(":motorhacmi", $_POST["motorhacmi"]);
        $query->bindValue(":maxhiz", $_POST["maxhiz"]);
        $query->bindValue(":agirlik", $_POST["agirlik"]);
        $query->bindValue(":tekersayisi", $_POST["tekersayisi"]);
        $query->bindValue(":vites", $_POST["vites"]);
        $query->bindValue(":sunroof", $_POST["sunroof"]);
        $query->bindValue(":id", $id);
        
        $query->execute();
    
        $message = "Araç düzenlendi.";
    } else{
        $message = "Araç bulunamadı.";
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

<div class="app-body" id="view">
<div class="padding">

<div class="box" style="max-width: 960px;">
	<div class="box-header dker">
		<h3><?php $app->name(); ?> Araç Güncelleme</h3>
		<small>Bu ekrandan araç bilgilerini güncelleyebilirsiniz.</small>
	</div>
	<div class="box-body">

        <div>

            <?php if ( $message ) : ?>
            <div class="alert alert-info text-sm">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>

            <form action="arac-duzenle.php" method="POST" autocomplete="off">
                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                <div class="b-b b-primary nav-active-primary">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active">Araç Bilgileri</a></li>
                    </ul>
                </div>
                <div class="tab-content p-a-md">
                    <div class="tab-pane animated fadeIn text-muted active">
                        <div class="row row-sm">  
                            <div class="col-sm-5">
                                <div class="md-form-group">
                                    <select name="markaid" class="form-control form-control-sm md-input">
                                    <?php foreach ($markalar as $id => $marka) : ?>
                                        <option <?php echo $arac["markaid"] == $id ? "selected" : ""; ?> value="<?php echo $id?>"><?php echo $marka; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    <label>Aracın Markası</label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="md-form-group">
                                    <select name="modelid" class="form-control form-control-sm md-input">
                                    <?php foreach ($modeller as $id => $model) : ?>
                                        <option <?php echo $arac["modelid"] == $id ? "selected" : ""; ?> value="<?php echo $id ?>"><?php echo $model; ?></option> 
                                    <?php endforeach; ?>
                                    </select>
                                    <label>Aracın Modeli</label>
                                </div>
                            </div>


                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="yil" value="<?php echo $arac["yil"]; ?>">
                                    <label>Yıl</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="km" value="<?php echo $arac["km"]; ?>">
                                    <label>KM</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="renk" value="<?php echo $arac["renk"]; ?>">
                                    <label>Renk</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="motorhacmi" value="<?php echo $arac["motorhacmi"]; ?>">
                                    <label>Motor Hacmi</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="maxhiz" value="<?php echo $arac["maxhiz"]; ?>">
                                    <label>Maksimum Hız</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="agirlik" value="<?php echo $arac["agirlik"]; ?>">
                                    <label>Ağırlık</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="tekersayisi" value="<?php echo $arac["tekersayisi"]; ?>">
                                    <label>Teker Sayısı</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="vites" value="<?php echo $arac["vites"]; ?>">
                                    <label>Vites</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="sunroof" value="<?php echo $arac["sunroof"]; ?>">
                                    <label>Sunroof</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row buttons text-center">
                    <button type="submit" class="btn primary">Güncelle</button>
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