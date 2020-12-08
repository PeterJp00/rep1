<?php

// Fonction message  ********************************************
function message(string $message, bool $type)
{
    if($type == true){
        echo '<p class="alert alert-success col-md-6">'.$message.'</p>';
    }else{
       echo '<p class="alert alert-danger col-md-6">'.$message.'</p>';
    }

}









?>