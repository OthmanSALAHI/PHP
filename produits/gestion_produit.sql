create database gestionproduit_v2;
use gestionproduit_v2;
create table Categorie(
idCategorie int primary key auto_increment,
denom varchar(50),
descr varchar(50)
);

create table produit(
reference int primary key auto_increment,
libelle varchar(50),
prixu double,
dateachat date,
photoproduit blob,
idCategorie int,
foreign key(idCategorie) references Categorie(idCategorie)
);

create table CompteProprietaire(
LoginProp varchar(50),
motdepasse varchar(50),
nom varchar(50),
prenom varchar(50)
);
select * from CompteProprietaire;
insert into CompteProprietaire values
('sadmad24','2003','Othman','SALAHI'),
('manager','1111','Mohamed','Aadil'),
('admin','1234','Anas','Aadil');
select * from Categorie;
insert into Categorie values
('','Pc Portable','PC-GAMER'),
('','Pc Bureau','PC-Travail');
drop table produit;
insert into produit values
('','PC BUREAU DELL 7101','1999','2022-06-21','IMG','2'),
('','LENOVO LEGION 5','3999','2023-07-21','IMG','1');
select * from produit;
delete from Categorie where idCategorie=3;
