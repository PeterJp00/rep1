<?php 

$title = '';
include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'header.php'); 


?>

<?php
if(isset($_POST['btn_inscription'])){

  $username       = $_POST['username'];
  $email_user     = $_POST['email'];
  $password_user  = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $statut_user    = 1;
  $niveau_user    = 'niveau2';
  $image_user     = '';

  $result = $user->addUser($username,$email_user,$password_user,$statut_user,$niveau_user,$image_user);

  if($result == true){
    $_SESSION['message'] = 'Success';
    $_SESSION['type'] = true;
  }else{
    $_SESSION['message'] = 'echec';
    $_SESSION['type'] = false;
  }
}

?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Inscription</h1>

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
                <label for="nom">Nom Complet</label>
            <input type="nom" name="username" id=""  class="form-control col-md-6" require>
            </div>
            <div class="">
                <label for="email">Email</label>
            <input type="email" name="email" id=""  class="form-control col-md-6" require>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
            <input type="password" name="password" id="" class="form-control col-md-6" require>
            </div>
            <button class="btn btn-outline-primary" type="submit" name="btn_inscription">Enregistrer</button><br>
            <p><a href="login.php" class="nav-link">Connecter</a></p>
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


