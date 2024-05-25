<h3> Liste des étudiants </h3>
<form method="post">
    Filter par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td> Id etudiant </td>
        <td> Nom </td>
        <td> Prénom </td>
        <td> Email </td>
        <td> Date de Naissance </td>
        <td> Statut </td>
        <td> Id Classe </td>
        <td> Opérations </td>
        
    </tr>
<?php
if (isset($lesEtudiants)){
    foreach ($lesEtudiants as $unEtudiant){
        echo "<tr>";
        echo "<td>".$unEtudiant['idetudiant']."</td>";
        echo "<td>".$unEtudiant['nom']."</td>";
        echo "<td>".$unEtudiant['prenom']."</td>";
        echo "<td>".$unEtudiant['email']."</td>";
        echo "<td>".$unEtudiant['dateNais']."</td>";
        echo "<td>".$unEtudiant['statut']."</td>";
        echo "<td>".$unEtudiant['idclasse']."</td>";

        if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
        echo "<td> <a href='index.php?page=3&action=sup&idetudiant=".$unEtudiant['idetudiant']."'>";
        echo "<img src='image/supprimer.png' height='30' witdh'30'> </a>";
        echo "<a href='index.php?page=3&action=sup&idetudiant=".$unEtudiant['idetudiant']."'>";
        echo "<img src='image/editer.png' height='30' witdh'30'> </a>";
        }
        echo "</td>";
        echo "</tr>";
    }
}
?>
</table>