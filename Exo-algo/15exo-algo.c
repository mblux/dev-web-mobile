//Tri par sélection d'un tableau

#include <stdio.h>

void tri_selection(int tableau[], int taille) {
    for (int i = 0; i < taille - 1; i++) {  // Parcours du tableau
        int min_index = i;  // Initialiser l'index du minimum à i
        for (int j = i + 1; j < taille; j++) {  // Comparer les éléments restants
            if (tableau[j] < tableau[min_index]) {  // Si l'élément j est plus petit que le minimum
                min_index = j;  // Mettre à jour l'index du minimum
            }
        }
        // Échanger l'élément à l'index i avec l'élément min_index
        int temp = tableau[i];
        tableau[i] = tableau[min_index];
        tableau[min_index] = temp;
    }
}

void afficher_tableau(int tableau[], int taille) {
    for (int i = 0; i < taille; i++) {
        printf("%d ", tableau[i]);
    }
    printf("\n");
}

int main() {
    int tableau[] = {22, 52, 364, 234, 20, 32, 015, 001};  // Exemple de tableau
    int taille = sizeof(tableau) / sizeof(tableau[0]);  // Calculer la taille du tableau

    printf("Tableau avant le tri : ");
    afficher_tableau(tableau, taille);  // Afficher le tableau avant tri

    tri_selection(tableau, taille);  // Appeler la fonction de tri par sélection

    printf("Tableau après le tri : ");
    afficher_tableau(tableau, taille);  // Afficher le tableau après tri

    return 0;
}