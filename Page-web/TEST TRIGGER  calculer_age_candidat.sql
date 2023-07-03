DELIMITER //
CREATE TRIGGER calculer_age_candidat
AFTER UPDATE ON Formulaire
FOR EACH ROW
BEGIN
    DECLARE date_naissance DATE;
    DECLARE age INT;

    -- Récupérer la date de naissance mise à jour
    SET date_naissance = NEW.datenaissance_formulaire;

    SET age = YEAR(CURRENT_DATE()) - YEAR(date_naissance);

    -- Mettre à jour l'âge dans la table Candidat
    UPDATE Candidat SET Age_candidat = age WHERE formulaire_idformulaire_formulaire = NEW.idformulaire_formulaire;
END;
//
DELIMITER ;
