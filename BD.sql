-- Désactiver les contraintes de clé étrangère
SET FOREIGN_KEY_CHECKS = 0;

-- Suppression de la table `Sinscrit` si elle existe
DROP TABLE IF EXISTS `Sinscrit`;
DROP TABLE IF EXISTS `Accede`;
DROP TABLE IF EXISTS `Formulaire`;
DROP TABLE IF EXISTS `Candidat`;
DROP TABLE IF EXISTS `Responsables`;
DROP TABLE IF EXISTS `Formation`;
DROP TABLE IF EXISTS `Utilisateur`;

-- Réactiver les contraintes de clé étrangère
SET FOREIGN_KEY_CHECKS = 1;

-- Création de la table `Utilisateur`
CREATE TABLE `Utilisateur` (
  `id_utilisateur` BIGINT AUTO_INCREMENT NOT NULL,
  `login_utilisateur` VARCHAR(255),
  `passe_utilisateur` VARCHAR(255),
  `role_utilisateur` VARCHAR(255),
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB;

-- Création de la table `Formation`
CREATE TABLE `Formation` (
  `idformation_formation` INT AUTO_INCREMENT NOT NULL,
  `intitule_formation` VARCHAR(255) UNIQUE,
  `annee_formation` INT,
  `nbplaces_formation` INT,
  PRIMARY KEY (`idformation_formation`)
) ENGINE=InnoDB;

-- Insertion de données dans la table `Formation`
INSERT INTO `Formation` (`intitule_formation`)
VALUES ('L3'), ('M1');

-- Création de la table `Candidat`
CREATE TABLE `Candidat` (
  `idcandidat_candidat` INT AUTO_INCREMENT NOT NULL,
  `id_utilisateur` BIGINT,
  `nom_candidat` VARCHAR(50),
  `prenom_candidat` VARCHAR(50),
  `nom_jeune_fille_candidat` VARCHAR(50),
  `genre_candidat` TINYINT,
  `photo_candidat` VARCHAR(255),
  `cv_candidat` VARCHAR(255),
  `lettredemotivation_candidat` VARCHAR(255),
  `releve_candidat` VARCHAR(255),
  `diplome_candidat` VARCHAR(255),
  `justificatifpro_candidat` VARCHAR(255),
  `dossiervalidation_candidat` VARCHAR(255)
  `Age_candidat` INT,
  `Etat_admission` TINYINT(1),
  `Etat_document_candidat` TINYINT(1),
  `formulaire_idformulaire_formulaire` INT,
  `intitule_formation` VARCHAR(255),
  PRIMARY KEY (`idcandidat_candidat`),
  FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`),
  FOREIGN KEY (`intitule_formation`) REFERENCES `Formation` (`intitule_formation`)
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

-- Création de la table `Formulaire`
CREATE TABLE `Formulaire` (
  `idformulaire_formulaire` INT AUTO_INCREMENT NOT NULL,
  `datenaissance_formulaire` DATE,
  `email_formulaire` VARCHAR(255),
  `lieu_naissance_formulaire` VARCHAR(255),
  `seriebac_formulaire` VARCHAR(255),
  `mentionbac_formulaire` VARCHAR(255),
  `anneebac_formulaire` YEAR,
  `lieubac_formulaire` VARCHAR(255),
  `intituleannee1_formulaire` VARCHAR(255),
  `anneeobtention1_formulaire` INT,
  `lieuobtention1_formulaire` VARCHAR(255),
  `moyenneannee1_formulaire` INT,
  `intituleannee2_formulaire` VARCHAR(255),
  `anneeobtention2_formulaire` INT,
  `lieuobtention2_formulaire` VARCHAR(255),
  `moyenneannee2_formulaire` INT,
  `autre_diplome_obtenu_formulaire` VARCHAR(255),
  `annee_autres_diplome_formulaire` YEAR,
  `moyenne_autres_diplome_formulaire` INT,
  `lieu_autre_diplome_formulaire` VARCHAR(255),
  `etablissement_autre_diplome_formulaire` VARCHAR(255),  
  `choix_candidate_a_autres_formations_formulaire` VARCHAR(5),
  `input_autres_formation_formulaire` VARCHAR(255),
  `stagesEntreprise_formulaire` VARCHAR(5),
  `input_quelle_entreprise_formulaire` VARCHAR(255),
  `theme_entreprise_formulaire` VARCHAR(255),
  `AdressePrincipal_formulaire` VARCHAR(100),
  `candidat_idcandidat_candidat` INT,
  `idformation_formation` INT,
  `nom_parent1` VARCHAR(255),
  `prennom_parent1` VARCHAR(255),
  `numero_parent1` INT,
  `nom_parent2` VARCHAR(255),
  `prennom_parent2` VARCHAR(255),
  `numero_parent2` INT,
  `nom_responsable_legale` VARCHAR(255),
  `prenom_responsable_legale` VARCHAR(255),
  `numero_responsable_legale` INT,
  `questionnaire` VARCHAR(255),
  `ville` VARCHAR(255),
  `codepostal` INT,
  `telephone` INT,
  `mobile` INT,
  `datevalidation` DATE,
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

-- Création de la table `Sinscrit`
CREATE TABLE `Sinscrit` (
  `idcandidat_candidat` INT AUTO_INCREMENT NOT NULL,
  `id_utilisateur` BIGINT NOT NULL,
  `idres_responsables` INT NOT NULL,
  PRIMARY KEY (`idcandidat_candidat`, `id_utilisateur`, `idres_responsables`),
  FOREIGN KEY (`idcandidat_candidat`) REFERENCES `Candidat` (`idcandidat_candidat`),
  FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`),
  FOREIGN KEY (`idres_responsables`) REFERENCES `Responsables` (`idres_responsables`)
) ENGINE=InnoDB;
