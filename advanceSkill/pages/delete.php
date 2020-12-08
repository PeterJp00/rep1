<?php
require('Personne.php');
require('db_connection.php');
$personne = new Personne();
$id_personne = $_GET['id'];
var_dump($personne->deletePersonne($id_personne));

