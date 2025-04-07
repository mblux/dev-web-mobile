#include <stdio.h>

int sommeTableau(int tableau[], int taille) {
    int somme = 0;
    for (int i = 0; i < taille; i++) {
        somme += tableau[i];
    }
    return somme;
}

int main() {
    int tableau[] = {1, 2, 3, 4, 5}; // Exemple de tableau
    int taille = sizeof(tableau) / sizeof(tableau[0]); // Calcul de la taille du tableau
    int result = sommeTableau(tableau, taille);
    
    printf("La somme des éléments du tableau est : %d\n", result);
    return 0;
}