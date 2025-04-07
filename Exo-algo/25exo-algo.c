//Recherche du maximum dans un tableau

#include <stdio.h>

// Fonction pour trouver le maximum dans un tableau
int trouverMax(int tableau[], int taille) {
    int max = tableau[0];  // Initialiser max avec le premier élément du tableau
    
    // Parcours du tableau à partir du deuxième élément
    for (int i = 1; i < taille; i++) {
        if (tableau[i] > max) {
            max = tableau[i];  // Mettre à jour max si l'élément actuel est plus grand
        }
    }
    
    return max;  // Retourner la valeur maximale
}

int main() {
    int tableau[] = {5, 3, 8, 1, 9, 4};  // Exemple de tableau
    int taille = sizeof(tableau) / sizeof(tableau[0]);  // Calculer la taille du tableau

    int max = trouverMax(tableau, taille);  // Appeler la fonction pour trouver le maximum
    printf("Le maximum du tableau est : %d\n", max);  // Afficher le résultat

    return 0;
}
