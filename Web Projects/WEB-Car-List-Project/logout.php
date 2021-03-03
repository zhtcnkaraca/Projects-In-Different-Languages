<?php
define("SEC", true);
require_once("inc/_header.php");

session_destroy();
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
			<div class="text-sm text-center">
				<strong><?php $app->name(); ?></strong> oturumunuz sonlandırıldı.
			</div>
		</div>

		<div class="p-v-lg text-center">
			<div class="m-b">
				<a href="index.php" class="text-primary _600">Anasayfaya gitmek için tıklayın.</a></div>
		</div>
	</div>

</div>

<?php require_once("inc/_footer.php"); ?>