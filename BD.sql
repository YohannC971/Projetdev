-- Suppression des tables existantes
DROP TABLE IF EXISTS `Utilisateur`;
DROP TABLE IF EXISTS `S'inscrit`;
DROP TABLE IF EXISTS `Accede`;
DROP TABLE IF EXISTS `Formulaire`;
DROP TABLE IF EXISTS `Candidat`;
DROP TABLE IF EXISTS `Responsables`;
DROP TABLE IF EXISTS `Formation`;



-- Création de la table `Utilisateur`
CREATE TABLE `Utilisateur` (
  `id_utilisateur` BIGINT AUTO_INCREMENT NOT NULL,
  `login_utilisateur` VARCHAR(255),
  `passe_utilisateur` VARCHAR(255),
  `role_utilisateur` VARCHAR(255),
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB;

-- Création de la table `Candidat`
CREATE TABLE `Candidat` (
  `idcandidat_candidat` INT AUTO_INCREMENT NOT NULL,
  `id_utilisateur` BIGINT,
  `nom_candidat` VARCHAR(50),
  `prenom_candidat` VARCHAR(50),
  `genre_candidat` TINYINT,
  `photo_candidat` VARCHAR(255),
  `cv_candidat` VARCHAR(255),
  `lettredemotivation_candidat` VARCHAR(255),
  `releve_candidat` VARCHAR(255),
  `diplome_candidat` VARCHAR(255),
  `justificatifpro_candidat` VARCHAR(255),
  `dossiervalidation_candidat` VARCHAR(255),
  `Age_candidat` INT,
  `formulaire_idformulaire_formulaire` INT,
  `nom_parent1` VARCHAR(255),
  `prennom_parent1` VARCHAR(255),
  `numero_parent1` INT,
  `nom_parent2` VARCHAR(255),
  `prennom_parent2` VARCHAR(255),
  `numero_parent2` INT,
  `nom_responsable_legale` VARCHAR(255),
  `prenom_responsable_legale` VARCHAR(255),
  `numero_responsable_legale` INT,
  PRIMARY KEY (`idcandidat_candidat`),
  FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB;

-- Création de la table `Responsables`
CREATE TABLE `Responsables` (
  `idres_responsables` INT AUTO_INCREMENT NOT NULL,
  `id_utilisateur` BIGINT,
  `nomres_responsables` VARCHAR(50),
  `prenomres_responsables` VARCHAR(50),
  `adressemail_responsables` VARCHAR(255),
   PRIMARY KEY (`idres_responsables`),
  FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB;

-- Création de la table `Formation`
CREATE TABLE `Formation` (
  `idformation_formation` INT AUTO_INCREMENT NOT NULL,
  `intitule_formation` VARCHAR(255),
  `annee_formation` INT,
  `nbplaces_formation` INT,
  PRIMARY KEY (`idformation_formation`)
) ENGINE=InnoDB;

-- Création de la table `Formulaire`
CREATE TABLE `Formulaire` (
  `idformulaire_formulaire` INT AUTO_INCREMENT NOT NULL,
  `datenaissance_formulaire` DATE,
  `email_formulaire` VARCHAR(255),
  `seriebac_formulaire` VARCHAR(255),
  `anneebac_formulaire` YEAR,
  `intituleannee1_formulaire` VARCHAR(255),
  `intituleannee2_formulaire` VARCHAR(255),
  `autreformation_formulaire` BOOL,
  `stage_formulaire` BOOL,
  `contrat_formulaire` BOOL,
  `AdressePrincipal_formulaire` VARCHAR(100),
  `candidat_idcandidat_candidat` INT,
  `idformation_formation` INT,
  PRIMARY KEY (`idformulaire_formulaire`),
  FOREIGN KEY (`candidat_idcandidat_candidat`) REFERENCES `Candidat` (`idcandidat_candidat`),
  FOREIGN KEY (`idformation_formation`) REFERENCES `Formation` (`idformation_formation`)
) ENGINE=InnoDB;


-- Création de la table `Accede`
CREATE TABLE `Accede` (
  `idformulaire_formulaire` INT AUTO_INCREMENT NOT NULL,
  `idres_responsables` INT NOT NULL,
  PRIMARY KEY (`idformulaire_formulaire`, `idres_responsables`),
  FOREIGN KEY (`idformulaire_formulaire`) REFERENCES `Formulaire` (`idformulaire_formulaire`),
  FOREIGN KEY (`idres_responsables`) REFERENCES `Responsables` (`idres_responsables`)
) ENGINE=InnoDB;

-- Création de la table `S'inscrit`
CREATE TABLE `S'inscrit` (
  `idcandidat_candidat` INT AUTO_INCREMENT NOT NULL,
  `id_utilisateur` BIGINT NOT NULL,
  `idres_responsables` INT NOT NULL,
  PRIMARY KEY (`idcandidat_candidat`, `id_utilisateur`, `idres_responsables`),
  FOREIGN KEY (`idcandidat_candidat`) REFERENCES `Candidat` (`idcandidat_candidat`),
  FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`),
  FOREIGN KEY (`idres_responsables`) REFERENCES `Responsables` (`idres_responsables`)
) ENGINE=InnoDB;

-- Ajout des contraintes de clé étrangère manquantes
ALTER TABLE `Candidat` ADD CONSTRAINT `FK_candidat_formulaire_idformulaire_formulaire` FOREIGN KEY (`formulaire_idformulaire_formulaire`) REFERENCES `Formulaire` (`idformulaire_formulaire`);
ALTER TABLE `Responsables` ADD CONSTRAINT `FK_responsables_utilisateur_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`);
ALTER TABLE `S'inscrit` ADD CONSTRAINT `FK_S'inscrit_id_utilisateur_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`);
