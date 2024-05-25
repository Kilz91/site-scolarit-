<h3> Liste des professeurs </h3>
<form method="post">
    Filter par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td> Id professeur </td>
        <td> Nom </td>
        <td> Prénom </td>
        <td> Email </td>
        <td> Diplôme Obtenu </td>

        <?php
        if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
        echo "Opérations </td>";
        }
?>
        
    </tr>
<?php
if (isset($lesProfesseurs)){
    foreach ($lesProfesseurs as $unProfesseur){
        echo "<tr>";
        echo "<td>",$unProfesseur['idprofesseur']."</td>";
        echo "<td>",$unProfesseur['nom']."</td>";
        echo "<td>",$unProfesseur['prenom']."</td>";
        echo "<td>",$unProfesseur['email']."</td>";
        echo "<td>",$unProfesseur['diplome']."</td>";

        if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
        echo "<td> <a href='index.php?page=4&action=sup&idprofesseur=".$unProfesseur['idprofesseur']."'>";
        echo "<img src='image/supprimer.png' height='30' witdh'30'> </a>";
        echo "<a href='index.php?page=4&action=edit&idprofesseur=".$unProfesseur['idprofesseur']."'>";
        echo "<img src='image/editer.png' height='30' witdh'30'> </a>";
        }
        echo "</td>";
        echo "</tr>";   
    }
}
?>
</table>