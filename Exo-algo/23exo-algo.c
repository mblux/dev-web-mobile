//Calcul du PGCD (algorithme d'Euclide) 
#include <stdio.h>

int calculer_pgcd(int a, int b) {
    while (b != 0) {
        int temp = b;
        b = a % b;
        a = temp;
    }
    return a;
}

int main() {
    int a, b;
    printf("Entrez les deux entiers a et b : ");
    scanf("%d %d", &a, &b);

    int pgcd = calculer_pgcd(a, b);
    printf("Le PGCD de %d et %d est : %d\n", a, b, pgcd);

    return 0;
}