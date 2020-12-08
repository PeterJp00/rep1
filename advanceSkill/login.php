<?php 
$title = '';

include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'header.php'); 
?>

<?php

if (isset($_POST['btn_connexion']) && isset($_POST['email']) && isset($_POST['password'])) 
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->getUniqueUser($email);

    if($getUniqueInfoUser)
    {
        if($user->authUser($password,$getUniqueInfoUser->password_user) == true){

          $_SESSION['username']     = $getUniqueInfoUser->username;
          $_SESSION['email_user']   = $getUniqueInfoUser->email_user;
          $_SESSION['statut_user']  = $getUniqueInfoUser->statut_user;
          $_SESSION['niveau_user']  = $getUniqueInfoUser->niveau_user;
          $_SESSION['image_user']   = $getUniqueInfoUser->image_user;

          header("Location: index.php");
           
        }else{
            $_SESSION['message'] =  'Email ou mot de passe incorrect';
            $_SESSION['type'] = false;
        }
    }
    else{ 

      $_SESSION['message'] =  'Email ou mot de passe incorrect';
      $_SESSION['type'] = false;

    }
}

?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Connexion</h1>

        <center>
        <?php 
          
          if(isset($_SESSION['message'],$_SESSION['type']) && $_SESSION['type'] === true ){

              message($_SESSION['message'],true);

            }elseif(isset($_SESSION['message'],$_SESSION['type']) && $_SESSION['type'] === false ){

              message($_SESSION['message'],false);
            
            } 
            $_SESSION['message']='';$_SESSION['type']='';
          
          ?>
        <form action="" style="margin:20px; padding:10px; border:1px solid grey; border-radius:5px; width:80%;" method="POST">
            <div class="">
                <label for="email">Email</label>
            <input type="email" name="email" id=""  class="form-control col-md-6" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
            <input type="password" name="password" id="" class="form-control col-md-6" >
            </div>
            <button class="btn btn-outline-primary" type="submit" name="btn_connexion">Connecter</button><br>
             <a href="register.php"  class="nav-link" >Creer un compte</a>
        </form>
        </center>

        <ul class="list-unstyled">
          <li>Advanced Skill</li>
          <li>POO PHP</li>
        </ul>
      </div>
    </div>
  </div>
  <?php include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'footer.php'); ?>


