drop database if exists scolarite_iris_2024_1; 
create database scolarite_iris_2024_1; 
use scolarite_iris_2024_1; 

create table classe (
	idclasse int(3) not null auto_increment, 
	nom varchar(100), 
	salle varchar(100), 
	diplome varchar(100), 
	primary key (idclasse)
);

create table etudiant (
	idetudiant int(3) not null auto_increment, 
	nom varchar(100), 
	prenom varchar(100), 
	email varchar(100), 
	dateNais date , 
	statut enum ("alternant", "initial"),
	idclasse int(3) not null,
	primary key (idetudiant), 
	foreign key (idclasse) references classe(idclasse)
);

create table professeur (
	idprofesseur int(3) not null auto_increment, 
	nom varchar(100), 
	prenom varchar(100), 
	email varchar(100),
	diplome varchar(100), 
	primary key(idprofesseur)
);
create table enseignement (
	idenseignement int(3) not null auto_increment, 
	matiere varchar(100), 
	nbheures int(5), 
	coeff int(2), 
	idclasse int(3) not null, 
	idprofesseur int(3) not null, 
	primary key (idenseignement), 
	foreign key (idclasse) references classe(idclasse), 
	foreign key (idprofesseur) references professeur(idprofesseur)
); 

create table user (
	iduser int(3) not null auto_increment, 
	nom varchar(50), 
	prenom varchar(50), 
	email varchar(50), 
	mdp  varchar (255), 
	role enum("admin", "user"), 
	primary key (iduser)
);
insert into user values 
(null, "Olivier", "Paul", "a@gmail.com", "123", "admin"), 
(null, "Marie", "Lucie", "b@gmail.com", "456", "user"); 

create view inscription as (
	select e.nom, e.prenom, c.nom as classe, c.diplome,
	ens.matiere
	from etudiant e, classe c, enseignement ens 
	where e.idclasse = c.idclasse
	and c.idclasse =ens.idclasse
);



delimiter $
create procedure deleteClasse (in p_idclasse int)
begin
 
    delete from enseignement where idclasse = p_idclasse ;
    
    delete from etudiant where idclasse = p_idclasse ;

    delete from classe where idclasse = p_idclasse;
end  $
delimiter  ;

drop procedure insereClasse
delimiter $
create procedure insereClasse (in p_nom varchar (50),
in p_salle varchar (50), in p_diplome varchar(50))
begin
declare nb int ;
if p_salle = "" or p_salle is null then
    set p_salle = "Salle 3.10";
    end if;
if p_diplome = "" or p_diplome is null then
    set p_diplome = "BTS SIO";
    end if;

select count(*) into nb from classe where
nom = p_nom ;
if nb = 0 then
    insert into classe
    values ('null', p_nom, p_salle, p_diplome);
end if ;
end  $
delimiter  ;

