<?php
if ( !defined("SEC") ) {
    die("olmaz :)"); 
}

$host = 'sql302.unaux.com';
$username = 'unaux_26079126';
$password = 'xw7d20cd';
$database = 'unaux_26079126_proje';
$charset = 'utf8';

$errormessage = 'Veritabanına bağlanılamıyor.';


try {
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $errormessage; exit;
    
}
?>