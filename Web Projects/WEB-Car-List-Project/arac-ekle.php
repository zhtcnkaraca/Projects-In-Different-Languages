<?php
define("SEC", true);
require_once("inc/_header.php");

if ( !$user->isLoggedIn() ) {
    header('Location: login.php');
};

global $conn;
    $query = $conn->prepare("SELECT * FROM markalar");
    $query->execute();
        $markalar__tmp = $query->fetchAll();

        $markalar = [];
        foreach ($markalar__tmp as $marka) {
            $markalar[$marka["id"]] = $marka["marka"];
        }

    $markaid = $_GET["marka"] ? $_GET["marka"] : $_POST["markaid"];

    $query = $conn->prepare("SELECT * FROM modeller WHERE markaid = :markaid");
    $query->bindValue(":markaid", $markaid);
    $query->execute();
        $modeller__tmp = $query->fetchAll();

        $modeller = [];
        foreach ($modeller__tmp as $model) {
            $modeller[$model["id"]] = $model["model"];
        }

    if(isset($_FILES["fotograf"]) && $_FILES["fotograf"]["error"] == 0){
        $fotograf = $_FILES["fotograf"]["name"];
        move_uploaded_file($_FILES["fotograf"]["tmp_name"], "resimler/" . $fotograf);

        $query = $conn->prepare(
            "INSERT INTO araclar (markaid, markaadi, modelid, modeladi, yil, km, renk, motorhacmi, maxhiz, fotograf, agirlik, tekersayisi, vites, sunroof) 
                    VALUES (:markaid, :markaadi, :modelid, :modeladi, :yil, :km, :renk, :motorhacmi, :maxhiz, :fotograf, :agirlik, :tekersayisi, :vites, :sunroof)"
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
        $query->bindValue(":fotograf", $fotograf);
        $query->bindValue(":agirlik", $_POST["agirlik"]);
        $query->bindValue(":tekersayisi", $_POST["tekersayisi"]);
        $query->bindValue(":vites", $_POST["vites"]);
        $query->bindValue(":sunroof", $_POST["sunroof"]);
        
        $query->execute();
    
        $message = "Araç eklendi. Yeni araç eklemek için <a href='arac-ekle.php'>buraya</a> tıklayın.";
    } else{
        $message = "Fotoğraf seçmediniz ya da yüklenirken bir hata oluştu. Dosya ve klasör izinlerini ve sunucu yapılandırmanızı kontrol edin.";
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
		<h3><?php $app->name(); ?> Araç Ekleme</h3>
		<small>Bu ekrandan araç ekleyebilirsiniz.</small>
	</div>
	<div class="box-body">

        <div>

            <?php if ( isset($_POST["hidden"]) ) : ?>
            <div class="alert alert-info text-sm">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>

            <form action="arac-ekle.php" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                                    <select name="markaid" class="form-control form-control-sm md-input"
                                        onchange="window.document.location.href='arac-ekle.php?marka='+this.options[this.selectedIndex].value;">
                                        <option value="0">Marka seçin</option> 
                                    <?php foreach ($markalar as $id => $marka) : ?>
                                        <option <?php echo $markaid == $id ? "selected" : ""; ?> value="<?php echo $id?>"><?php echo $marka; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    <label>Aracın Markası</label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="md-form-group">
                                    <select name="modelid" class="form-control form-control-sm md-input">
                                    <?php if ($markaid) : ?>
                                        <?php foreach ($modeller as $id => $model) : ?>
                                            <option value="<?php echo $id ?>"><?php echo $model; ?></option> 
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="0">Model seçmek için önce marka seçin</option>
                                    <?php endif; ?>
                                    </select>
                                    <label>Aracın Modeli</label>
                                </div>
                            </div>


                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="yil">
                                    <label>Yıl</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="km">
                                    <label>KM</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="renk">
                                    <label>Renk</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="motorhacmi">
                                    <label>Motor Hacmi</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="maxhiz">
                                    <label>Maksimum Hız</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input type="file" name="fotograf" class="md-input">
                                    <label>Fotoğraf</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="agirlik">
                                    <label>Ağırlık</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="tekersayisi">
                                    <label>Teker Sayısı</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="vites">
                                    <label>Vites</label>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="md-form-group">
                                    <input class="md-input" name="sunroof">
                                    <label>Sunroof</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row buttons text-center">
                    <button type="submit" class="btn primary">Kaydet</button>
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