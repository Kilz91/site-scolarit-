<h2>Gestion des classes</h2>

<?php
    $laClasse = null; //classe a modifier
    if (isset($_GET['action']) && isset($_GET['idclasse']))
    {
        $action = $_GET['action'];
        $idclasse = $_GET['idclasse'];

        switch($action)
        {
            case "sup" : 
            //$unControleur->deleteClasse($idclasse); 

            //appel de la procédure stockee
            $nomP = "deleteClasse";
            $tab = array($idclasse);
            $unControleur->appelProcedure ($nomP, $tab);

            break;
           
            case "edit" :$laClasse=$unControleur->selectWhereClasse ($idclasse); 
            //var_dump ($laClasse); 
            break;
        }
    }
    require_once ("vue/vue_insert_classe.php");
    
    if (isset($_POST['Valider']))
    {
        //$unControleur->insertClasse ($_POST);

        //appel de la procédure stockee
        $nomP = "insereClasse";
        $tab = array($_POST['nom'],$_POST['salle'],$_POST['diplome']);
        $unControleur->appelProcedure ($nomP, $tab);
    }
    if (isset($_POST['Modifier']))
    {
        $unControleur->updateClasse ($_POST);
        header("location: index.php?page=2");
    }


    if (isset($_POST['Filtrer']))
    {
        $filtre = $_POST['filtre'];
        $lesClasses = $unControleur->searchAllClasses($filtre);
    
    }else{

        $lesClasses = $unControleur->selectAllClasses ();
    }
    require_once ("vue/vue_select_classe.php");

?>