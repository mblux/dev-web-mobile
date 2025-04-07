//Calcul du factoriel d'un nombre (itératif)

#include <stdio.h>

//Fonction pour calculer la factorielle d'un nombre entier n 
unsigned long long factorielle(int n){
    unsigned long long fact = 1; // initialisation de fact à 1
    //Boucle pour calculer la factorielle
    for(int i = 1; i <= n; i++){
        fact *= i; //Multiplier fact par i
    }
    return fact; //Retourner la valeur de fact
}
int main(){
    int n;
    //Demander à l'utilisateur d'entrer un nombre
    printf("Entrez un entier: ");
    scanf("%d", &n);

    //Vérification si n est negatif
    if(n < 0){
        printf("La factorielle n'est pas définie pour les nombres négatifs./n");
    } else{
        //Appel de la fonction et affichage du résultat
        printf("La factorielle de %d est %llu.\n", n, factorielle(n));
    }
    return 0; //Fin du programme
}