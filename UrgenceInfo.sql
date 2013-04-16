
CREATE DATABASE UrgenceInfo;

CREATE TABLE individu(
num_id_indiv INT NOT NULL AUTO_INCREMENT, 
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
poste ENUM(technicien,ingenieur,cadre,RH,commercial),
competence_mat SET(ordiFixe,ordiPort,imprim,routeur,ecran,serveur,peripherique),
isAdmin ENUM(oui,non),
PRIMARY KEY (num_id_memb_perso),
FOREIGN KEY (num_id_memb_perso) REFERENCES individu(num_id_indiv)
);

CREATE TABLE client(
num_id_cli INT NOT NULL AUTO_INCREMENT,
date_prem_contrat DATE NOT NULL,
isPrevenuParMail ENUM(oui,non)
PRIMARY KEY (num_id_cli),
FOREIGN KEY (num_id_cli) REFERENCES individu(num_id_indiv)
);

CREATE TABLE incident(
num_id_incid INT NOT NULL AUTO_INCREMENT, 
type_incid NOT NULL ENUM(defaillance_meca, defaillance_log, defaillance_electro);
date_heure_incid DATETIME,
descrip_incid VARCHAR(240),
PRIMARY KEY (num_id_incid)
);

CREATE TABLE materiel(
num_id_mat INT NOT NULL AUTO_INCREMENT,
type_mat SET(ordiFixe,ordiPort,imprim,routeur,ecran,serveur,peripherique),
nom_mat VARCHAR(16),
modele_mat VARCHAR(16),
commentaire_mat VARCHAR(240),
PRIMARY KEY (num_id_mat)
);

CREATE TABLE historique_materiel(
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
motif_terminaison_cont VARCHAR (240),
montant_cont FLOAT NOT NULL,
PRIMARY KEY (num_id_cont)
);

CREATE TABLE materiel_couvert_contrat(
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
difficulte_interv ENUM(dur,facile,intermediaire),
PRIMARY KEY (num_id_incid,num_id_memb_perso,num_id_mat),
FOREIGN KEY (num_id_incid) REFERENCES incident(num_id_incid),
FOREIGN KEY (num_id_memb_perso) REFERENCES membre_personnel(num_id_memb_perso)
FOREIGN KEY (num_id_mat) REFERENCES materiel(num_id_mat)
);