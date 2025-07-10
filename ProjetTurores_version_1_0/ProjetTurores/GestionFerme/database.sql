CREATE DATABASE IF NOT EXISTS fermes;
USE fermes;

-- Table pour enregistrer les especes d'animaux
-- Exemple: Mouton, Chameaux
CREATE TABLE IF NOT EXISTS especes(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) UNIQUE
);

-- Table pour enregistrer les groupe de betail
-- Exemple: Caprin, Bovin, Ovin, Volails
CREATE TABLE IF NOT EXISTS betails(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) UNIQUE
);

CREATE TABLE IF NOT EXISTS animeaux(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    date_naissance DATE,
    sexe VARCHAR(2) CHECK (sexe IN ("M", "F")),
    image VARCHAR(255),
    description VARCHAR(255),
    idEspece INT UNSIGNED,
    idBetail INT UNSIGNED,
    dateAjout DATETIME NULL DEFAULT NOW(),
    FOREIGN KEY(idEspece) REFERENCES especes(id),
    FOREIGN KEY(idBetail) REFERENCES betails(id)
);

GRANT ALL PRIVILEGES ON fermes.* TO fermier@localhost IDENTIFIED BY "superPassword";
FLUSH PRIVILEGES;
