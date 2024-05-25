<h2>Gestion des professeurs</h2>

<?php
if (isset($_SESSION['email']) && isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
    $leProfesseur = null; //professeur a modifier
    if (isset($_GET['action']) && isset($_GET['idprofesseur']))
    {
        $action = $_GET['action'];
        $idprofesseur = $_GET['idprofesseur'];

        switch($action)
        {
            case "sup" : $unControleur->deleteProfesseur($idprofesseur); 
            break;
           
            case "edit" :$leProfesseur=$unControleur->selectWhereProfesseur ($idprofesseur); 
            //var_dump ($leProfesseur); 
            break;
        }
    }
    require_once ("vue/vue_insert_professeur.php");
    
    if (isset($_POST['Valider']))
    {
        $unControleur->insertProfesseur ($_POST);
    }
    if (isset($_POST['Modifier']))
    {
        $unControleur->updateProfesseur ($_POST);
        header("location: index.php?page=4");
    }
}

    if (isset($_POST['Filtrer']))
    {
        $filtre = $_POST['filtre'];
        $lesProfesseurs = $unControleur->searchAllProfesseurs($filtre);
    
    }else{

        $lesProfesseurs = $unControleur->selectAllProfesseurs ();
    }
    require_once ("vue/vue_select_professeur.php");

?>