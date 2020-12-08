<?php 
$title = 'Contact';
include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'header.php'); ?>
<?php

$user->getUsers();

?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">


      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Liste des utilisateurs</h1>
        <!-- <p class="lead">Complete with pre-defined file paths and responsive navigation!</p> -->
       
        <table class="table col-ms-6">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Niveau</th>
                <th scope="col">Statut</th>
                <th scope="col">Image</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($getuser as $getuser): ?>
                <tr>
                <th scope="row"><?=$getuser->id_user?></th>
                <td><?=$getuser->username?></td>
                <td><?=$getuser->email_user?></td>
                <td><?=$getuser->niveau_user?></td>
                <td><?=$getuser->statut_user?></td>
                <?php //if($getuser->image_user ==''): ?>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

      </div>





      
    </div>
  </div>
  <?php include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'footer.php'); ?>

