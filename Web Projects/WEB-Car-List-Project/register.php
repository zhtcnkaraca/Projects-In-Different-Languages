<?php
define("SEC", true);
require_once("inc/_header.php");


if ( $user->isLoggedIn() ) { header('Location: index.php'); };
		

$isPosted = isset($_POST["hidden"]);
$adi = $_POST["adi"];
$soyadi = $_POST["soyadi"];
$eposta = $_POST["eposta"];
$sifre = $_POST["sifre"];
$sifredogrulama = $_POST["sifredogrulama"];

if ( $isPosted ) { 

	if (empty($adi) || empty($soyadi) || empty($eposta)) { 
		$message = "Girdiğiniz bilgiler eksik, lütfen bütün kutucukları doldurun.";
		$isAccountCreated = false;
	} elseif ($sifre != $sifredogrulama) { 
		$message = "Girdiğiniz şifreler eşleşmiyor. </br> Şifrelerinizi kontrol edin.";
		$isAccountCreated = false;
	} else {
		if ($user->userData($eposta)) { 
			$message = "Bu e-posta ile kayıt olunmuş. </br> Başka bir e-posta adresi deneyin.";
			$isAccountCreated = false;
		} else { 
			$aktivasyonkodu = mt_rand(100000,999999);
			
			$query = $conn->prepare(
				"INSERT INTO uyeler (adi, soyadi, eposta, sifre, aktivasyon) VALUES (:adi,:soyadi,:eposta,:sifre,:aktivasyon)"
			);
			$query->bindValue(":adi", $adi);
			$query->bindValue(":soyadi", $soyadi);
			$query->bindValue(":eposta", $eposta);
			$query->bindValue(":sifre", $sifre);
			$query->bindValue(":aktivasyon", $aktivasyonkodu);
			
			$query->execute();

			$ileti = "Aktivasyon kodunuz: " . $aktivasyonkodu;
			mail($eposta, 'Proje Odevi Hesap Aktivasyonu', $aktivasyonkodu);
			
			$eposta = urlencode($eposta);

			$message = "Hesabınız başarılı bir şekilde oluşturuldu ve e-posta adresinize bir aktivasyon kodu gönderildi.</br></br>";
			$message .= "Bu aktivasyon kodu ile hesabınızı aktifleştirmelisiniz.</br></br>";
			$message .= "Aktivasyon yapmak için <a href='activation.php?eposta={$eposta}'>buraya</a> tıklayın.";
			$isAccountCreated = true;	
		}
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
				<strong><?php $app->name(); ?></strong> hesabınızı oluşturun.
			</div>
			
			<?php if ($message) : ?>
				<div class="alert alert-info text-sm text-center <?php echo $isAccountCreated ? "m-b-0" : ""; ?>">
					<?php echo $message; ?>
				</div>
			<?php endif; ?>

			<?php if (!$isAccountCreated) : ?>
			<form action="register.php" method="POST" autocomplete="off">
				<input autocomplete="false" name="hidden" type="text" style="display:none;">
				<div class="md-form-group float-label">
					<input type="text" name="adi" class="md-input">
					<label>Adınız</label>
				</div>
				<div class="md-form-group float-label">
					<input type="text" name="soyadi" class="md-input">
					<label>Soyadınız</label>
				</div>
				<div class="md-form-group float-label">
					<input type="text" name="eposta" class="md-input">
					<label>E-Posta Adresiniz</label>
				</div>
				<div class="md-form-group float-label">
					<input type="password" name="sifre" class="md-input">
					<label>Şifreniz</label>
				</div>
				<div class="md-form-group float-label">
					<input type="password" name="sifredogrulama" class="md-input">
					<label>Şifreniz (tekrar)</label>
				</div>
				<button type="submit" class="btn primary btn-block p-x-md">Hesap oluştur</button>
			</form>
			<?php endif; ?>
		</div>

		<div class="p-v-lg text-center">
			<a href="index.php" class="text-primary _600">Anasayfa'ya git.</a>
		</div>

	</div>

</div>

<?php require_once("inc/_footer.php"); ?>