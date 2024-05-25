<?php
    class Modele {
        private $unPDO ;
        public function __construct (){
            try{
                $this->unPDO = new PDO ("mysql:host=localhost;dbname=scolarite_iris_2024_1","root","");
            }
            catch (PDOException $exp)
            {
                    echo "Erreur connexion :".$exp->getMessage ();
            
        }
    }
/********************* Gestion des classes ********************/

        public function selectAllClasses (){
            $requete ="select * from classe ; " ;
            $select = $this->unPDO->prepare ($requete);
            $select->execute ();
            return $select->fetchAll(); 
        }

        public function searchAllClasses ($filtre){
            $requete ="select * from classe
            where nom like :filtre or salle like :filtre or diplome like :filtre ; " ;
            $donnees=array(":filtre"=> "%".$filtre."%");
            $select = $this->unPDO->prepare ($requete);
            $select->execute ($donnees);
            return $select->fetchAll(); 
        }

        public function insertClasse ($tab){
            $requete ="insert into classe values (null, :nom, :salle, :diplome);" ;
            $donnees =array (   ":nom"=>$tab['nom'],
                                ":salle"=>$tab['salle'],
                                ":diplome"=>$tab['diplome']);
            $select = $this->unPDO->prepare ($requete);
            $select->execute ($donnees);
            }
              
                // la modification 
            public function deleteClasse ($idclasse){
                $requete ="delete from classe where idclasse = :idclasse;" ;
                $donnees =array (":idclasse"=>$idclasse);
                $select = $this->unPDO->prepare ($requete);
                $select->execute ($donnees);
                }

            public function selectWhereClasse ($idclasse){
                $requete ="select * from classe where idclasse=:idclasse;";
                $donnees =array (":idclasse"=>$idclasse);
                $select = $this->unPDO->prepare ($requete);
                $select->execute ($donnees);
                $uneClasse = $select->fetch();
                return $uneClasse;
            }
            public function updateClasse ($tab){
                $requete="update classe set nom =:nom, salle=:salle, diplome=:diplome where idclasse=:idclasse;";
                $donnees=array(
                    ":nom"=>$tab['nom'],
                    ":salle"=>$tab['salle'],
                    ":diplome"=>$tab['diplome'],
                    ":idclasse"=>$tab['idclasse'],
                );
                $select = $this->unPDO->prepare ($requete);
                $select->execute ($donnees);
            }
            public function countClasses(){
                $requete ="select count(*) as nb from classe;";
                $select = $this->unPDO->prepare ($requete);
                $select->execute();
                return $select->fetch();
            }

/********************* Gestion des professeur     ********************/
            public function selectAllProfesseurs (){
                $requete ="select * from professeur ; " ;
                $select = $this->unPDO->prepare ($requete);
                $select->execute ();
                return $select->fetchAll();
            }
            
            public function searchWhereProfesseur ($idfiltre){
                    $requete ="select * from professeur where nom like :filtre or prenom like :filtre or email like:filtre or diplome like:filtre;";
                    $donnees =array (":idfiltre"=>$idfiltre);
                    $select = $this->unPDO->prepare ($requete);
                    $select->execute ($donnees);
                    return $unProfesseur;
                }

            public function insertProfesseur ($tab){
                $requete ="insert into professeur values (null, :nom, :prenom, :email, :diplome);" ;
                $donnees =array (   ":nom"=>$tab['nom'],
                                    ":prenom"=>$tab['prenom'],
                                    ":email"=>$tab['email'],
                                    ":diplome"=>$tab['diplome']);
                $select = $this->unPDO->prepare ($requete);
                $select->execute ($donnees);
                }

                public function deleteProfesseur ($idprofesseur){
                    $requete ="delete from professeur where idprofesseur = :idprofesseur;" ;
                    $donnees =array (":idprofesseur"=>$idprofesseur);
                    $select = $this->unPDO->prepare ($requete);
                    $select->execute ($donnees);
                    }
    
                public function selectWhereProfesseur ($idprofesseur){
                    $requete ="select * from professeur where idprofesseur=:idprofesseur;";
                    $donnees =array (":idprofesseur"=>$idprofesseur);
                    $select = $this->unPDO->prepare ($requete);
                    $select->execute ($donnees);
                    $unProfesseur = $select->fetch();
                    return $unProfesseur;
                }
                public function updateProfesseur ($tab){
                    $requete="update professeur set nom =:nom, prenom=:prenom, email=:email, diplome=:diplome where idprofesseur=:idprofesseur;";
                    $donnees=array(
                        ":nom"=>$tab['nom'],
                        ":prenom"=>$tab['prenom'],
                        ":email"=>$tab['email'],
                        ":diplome"=>$tab['diplome'],
                        ":idprofesseur"=>$tab['idprofesseur'],
                    );
                    $select = $this->unPDO->prepare ($requete);
                    $select->execute ($donnees);
                }

                public function countProfesseurs(){
                    $requete ="select count(*) as nb from professeur;";
                    $select = $this->unPDO->prepare ($requete);
                    $select->execute();
                    return $select->fetch();
                }

                
/********************* Gestion des etudiants     ********************/
            public function selectAllEtudiants (){
                $requete ="select * from etudiant ; " ;
                $select = $this->unPDO->prepare ($requete);
                $select->execute ();
                return $select->fetchAll();
            }
            public function insertEtudiant ($tab){
                $requete ="insert into etudiant values (null, :nom, :prenom, :email, :dateNais, :statut, :idclasse);" ;
                $donnees =array (   ":nom"=>$tab['nom'],
                                    ":prenom"=>$tab['prenom'],
                                    ":email"=>$tab['email'],
                                    ":dateNais"=>$tab['dateNais'],
                                    ":statut"=>$tab['statut'],
                                    ":idclasse"=>$tab['idclasse']);
                $select = $this->unPDO->prepare ($requete);
                $select->execute ($donnees);
                }

                public function deleteEtudiant ($idetudiant){
                    $requete ="delete from etudiant where idetudiant = :idetudiant;";
                    $donnees =array (":idetudiant"=>$idetudiant);
                    $select = $this->unPDO->prepare ($requete);
                    $select->execute ($donnees);
                    }

                    public function countEtudiants(){
                        $requete ="select count(*) as nb from etudiant;";
                        $select = $this->unPDO->prepare ($requete);
                        $select->execute();
                        return $select->fetch();
                    }
/********************* Gestion des enseignement     ********************/
            public function selectAllEnseignements (){
                $requete ="select * from enseignement ; " ;
                $select = $this->unPDO->prepare ($requete);
                $select->execute ();
                return $select->fetchAll();
            }
            public function insertEnseignement ($tab){
                $requete ="insert into enseignement values (null, :matiere, :nbheures, :coeff, :idclasse, :idprofesseur);" ;
                $donnees =array (   ":matiere"=>$tab['matiere'],
                                    ":nbheures"=>$tab['nbheures'],
                                    ":coeff"=>$tab['coeff'],
                                    ":idclasse"=>$tab['idclasse'],
                                    ":idprofesseur"=>$tab['idprofesseur']);
                $select = $this->unPDO->prepare ($requete);
                $select->execute ($donnees);
                }

                public function countEnseignements(){
                    $requete ="select count(*) as nb from enseignement;";
                    $select = $this->unPDO->prepare ($requete);
                    $select->execute();
                    return $select->fetch();
                }
            public function verifConnexion ($email, $mdp)
        {
            $requete ="select * from user where email=:email and mdp =:mdp;";
            $select = $this->unPDO->prepare($requete);
            $select->bindValue (":email", $email, PDO:: PARAM_STR);
            $select->bindValue (":mdp", $mdp, PDO:: PARAM_STR);
            $select->execute ();
            $unUser = $select->fetch();
            return $unUser;
        }
        public function selectAllInscriptions (){
            $requete="select * from inscription ;";
            $select = $this->unPDO->prepare ($requete);
            $select->execute ();
            return $select->fetchAll();
        }
        /*Appel de procedure */
    public function appelProcedure($nomP, $tab){
        $chaine = "'".implode ("','",$tab)."'";
        $requete ="call ".$nomP."(".$chaine.");";
        $select = $this->unPDO->prepare ($requete); 
        $select->execute ();
    }
        }
?>