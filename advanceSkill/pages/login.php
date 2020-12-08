<?php 
require('Personne.php');
require('db_connection.php');

$personne = new Personne();

if (isset($_POST['login'])) 
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $personne->getUniquePersonne($email);

    if($getUniqueInfoPersonne)
    {
        if($personne->authPersonne($password,$getUniqueInfoPersonne->password_personne) == true){
            echo 'Bienvenue';
        }else{
            echo 'Mot de passe incorrect';
        }
    }
    else
    {
        echo 'Email incorrect';
    }
}











?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Connexion</h1>
    <form action="" method="post">
       
        <label for="email">Email</label>
        <input type="email" name="email" id="" value="<?php if(isset($_POST['login'])){echo $_POST['email']; }?>"><br><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="" value="<?php if(isset($_POST['login'])){echo $_POST['password']; }?>"><br><br>

        <button type="submit" name="login">Connexion</button>


    </form>
</body>
</html>