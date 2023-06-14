DROP TABLE IF EXISTS candidat;
CREATE TABLE candidat (
    idcandidat_candidat INT AUTO_INCREMENT NOT NULL,
    nom_candidat VARCHAR(50),
    prenom_candidat VARCHAR(50),
    genre_candidat TINYINT,
    photo_candidat VARCHAR(255),
    cv_candidat VARCHAR(255),
    lettredemotivation_candidat VARCHAR(255),
    releve_candidat VARCHAR(255),
    diplome_candidat VARCHAR(255),
    justificatifpro_candidat VARCHAR(255),
    dossiervalidation_candidat VARCHAR(255),
    Age_candidat INT,
    formulaire_idformulaire_formulaire INT,
    PRIMARY KEY (idcandidat_candidat)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS responsables;
CREATE TABLE responsables (
    idres_responsables INT AUTO_INCREMENT NOT NULL,
    nomres_responsables VARCHAR(50),
    prenomres_responsables VARCHAR(50),
    adressemail_responsables VARCHAR(255),
    PRIMARY KEY (idres_responsables)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS formation;
CREATE TABLE formation (
    idformation_formation INT AUTO_INCREMENT NOT NULL,
    intitule_formation VARCHAR(255),
    annee_formation INT,
    nbplaces_formation INT,
    PRIMARY KEY (idformation_formation)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS formulaire;
CREATE TABLE formulaire (
    idformulaire_formulaire INT AUTO_INCREMENT NOT NULL,
    datenaissance_formulaire DATE,
    email_formulaire VARCHAR(255),
    seriebac_formulaire VARCHAR(255),
    anneebac_formulaire YEAR,
    intituleannee1_formulaire VARCHAR(255),
    intituleannee2_formulaire VARCHAR(255),
    autreformation_formulaire TINYINT(1),
    stage_formulaire TINYINT(1),
    contrat_formulaire TINYINT(1),
    AdressePrincipal_formulaire VARCHAR(100),
    candidat_idcandidat_candidat INT,
    idformation_formation INT,
    PRIMARY KEY (idformulaire_formulaire),
    FOREIGN KEY (candidat_idcandidat_candidat) REFERENCES candidat (idcandidat_candidat),
    FOREIGN KEY (idformation_formation) REFERENCES formation (idformation_formation)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS accede;
CREATE TABLE accede (
    idformulaire_formulaire INT NOT NULL,
    idres_responsables INT NOT NULL,
    PRIMARY KEY (idformulaire_formulaire, idres_responsables),
    FOREIGN KEY (idformulaire_formulaire) REFERENCES formulaire (idformulaire_formulaire),
    FOREIGN KEY (idres_responsables) REFERENCES responsables (idres_responsables)
) ENGINE=InnoDB;

ALTER TABLE candidat ADD CONSTRAINT FK_candidat_formulaire_idformulaire_formulaire FOREIGN KEY (formulaire_idformulaire_formulaire) REFERENCES formulaire (idformulaire_formulaire);

