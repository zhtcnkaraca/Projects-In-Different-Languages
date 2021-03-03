<?php
define("SEC", true);
require_once("inc/_header.php");
		

$isPosted = isset($_POST["hidden"]);
$eposta = $_GET["eposta"] ? $_GET["eposta"] : $_POST["eposta"];
$aktivasyon = $_GET["aktivasyon"] ? $_GET["aktivasyon"] : $_POST["aktivasyon"];
$uye = $user->userData($eposta);

if ( $isPosted ) { 

	if ($uye["aktivasyon"] != $aktivasyon) { 
		$message = "Girdiğiniz aktivasyon kodu geçerli değil.";
		$isAccountCreated = false;
	} else {

		$query = $conn->prepare(
			"UPDATE uyeler SET aktif = 1 WHERE eposta = :eposta"
		);

		$query->bindValue(":eposta", $eposta);
		
		$query->execute();
		
		$eposta = urlencode($eposta);
		$message = "Hesabınızın aktivasyon işlemi tamamlandı.</br></br>";
		$message .= "Giriş yapmak için <a href='login.php?kullaniciadi={$eposta}'>buraya</a> tıklayın.";
		$isAccountCreated = true;	
	}
};

?>
<div class="app" id="app">

	<div class="center-block w-xxl w-auto-xs p-y-md">
		<div class="navbar">
			<div class="pull-center">
				<a class="navbar-brand m-r-0">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
					<path d="M 4 4 L 44 4 L 44 44 Z" fill="#a88add"></path>
					<path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)"></path>
					<path d="M 4 4 L 24 4 L 4  44 Z" fill="#0cc2aa"></path>
				</svg>
				<img src="images/logo.png" alt="." class="hide">
				</a>
			</div>
		</div>
		<div class="p-a-md box-color r box-shadow-z1 text-color m-a">
			<div class="m-b text-sm text-center">
				<strong><?php $app->name(); ?></strong> hesap aktivasyonu.
			</div>
			
			<?php if ($message) : ?>
				<div class="alert alert-info text-sm text-center <?php echo $isAccountCreated ? "m-b-0" : ""; ?>">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>

			<?php if (!$isAccountCreated) : ?>
			<form action="activation.php" method="POST" autocomplete="off">
				<input autocomplete="false" name="hidden" type="text" style="display:none;">
				<div class="md-form-group float-label">
					<input type="text" name="eposta" class="md-input" value="<?php echo $eposta; ?>">
					<label>E-Posta Adresiniz</label>
				</div>
				<div class="md-form-group float-label">
					<input type="text" name="aktivasyon" class="md-input" value="<?php echo $aktivasyon; ?>">
					<label>Aktivasyon Kodunuz</label>
				</div>
				<button type="submit" class="btn primary btn-block p-x-md">Onayla</button>
			</form>
			<?php endif; ?>
		</div>

		<div class="p-v-lg text-center">
			<a href="index.php" class="text-primary _600">Anasayfa'ya git.</a>
		</div>
		
	</div>

</div>

<?php require_once("inc/_footer.php"); ?>