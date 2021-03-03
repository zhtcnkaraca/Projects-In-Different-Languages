<?php
if ( !defined("SEC") ) {
    die("yapma bunu :)");
}
require_once("_config.php");


include("App.class.php");
include("User.class.php");


$app = new App();
$user = new User();
$page = basename($_SERVER["SCRIPT_NAME"]);


session_start();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">

	<link rel="stylesheet" type="text/css" href="eklentiler/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="eklentiler/css/animate.css">
	<link rel="stylesheet" type="text/css" href="eklentiler/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="eklentiler/css/glyphicons.css">
	<link rel="stylesheet" type="text/css" href="eklentiler/css/materialdesignicons.css">
	<link rel="stylesheet" type="text/css" href="eklentiler/css/style.css">
	<link rel="stylesheet" type="text/css" href="eklentiler/datatables/css/jquery.dataTables.min.css">

	<link rel="icon" href="eklentiler/logo.png">

	<title><?php $app->name(); ?></title>

</head>

<body>