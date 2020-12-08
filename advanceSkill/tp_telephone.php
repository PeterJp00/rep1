<?php 
$title = 'Contact';
include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'header.php'); ?>



  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Achat de Telephone</h1>
        <!-- <p class="lead">Complete with pre-defined file paths and responsive navigation!</p> -->

<?php if(!isset($_POST['achat'])): ?>
        <form action="" method="post">
            <table class="table col-ms-6">
                <thead>
                    <tr>
                    <th scope="col">Selection</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Quantite</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Samsung   Data -->
                    <tr>
                        <th scope="row"><input type="checkbox" name="produit[]" id="" value="samsung"></th>
                        <td>Samsung</td>
                        <td>10000 Gdes</td>
                        <td><input type="number" min=0 name="prix_samsung" id="" class="col-md-4"></td>
                    </tr>

                     <!-- Iphone   Data -->
                    <tr>
                        <th scope="row"><input type="checkbox" name="produit[]" value="iphone" id=""></th>
                        <td>Iphone</td>
                        <td>19000 Gdes</td>
                        <td><input type="number" min=0 name="prix_iphone" id="" class="col-md-4"></td>
                    </tr>

                     <!-- Huawei   Data -->
                    <tr>
                        <th scope="row"><input type="checkbox" name="produit[]" id="" value="huawei"></th>
                        <td>Huawei</td>
                        <td>17000 Gdes</td>
                        <td><input type="number" min=0 name="prix_huawei" id="" class="col-md-4"></td>
                    </tr>

                    <!-- Motorola   Data -->
                    <tr>
                        <th scope="row"><input type="checkbox" name="produit[]" id="" value="motorola"></th>
                        <td>Motorola</td>
                        <td>10000 Gdes</td>
                        <td><input type="number" min=0 name="prix_motorola" id="" class="col-md-4"></td>
                    </tr>

                    <!-- LG   Data -->
                    <tr>
                        <th scope="row"><input type="checkbox" name="produit[]" id="" value="lg"></th>
                        <td>LG</td>
                        <td>12000 Gdes</td>
                        <td><input type="number" min=0 name="prix_lg" id="" class="col-md-4"></td>
                    </tr>


                </tbody>
            </table>

            <div class="form-group">
            <button type="submit" class="btn btn-outline-primary" name="achat">Achter</button>
            </div>
            
        </form>
           <?php else: ?>
            <table class="table col-ms-6">
                <thead>
                    <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Prix Total</th>
                    </tr>
                </thead>

                <tbody>
                 

                    <?php

                        $tble_des_produits = ['samsung'=>10000,'iphone'=>19000,'huawei'=>17000,'motorola'=>10000, 'lg'=>12000];

                        if(isset($_POST['produit'])){

                            $produit = $_POST['produit'];
                            $prix_samsung   = $_POST['prix_samsung'];
                            $prix_iphone    = $_POST['prix_iphone'];
                            $prix_huawei    = $_POST['prix_huawei'];
                            $prix_motorola  = $_POST['prix_motorola'];
                            $prix_lg        = $_POST['prix_lg'];

                            foreach($produit as $produit){

                                foreach($tble_des_produits as $pro =>$prix){
                                    
                                    if($produit == $pro){

                                        if($produit === 'samsung'){
                                            echo '<tr>
                                                    <td>'.$produit.'</td>
                                                    <td>'.$prix.' Gdes</td>
                                                    <td>'.$prix_samsung.'</td>
                                                    <td>'.$prix*$prix_samsung.' Gdes</td>
                                                </tr>';

                                        }elseif($produit === 'iphone'){
                                            echo '<tr>
                                                    <td>'.$produit.'</td>
                                                    <td>'.$prix.' Gdes</td>
                                                    <td>'.$prix_iphone.'</td>
                                                    <td>'.$prix*$prix_iphone.' Gdes</td>
                                                </tr>';
                            
                                        }elseif($produit === 'huawei'){
                                            echo '<tr>
                                                    <td>'.$produit.'</td>
                                                    <td>'.$prix.' Gdes</td>
                                                    <td>'.$prix_huawei.'</td>
                                                    <td>'.$prix*$prix_huawei.' Gdes</td>
                                                </tr>';
                            
                                        }elseif($produit === 'motorola'){
                                            echo '<tr>
                                                    <td>'.$produit.'</td>
                                                    <td>'.$prix.' Gdes</td>
                                                    <td>'.$prix_motorola.'</td>
                                                    <td>'.$prix*$prix_motorola.' Gdes</td>
                                                </tr>';
                            
                                        }elseif($produit === 'lg'){
                                            echo '<tr>
                                            <td>'.$produit.'</td>
                                            <td>'.$prix.' Gdes</td>
                                            <td>'.$prix_lg.'</td>
                                            <td>'.$prix*$prix_lg.' Gdes</td>
                                        </tr>';
                            
                                        }
                                    }
                                }

                            }

                        }
                        if(isset($_POST['retour'])){echo 'yes';}
                    ?>

                </tbody>
            </table>
            <form action="" method="post">
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="retour">Retour</button>
            </div>
            </form>
           <?php endif;?>


        <ul class="list-unstyled">
          <li>Advanced Skill</li>
          <li>POO PHP</li>
        </ul>
      </div>
    </div>
  </div>
  <?php include (__DIR__ . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'footer.php'); ?>

