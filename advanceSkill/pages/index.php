<?php

require('Personne.php');
require('db_connection.php');


$personne = new Personne();
$personne->getPersonnes();



if (isset($_POST['add_personne']) AND $_POST['nom'] AND $_POST['prenom'] != '') {
   
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $personne->addPersonne($nom,$prenom,$sexe,$age,$email,$password);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO Test</title>
</head>
<body>
 
    
<h2>Ajouter une personne</h2>
    <form action="" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="" ><br><br>
        

        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" id=""><br><br>

        <label for="sexe">Sexe</label>
        <input type="text" name="sexe" id=""><br><br>

        <label for="age">Age</label>
        <input type="numeric"  min=0 name="age" id=""><br><br>

        <label for="email">Email</label>
        <input type="email"  min=0 name="email" id=""><br><br>

        <label for="password">Password</label>
        <input type="password"  min=0 name="password" id="" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];}?>">
        <p style="color:red;"><?php if(isset($_POST['password']) AND $personne->passwordRestriction($_POST['password']) == true){ echo  "Mot de passe trop court";} ?></p><br><br>
        <br><br>

        <button type="submit" name="add_personne">Add</button>
    </form>


    <h2>List Personnes</h2>

    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Age</th>
            <th>Email</th>
            <th>Password</th>
            <th>Option</th>
        </tr>
        <tr>

        <?php foreach($getPersonne as $getPersonne): ?>
        <tr>
            <td><?=$getPersonne->id_personne?></td>
            <td><?=$getPersonne->nom_personne?></td>
            <td><?=$getPersonne->prenom_personne?></td>
            <td><?=$getPersonne->sexe_personne?></td>
            <td><?=$getPersonne->age_personne?></td>
            <td><?=$getPersonne->email_personne?></td>
            <td><?=$getPersonne->password_personne?></td>
            <td> 
                <a href="hello.php?id=<?=$getPersonne->id_personne?>" >Modifier</a>
                <a href="delete.php?id=<?=$getPersonne->id_personne?>" onclick="alert('Voulez-vous supprimer?')">Supprimer</a>
            
            </td>
        </tr>
        <?php endforeach;?>
        
      
        
        </tr>
    
    </table>

</body>
</html>