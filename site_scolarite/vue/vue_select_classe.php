<h3> Liste des classes</h3>
<form method="post">
    Filter par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td> Id classe </td>
        <td> Nom classe </td>
        <td> Salle de cours </td>
        <td> Diplôme préparé </td>
<?php
        if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
        echo "Opérations </td>";
        }
?>
    </tr>
<?php
if (isset($lesClasses)){
    foreach ($lesClasses as $uneClasse){
        echo"<tr>";
        echo "<td>".$uneClasse['idclasse']."</td>";
        echo "<td>".$uneClasse['nom']."</td>";
        echo "<td>".$uneClasse['salle']."</td>";
        echo "<td>".$uneClasse['diplome']."</td>";

        if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
        echo "<td> <a href='index.php?page=2&action=sup&idclasse=".$uneClasse['idclasse']."'>";
        echo "<img src='image/supprimer.png' height='30' witdh'30'> </a>";
        echo "<a href='index.php?page=2&action=edit&idclasse=".$uneClasse['idclasse']."'>";
        echo "<img src='image/editer.png' height='30' witdh'30'> </a>";
        echo "</td>";
        }
        echo "</tr>";
    }
}
?>
</table>
