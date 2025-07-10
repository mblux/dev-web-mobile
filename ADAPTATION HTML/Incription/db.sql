CREATE DATABASE inscription;

USE inscription;

CREATE TABLE eleve(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255)
);

CREATE TABLE classe(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255)
);

CREATE TABLE eleve_classe(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_eleve INT,
    id_classe INT
);

CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50),
    password VARCHAR(50)
);

CREATE TABLE inscription_eleve (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    date_naissance DATE,
    classe VARCHAR(255),
    date_inscription DATE,
    pieces_fournies VARCHAR(255)
);

ALTER TABLE eleve_classe ADD CONSTRAINT fk_eleve_classe_id_eleve FOREIGN KEY (id_eleve) REFERENCES eleve(id);
ALTER TABLE eleve_classe ADD CONSTRAINT fk_eleve_classe_id_classe FOREIGN KEY (id_classe) REFERENCES classe(id);
