CREATE TRIGGER `calculer_age_candidat` AFTER UPDATE ON `formulaire`
 FOR EACH ROW BEGIN
    DECLARE date_naissance DATE;
    DECLARE age INT;

        SET date_naissance = NEW.datenaissance_formulaire;

    SET age = YEAR(CURRENT_DATE()) - YEAR(date_naissance);

        UPDATE Candidat SET Age_candidat = age WHERE formulaire_idformulaire_formulaire = NEW.idformulaire_formulaire;
END