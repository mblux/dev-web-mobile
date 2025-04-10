#include "fonction.h"
#define Pi 3.14159

// Fonction pour calculer la surface d'un carré
double surface_carre(double cote) {
    return cote * cote; // La surface d'un carré est côté * côté
}

// Fonction pour calculer le périmètre d'un carré
double perimetre_carre(double cote) {
    return 4 * cote; // Le périmètre d'un carré est 4 fois la longueur du côté
}

// Fonction pour calculer la surface d'un rectangle
double surface_rectangle(double longueur, double largeur) {
    return longueur * largeur; // La surface d'un rectangle est longueur * largeur
}

// Fonction pour calculer le périmètre d'un rectangle
double perimetre_rectangle(double longueur, double largeur) {
    return 2 * (longueur + largeur); // Le périmètre d'un rectangle est 2*(longueur + largeur)
}

// Fonction pour calculer la surface d'un cercle
double surface_cercle(double rayon) {
    return Pi * rayon * rayon; // La surface d'un cercle est pi * rayon^2
}

// Fonction pour calculer le périmètre (circonférence) d'un cercle
double perimetre_cercle(double rayon) {
    return 2 * Pi * rayon; // Le périmètre d'un cercle est 2 * pi * rayon
}   

// Fonction pour calculer le volume d'une sphère
double volume_sphere(double rayon) {
    return (4.0 / 3.0) * Pi * pow(rayon, 3); // Volume de la sphère : (4/3) * pi * rayon^3
}