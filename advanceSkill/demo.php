<?php 
$title = 'Contact';
include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'header.php'); ?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">A Bootstrap 4 Starter Template</h1>
        <p class="lead">Complete with pre-defined file paths and responsive navigation!</p>

        
        <?php
        $i=0;
          for( $i=2;$i<26;$i++)
          echo $i.'<br>';
        ?>

        <?php
        
        $prix_souris = 500;
        $prix_clavier = 300;
        $prix_jump = 180;

        echo 'le prix total des 10 souris sont:'.($prix_souris*10).'<br>';
        echo 'le prix total des 5 clavier sont:'.($prix_clavier*5).'<br>';
        echo 'le prix total des 2 jump sont:'.($prix_jump*2).'<br>';
        
        ?>



        <ul class="list-unstyled">
          <li>Advanced Skill</li>
          <li>POO PHP</li>
        </ul>
      </div>
    </div>
  </div>
  <?php include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'footer.php'); ?>

