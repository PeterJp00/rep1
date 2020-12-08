<?php
$dsn = 'mysql:host=localhost;dbname=advancedskill';
$username = 'root';
$password = '';

try {

$connection = new PDO($dsn, $username, $password);

} catch(PDOException $e) {

	echo "<script>alert('ERREUR DE CONNECTION')</script>";

}

?>