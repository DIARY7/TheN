CREATE TABLE the_the(
   id_the INT AUTO_INCREMENT,
   nom VARCHAR(100)  NOT NULL,
   occupation DECIMAL(15,2) NOT NULL,
   rendement DECIMAL(15,2) NOT NULL,
   prix_vente DECIMAL(15,2) NOT NULL,
   PRIMARY KEY(id_the),
   UNIQUE(nom)
);

CREATE TABLE the_regeneration(
    id_mois int not null,
    id_the int not null,
    FOREIGN KEY (id_the) REFERENCES the_the(id_the)
);

CREATE TABLE the_admin(
   id_admin INT AUTO_INCREMENT,
   nom VARCHAR(110)  NOT NULL,
   login VARCHAR(100)  NOT NULL,
   password VARCHAR(100)  NOT NULL,
   PRIMARY KEY(id_admin)
);

CREATE TABLE the_parcelle(
   id_parcelle INT AUTO_INCREMENT,
   numero INT NOT NULL,
   surface DECIMAL(15,2) NOT NULL,
   id_the INT NOT NULL,
   PRIMARY KEY(id_parcelle),
   UNIQUE(numero),
   FOREIGN KEY (id_the) REFERENCES the_the(id_the)
);

CREATE TABLE the_categorie(
   id_categorie INT AUTO_INCREMENT,
   nom VARCHAR(100)  NOT NULL,
   PRIMARY KEY(id_categorie)
);

CREATE TABLE the_cueilleurs(
   id_cueilleur INT AUTO_INCREMENT,
   nom VARCHAR(100)  NOT NULL,
   genre VARCHAR(20)  NOT NULL,
   date_naissance DATE NOT NULL,
   PRIMARY KEY(id_cueilleur)
);

CREATE TABLE the_cueillettes(
   id_cueillette INT AUTO_INCREMENT,
   id_cueilleur INT NOT NULL,
   id_parcelle INT NOT NULL,
   poids DECIMAL(15,2)   NOT NULL,
   date_cueillette DATE NOT NULL,
   PRIMARY KEY(id_cueillette),
   FOREIGN KEY (id_cueilleur) REFERENCES the_cueilleurs(id_cueilleur),
   FOREIGN KEY (id_parcelle) REFERENCES the_parcelle(id_parcelle)
);

CREATE TABLE the_depense(
   id_depense INT AUTO_INCREMENT,
   id_categorie INT NOT NULL,
   date_depense DATE NOT NULL,
   montant DECIMAL(18,2) NOT NULL,
   PRIMARY KEY(id_depense),
   FOREIGN KEY (id_categorie) REFERENCES the_categorie(id_categorie)
);

CREATE TABLE the_utilisateur(
    id_utilisateur int AUTO_INCREMENT,
    login VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_utilisateur)
);

insert into the_the(nom,occupation,rendement,prix_vente) values('Romarin',50,5,4500);
insert into the_the(nom,occupation,rendement,prix_vente) values('Vert',60,6,2500);
insert into the_the(nom,occupation,rendement,prix_vente) values('Noir',45,3,3500);

insert into the_parcelle(numero,surface,id_the) values(1,70,1);
insert into the_parcelle(numero,surface,id_the) values(2,80,2);
insert into the_parcelle(numero,surface,id_the) values(3,75,3);
insert into the_parcelle(numero,surface,id_the) values(4,100,2);
insert into the_parcelle(numero,surface,id_the) values(4,70,1);

insert into the_admin(nom,login,password) values('Ryan','Ryan','1234');

insert into the_cueilleurs(nom,genre,date_naissance) values('Ryan','masculin','2004-12-12');

insert into the_categorie(nom) values('Carburant');

insert into the_depense(id_categorie,date_depense,montant) values(1,'2023-10-12',4000);

insert into the_utilisateur(login,password,nom) values('Rebeca','1234','Rebeca');

insert into the_regeneration(id_mois,id_the) values(2,2);
insert into the_regeneration(id_mois,id_the) values(4,2);
insert into the_regeneration(id_mois,id_the) values(7,2);

select *,sum(poids)-rendement from the_cueillettes natural join the where extract(month from date_cueillete)=10 and extract(year from date_cueillete)=2013 group by id_parcelle;
