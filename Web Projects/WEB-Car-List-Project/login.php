<?php
define("SEC", true);
require_once("inc/_header.php");


if ( $user->isLoggedIn() ) {
	header('Location: index.php');
};


$isPosted = isset($_POST["hidden"]);
$kullaniciadi = $_POST['kullaniciadi'] ? $_POST['kullaniciadi'] : $_GET["kullaniciadi"];
$sifre = $_POST['sifre'] ? $_POST['sifre'] : "";

$user = $user->userData($kullaniciadi);

if ( $isPosted ) { 
	if ( $kullaniciadi && $sifre ) { 
	
		if ( $sifre != $user["sifre"] ) { 
			$error = "Kullanıcı adı ya da parola hatalı.";
		} elseif ($user["aktif"] != 1) {
			$error = "Hesap aktif değil. Aktivasyon işlemi yapmadan oturum açamazsınız.";
		} else {
			$_SESSION['isloggedin'] = true;
            
            $_SESSION['id'] = $u["id"];
			$_SESSION['kullaniciadi'] = $kullaniciadi;
			
			header('Location: index.php');
		}
	} else {
		$error = "Kullanıcı adı ve şifre girin.";
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
				</a>
			</div>
		</div>
		<div class="p-a-md box-color r box-shadow-z1 text-color m-a">
			<div class="m-b text-sm text-center">
				<strong><?php $app->name(); ?></strong> hesabınıza giriş yapın.
			</div>
			<?php if ($error) : ?>
			<div class="alert alert-danger text-sm text-center">
				<?php echo $error; ?>
			</div>
			<?php endif; ?>
			<form action="login.php" method="POST" autocomplete="off">
				<input autocomplete="false" name="hidden" type="text" style="display:none;">
				<div class="md-form-group float-label">
					<input type="text" name="kullaniciadi" value="<?php echo $kullaniciadi; ?>" class="md-input">
					<label>E-Posta</label>
				</div>
				<div class="md-form-group float-label">
					<input type="password" name="sifre" class="md-input">
					<label>Şifre</label>
				</div>
				<button type="submit" class="btn primary btn-block p-x-md">Oturum aç</button>
			</form>
		</div>

		<div class="p-v-lg text-center">
			<div class="m-b"><a href="forgot.php" class="text-primary _600">Şifremi unuttum</a></div>
			<div><a href="register.php" class="text-primary _600">Hesap oluştur</a></div>
			<div><a href="activation.php" class="text-primary _600">Hesap aktivasyonu</a></div>
		</div>
	</div>

</div>

<?php require_once("inc/_footer.php"); ?>