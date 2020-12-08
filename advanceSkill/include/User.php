<?php
    // require('db_connection.php');

class User {

    public $username;
    public $email_user;
    public $password_user;
    public $statut_user; 
    public $niveau_user; 
    public $staimage_usertut_user; 	

    // Creation du consctructeur ( Moteur d'instanciation de la classe User) *********************************************
    public function __construct(){
        // var_dump($this->username);
    }

    // Insertion d'utilisateur ***********************************************************************
    public function addUser(string $username, string $email_user, string $password_user, string $statut_user, string $niveau_user, string $image_user):bool
    {
        global $connection;
        
        $this->username         = $username;
        $this->email_user       = $email_user;
        $this->password_user    = $password_user;
        $this->statut_user      = $statut_user;
        $this->niveau_user      = $niveau_user;
        $this->image_user       = $image_user;
        

        $sql_insert_user = 'INSERT INTO t_user (username,email_user,password_user,statut_user,niveau_user,image_user) VALUES (:username,:email_user,:password_user,:statut_user,:niveau_user,:image_user)';
        $stmt_insert_user = $connection->prepare($sql_insert_user);
        $test_insertion = $stmt_insert_user->execute([':username'=>$username,':email_user'=>$email_user,':password_user'=>$password_user,':statut_user'=>$statut_user,':niveau_user'=>$niveau_user,':image_user'=>$image_user]);
        if ($test_insertion) {

            return true;

        }else{

            echo "<script>alert('Echec insertion')</script>";
                return false;

        }

    }


    // Lister les utilisateurs ***********************************************************************
    public function getUsers()
    {

        global $connection;
        global  $getuser;

        $sql_select_all_users = ' SELECT * FROM t_user ORDER BY id_user ASC';
        $stmt_select_all_users = $connection->prepare($sql_select_all_users);
        $stmt_select_all_users->execute();
        $getuser = $stmt_select_all_users->fetchAll(PDO::FETCH_CLASS,'User');
        
        return $getuser;

    }


    // lister les infos d'un utilisateur ***********************************************************************
    public function getUniqueUser(string $key)
    {   
        $this->key = $key;

        global $connection;
        global  $getUniqueInfoUser;
        // global  $countInfoUniqueuser;

        $sql_select_unique_users = ' SELECT * FROM t_user WHERE id_user=:key OR email_user=:key';
        $stmt_select_unique_users = $connection->prepare($sql_select_unique_users);
        $stmt_select_unique_users->execute(['key'=>$key]);
        $getUniqueInfoUser = $stmt_select_unique_users->fetch(PDO::FETCH_OBJ);
        return $getUniqueInfoUser;
        
    }


    // Modifier un utilisateur ***********************************************************************
    public function editUser(int $id_user,string $username, string $email_user, string $password_user, string $statut_user, string $niveau_user, string $image_user): bool
    {   
        $this->id_user          = $id_user;
        $this->username         = $username;
        $this->email_user       = $email_user;
        $this->password_user    = $password_user;
        $this->statut_user      = $statut_user;
        $this->niveau_user      = $niveau_user;
        $this->image_user       = $image_user;
        
        global $connection;
        global  $editInfouser;

        $sql_edit_user = ' UPDATE t_user SET nom_user=:nom, prenom_user=:prenom,sexe_user=:sexe,age_user=:age,email_user=:email,password_user=:password WHERE id_user=:id_user';
        $stmt_edit_user = $connection->prepare($sql_edit_user);
        $stmt_edit_user->execute(['id_user'=>$id_user,':username'=>$username,':email_user'=>$email_user,':password_user'=>$password_user,':statut_user'=>$statut_user,':niveau_user'=>$niveau_user,':image_user'=>$image_user]);
        $editInfouser = $stmt_edit_user->fetch(PDO::FETCH_OBJ);

        if($editInfouser == false){
            
            return $editInfouser;
        }else{

            echo "<script>alert('Echec Modification')</script>";
        }


    }


    // Supprimer un utilisateur ***********************************************************************
    public function deleteUser(int $id_user)
    {

        global $connection;
        global  $deleteuser;

        $sql_delete_user = ' DELETE FROM t_user WHERE id_user=:id_user';
        $stmt_delete_user = $connection->prepare($sql_delete_user);
        $deleteuser = $stmt_delete_user->execute(['id_user'=>$id_user]);
        
        if ($deleteuser == true ){
             header('Location:index.php');
        }else{
            echo "<script>alert('Echec Supprimer')</script>";
        }
        
    }


    // Restriction de mot de passe utilisateur (l'utilisateur doit entrer plus de 6 caracteres) ***********************************************************************
    public function passwordRestriction(string $password):bool
    {
        define("LIMIT_PASSWORD",6);
        $this->password=$password;

        if ( strlen($password) < LIMIT_PASSWORD) {

            return true;    

        }else {
            
            return false;
        }

    }


    // Authentification de l'utilisateur par son mot de passe ***********************************************************************
    public function authUser(string $password,string $existingPassword):bool
    {
       $this->password=$password;

        if (password_verify($password,$existingPassword)) {
            
            return true;

        }else{
            
            return false;
        }

        
    }

}

?>