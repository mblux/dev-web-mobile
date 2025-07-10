-- Base de données : doomplus_auto
CREATE DATABASE doomplus_auto;
use doomplus_auto;

-- Création des tables principales
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('client', 'admin') DEFAULT 'client',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(100) NOT NULL,
    modele VARCHAR(100) NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    kilometrage INT,
    annee INT,
    carburant ENUM('essence', 'diesel', 'électrique', 'hybride') NOT NULL,
    type VARCHAR(50),
    description TEXT,
    image VARCHAR(255),
    categorie_id INT,
    valide BOOLEAN DEFAULT FALSE,
    date_ajout TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    vehicule_id INT,
    date_reservation DATE NOT NULL,
    statut ENUM('en attente', 'confirmée', 'annulée') DEFAULT 'en attente',
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (vehicule_id) REFERENCES vehicules(id)
);

CREATE TABLE ventes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_id INT NOT NULL,
    acheteur_id INT NOT NULL,
    prix_vente DECIMAL(10,2),
    date_vente DATE,
    FOREIGN KEY (vehicule_id) REFERENCES vehicules(id),
    FOREIGN KEY (acheteur_id) REFERENCES utilisateurs(id)
);
