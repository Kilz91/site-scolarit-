<h2>Gestion des étudiants</h2>

<?php
if (isset($_SESSION['email']) && isset($_SESSION['role']) && $_SESSION['role'] == "admin"){

if (isset($_GET['action']) && isset($_GET['idetudiant']))
    {
        $action = $_GET['action'];
        $idetudiant = $_GET['idetudiant'];

        switch($action)
        {
            case "sup" : $unControleur->deleteEtudiant($idetudiant); break;
            case "edit" : break;
        }
    }

    $lesClasses = $unControleur->selectAllClasses ();
    require_once ("vue/vue_insert_etudiant.php");

    if (isset($_POST['Valider']))
    {
        $unControleur->insertEtudiant ($_POST);
    }

    $lesEtudiants = $unControleur->selectAllEtudiants ();

    require_once ("vue/vue_select_etudiant.php");
}
?>