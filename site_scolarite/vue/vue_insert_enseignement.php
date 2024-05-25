<form method="post">
    <table>
        <tr>
            <td> Nom de la matière </td>
            <td> <input type="text" name="matiere"></td>
        </tr>
       
        <tr>
            <td> Nombre d'heures </td>
            <td> <input type="text" name="nbheures"></td>
        </tr>
       
        <tr>
            <td> Coefficient de la matière </td>
            <td> <input type="text" name="coeff"></td>
        </tr>
        
        <tr>
            <td> La classe de l'étudiant </td>
            <td> <select name="idclasse">
            <?php
                foreach($lesClasses as $uneClasse){
                    echo "<option value='".$uneClasse['idclasse']."'>";
                    echo $uneClasse['nom'];
                    echo "</option>";
                }
                ?>
        </tr>
                </select>
            </td>

        <tr>
            <td> Le professeur </td>
            <td> <select name="idprofesseur">
            <?php 
                foreach($lesProfesseurs as $unProfesseur){
                    echo "<option value='".$unProfesseur['idprofesseur']."'>";
                    echo $unProfesseur['nom']." ".$unProfesseur['prenom'];
                    echo "</option>";
                }
                ?>
                </select>
            </td>
            
        </tr> 
            
       
        <tr>
            <td> <input type="reset" name="Annuler" value="Annuler"></td>
            <td> <input type="submit" name="Valider" value="Valider"></td>
        </tr>
</table>

</form>