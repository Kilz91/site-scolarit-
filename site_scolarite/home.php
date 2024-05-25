<h2> Ecole IRIS Paris</h2>
<h4>
    Vous êtes connectés en tant que : 
    <?= $_SESSION['nom']. " ".$_SESSION['prenom'] ?>
    <br/>
    Vous avez le rôle : <?= $_SESSION['role'] ?>
</h4>


<img src="image/siteecoleiris.png" height="400" width="800">
<br>
<br>
<a href="https://ecoleiris.fr"> Suivez nous ici </a>
<br>
<br>
<?php
    $nbClasses = $unControleur->countClasses () ['nb'];
    $nbProfesseurs = $unControleur->countProfesseurs () ['nb'];
    $nbEtudiants = $unControleur->countEtudiants () ['nb'];
    $nbEnseignements = $unControleur->countEnseignements () ['nb'];
?>
<table border="1">
    <tr>
        <td> Nombre de classes </td>
        <td> <?= $nbClasses ?> </td>
    </tr>

    <tr>
        <td> Nombre de Professeurs </td>
        <td> <?= $nbProfesseurs ?> </td>
    </tr>

    <tr>
        <td> Nombre de d'Etudiants </td>
        <td> <?= $nbEtudiants ?> </td>
    </tr>

    <tr>
        <td> Nombre des enseignements </td>
        <td> <?= $nbEnseignements ?> </td>
    </tr>

</table>

<br>
<table class="table">
  <thead class="thead-dark">
    <tr>    
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Classe</th>
      <th scope="col">Diplôme</th>
      <th scope="col">Matière</th>
    </tr>
    </thead>    

<?php

    $lesInscriptions = $unControleur-> selectAllInscriptions();
    foreach ($lesInscriptions as $uneInscription) {
        echo"<tr>";
        echo"<td>".$uneInscription['nom']."</td>";
        echo"<td>".$uneInscription['prenom']."</td>";
        echo"<td>".$uneInscription['classe']."</td>";
        echo"<td>".$uneInscription['diplome']."</td>";
        echo"<td>".$uneInscription['matiere']."</td>";
        echo "</td>";
    }
?>
</table>
