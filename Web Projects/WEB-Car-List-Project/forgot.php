<?php
define("SEC", true);
require_once("inc/_header.php");


if ( $user->isLoggedIn() ) {
	header('Location: index.php');
};


$isPosted = isset($_POST["hidden"]);
$username = $_POST['kullaniciadi'];

$message = "Yeni şifreniz e-posta adresinize gönderilecek.";

if ( $isPosted ) {
	$u = $user->userData($username);

	if ($u) {
		$ileti = "Hesap sifreniz: " . $u["sifre"];
		mail($u["eposta"], 'Proje Odevi Sifre Hatirlatma', $ileti);

		$message = "Şifreniz e-posta adresinize gönderildi.";

		$isMailSent = true;
	} else {
		$message = "Bu e-posta adresi ile kayıtlı bir hesap bulunamadı.";
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
				<strong><?php $app->name(); ?></strong> hesap şifrenizi sıfırlayın.
			</div>
			<?php if ($message) : ?>
			<div class="alert alert-info text-sm text-center <?php echo $isMailSent ? "m-b-0" : ""; ?>">
				<?php echo $message; ?>
			</div>
			<?php endif; ?>

			<?php if (!$isMailSent) : ?>
			<form action="forgot.php" method="POST" autocomplete="off">
				<input autocomplete="false" name="hidden" type="text" style="display:none;">
				<div class="md-form-group float-label">
					<input type="text" name="kullaniciadi" class="md-input">
					<label>E-Posta</label>
				</div>
				<button type="submit" class="btn primary btn-block p-x-md">Gönder</button>
			</form>
			<?php endif; ?>
		</div>

		<div class="p-v-lg text-center">
			<a href="index.php" class="text-primary _600">Anasayfa'ya git.</a>
		</div>
	</div>

</div>

<?php require_once("inc/_footer.php"); ?>