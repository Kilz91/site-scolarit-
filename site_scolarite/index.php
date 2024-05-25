<?php
session_start();
    require_once("controleur/controleur.classe.php");
    $unControleur = new Controleur ();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Iris Scolarité</title>
        <meta charset="utf-8">
</head>
<body>
    <center>
        <h1> Gestion de la scolarité d'IRIS</h1>
        <br/>

        <?php
        if ( ! isset($_SESSION['email'])){
            require_once("vue/vue_form.php");
        }
        if (isset($_POST['ValiderForm'])){
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $unUser = $unControleur->verifConnexion($email, $mdp);
            if ($unUser != null){
                //enregistrement dans la SESSION
                $_SESSION ['nom'] = $unUser['nom'];
                $_SESSION ['prenom'] = $unUser['prenom'];
                $_SESSION ['email'] = $unUser['email'];
                $_SESSION ['role'] = $unUser['role'];
                header("Location: index.php?page=1");
            }
            else{
                echo "<br/> Veuillez vérifier vos identifiants";
            }
        }
        if (isset($_SESSION['email'])){
            echo '
        

        <a href="index.php?page=1">
            <img src="image/iris.png" heigt="160" width="160"></a>

        <a href="index.php?page=2">
            <img src="image/classe.png" heigt="145" width="145"></a>

        <a href="index.php?page=3">
            <img src="image/etudiant.jpg" heigt="85" width="85"></a>

         <a href="index.php?page=4">
            <img src="image/professeur.png" heigt="85" width="85"></a>

          <a href="index.php?page=5">
            <img src="image/enseignement.png" heigt="85" width="85"></a>
           
        <a href="index.php?page=6">
            <img src="image/deconnecter.png" heigt="85" width="85"></a>

            ';

 
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    //ou ça $page = (isset($_GET,['page'])) ? $_GET,['page'] : 1;
    switch ($page){
        case 1 : require_once ("home.php"); break;
        case 2 : require_once ("gestion_classe.php"); break;
        case 3 : require_once ("gestion_etudiant.php"); break;
        case 4 : require_once ("gestion_professeur.php"); break;
        case 5 : require_once ("gestion_enseignement.php"); break;
        case 6 : session_destroy();
                unset($_SESSION['email']);
                header("Location: index.php");
                break;
        default : require_once ("erreur.php"); break;
    }
} //fin du if
?>

</center>
</body>
</html>