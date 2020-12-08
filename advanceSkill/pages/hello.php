<?php

require('Personne.php');
require('db_connection.php');
$personne = new Personne();
$id_personne = $_GET['id'];
$personne->getUniquePersonne($id_personne);

if (isset($_POST['edit_personne'])){

    if ( $personne->passwordRestriction($_POST['password']) === true) {
        
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT) ;

        if ($personne->editPersonne($id_personne,$nom,$prenom,$sexe,$age,$email,$password) == false) {

            echo "<script>window.open(window.location.href,'_self')</script>";

        }else{

            echo 'Echec';

        }
        
    }
 




}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
</head>
<body>
    
<form action="" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="" value="<?=$getUniqueInfoPersonne->nom_personne?>" ><br><br>

        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" id="" value="<?=$getUniqueInfoPersonne->prenom_personne?>"><br><br>

        <label for="sexe">Sexe</label>
        <input type="text" name="sexe" id="" value="<?=$getUniqueInfoPersonne->sexe_personne?>"><br><br>

        <label for="age">Age</label>
        <input type="numeric"  min=0 name="age" id="" value="<?=$getUniqueInfoPersonne->age_personne?>"><br><br>

        <label for="email">Email</label>
        <input type="email"  min=0 name="email" id="" value="<?=$getUniqueInfoPersonne->email_personne?>"><br><br>

        <label for="password">Password</label>
        <input type="password"  min=0 name="password" id="" value="">
        <p style="color:red;"><?php if(isset($_POST['password']) AND $personne->passwordRestriction($_POST['password']) == true){ echo  "Mot de passe trop court";} ?></p><br><br>
        <br><br>

        <button type="submit" name="edit_personne">Modifier</button>
    </form>


</body>
</html>