
CREATE DATABASE UrgenceInfo;
USE UrgenceInfo;

CREATE TABLE individu(
num_id_indiv INT NOT NULL AUTO_INCREMENT, 
login VARCHAR(16)NOT NULL UNIQUE,
nom VARCHAR(16) NOT NULL, 
prenom VARCHAR(16) NOT NULL, 
date_naissance DATE NOT NULL, 
adresse VARCHAR(40) NOT NULL, 
telephone VARCHAR(10) NOT NULL, 
email VARCHAR(40) NOT NULL,
mdp VARCHAR(16) NOT NULL,
PRIMARY KEY (num_id_indiv)
);

CREATE TABLE membre_personnel(
num_id_memb_perso INT NOT NULL,
poste ENUM('technicien','ingenieur','cadre','RH','commercial'),
competence_mat SET('ordiFixe','ordiPort','imprim','routeur','ecran','serveur','peripherique'),
isAdmin ENUM('oui','non'),
PRIMARY KEY (num_id_memb_perso),
CONSTRAINT fk_memb_perso FOREIGN KEY (num_id_memb_perso) REFERENCES individu(num_id_indiv)
);

CREATE TABLE client(
num_id_cli INT NOT NULL,
date_prem_contrat DATE,
isPrevenuParMail ENUM('oui','non'),
PRIMARY KEY (num_id_cli),
CONSTRAINT fk_cli FOREIGN KEY (num_id_cli) REFERENCES individu(num_id_indiv)
);

CREATE TABLE incident(
num_id_incid INT NOT NULL AUTO_INCREMENT, 
type_incid ENUM('defaillance_meca','defaillance_log','defaillance_electro') NOT NULL,
date_heure_incid DATETIME,
descrip_incid VARCHAR(240),
etat_incid ENUM('clos','en_cours','non_traite'),
PRIMARY KEY (num_id_incid)
);

CREATE TABLE materiel(
num_id_mat INT NOT NULL AUTO_INCREMENT,
type_mat ENUM('ordiFixe','ordiPort','imprim','routeur','ecran','serveur','peripherique'),
nom_mat VARCHAR(16),
modele_mat VARCHAR(16),
commentaire_mat VARCHAR(240),
PRIMARY KEY (num_id_mat)
);

CREATE TABLE incident_survenu_sur_materiel(
num_id_mat INT NOT NULL,
num_id_incid INT NOT NULL,
PRIMARY KEY (num_id_incid, num_id_mat),
FOREIGN KEY (num_id_incid) REFERENCES incident(num_id_incid),
FOREIGN KEY (num_id_mat) REFERENCES materiel(num_id_mat)
);

CREATE TABLE contrat(
num_id_cont INT NOT NULL AUTO_INCREMENT,
date_debut_cont DATE NOT NULL,
date_fin_cont DATE,
etat_contrat ENUM('actif','terminé','suspendu'),
motif_terminaison_cont VARCHAR (240),
montant_cont FLOAT NOT NULL,
PRIMARY KEY (num_id_cont)
);

CREATE TABLE contrat_couvre_materiel(
num_id_cont INT NOT NULL,
num_id_mat INT NOT NULL,
PRIMARY KEY (num_id_cont, num_id_mat),
FOREIGN KEY (num_id_mat) REFERENCES materiel(num_id_mat),
FOREIGN KEY (num_id_cont) REFERENCES contrat(num_id_cont)
);

CREATE TABLE client_signe_contrat(
num_id_cont INT NOT NULL,
num_id_cli INT NOT NULL,
PRIMARY KEY (num_id_cont, num_id_cli),
FOREIGN KEY (num_id_cont) REFERENCES contrat(num_id_cont),
FOREIGN KEY (num_id_cli) REFERENCES client(num_id_cli)
);

CREATE TABLE intervention(
num_id_incid INT NOT NULL,
num_id_memb_perso INT NOT NULL,
num_id_mat INT NOT NULL,
commentaire_interv VARCHAR(240),
duree_interv TIME,
difficulte_interv ENUM('dur','facile','intermediaire'),
PRIMARY KEY (num_id_incid,num_id_memb_perso,num_id_mat),
FOREIGN KEY (num_id_incid) REFERENCES incident(num_id_incid),
FOREIGN KEY (num_id_memb_perso) REFERENCES membre_personnel(num_id_memb_perso),
FOREIGN KEY (num_id_mat) REFERENCES materiel(num_id_mat)
);

CREATE TABLE codes_membres(
code_membre INT NOT NULL,
droits ENUM('membre','admin') NOT NULL,
PRIMARY KEY (code_membre)
);

--------------------------------------------------------------------------------------------------------------------------------------------

INSERT INTO individu VALUES('','SamuraiDuSoleil','MORANE','Bob','1983-10-10','12 rue des camélias','0643682238','Bob.MORANE@gmail.com','indochine');

INSERT INTO membre_personnel VALUES('1','technicien','ordiFixe,imprim','oui');

INSERT INTO client VALUES('1',null,'oui');

INSERT INTO incident VALUES('','defaillance_meca','2013-04-22 22:00:42','La carte mère est brûlée','clos');
INSERT INTO incident VALUES('','defaillance_meca','2013-04-22 22:00:42','La carte mère est brûlée','non_traite');

INSERT INTO materiel VALUES('','ordiFixe','TOSHIBA','X200','Obsolète');
INSERT INTO materiel VALUES('','ordiFixe','TOSHIBA','X300','Obsolète');

INSERT INTO incident_survenu_sur_materiel VALUES('1','1');
INSERT INTO incident_survenu_sur_materiel VALUES('2','2');

INSERT INTO contrat VALUES('','2013-04-21',null,'actif',null,'15000.57');

INSERT INTO contrat_couvre_materiel VALUES('1','1');

INSERT INTO client_signe_contrat VALUES('1','1');

INSERT INTO intervention VALUES('1','1','1','Surchauffe interne -> Changement carte mère + ventilo','00:20:40','intermediaire');

INSERT INTO codes_membres VALUES('1','membre');
---------------------------------------------------------------------------------------------------------------------------------------------

SELECT s.num_id_mat, type_mat, nom_mat, modele_mat, commentaire_mat, s.num_id_incid, type_incid, date_heure_incid, descrip_incid, etat_incid
FROM materiel m, incident c, incident_survenu_sur_materiel s 
WHERE s.num_id_incid NOT IN(SELECT i.num_id_incid FROM intervention i) 
AND s.num_id_mat=m.num_id_mat
AND s.num_id_incid=c.num_id_incid;