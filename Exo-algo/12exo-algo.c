#include <stdio.h>
#include <math.h>
#include <stdbool.h>

//Fonction pour vérifier si un nombre est permier
bool estPremier(int n){
    //Vérification des cas particuliers
    if(n <= 1){
        return false; //Retourner Faux si n est moins ou égal à 1
    }
    //Boucle pour vérifier la divisibilité
    for(int i = 2; i <= sqrt(n); i++){
        if(n % i == 0){
            return false; //Retourner Faux si n est divisible par i
        }
    } 
        return true; //Retourner Vrai si n est un nombre premier
        }
int main(){
    int n;
//Demande à l'utilisateur de saisir un nombre
    printf("Entrez un nombre :");
    scanf("%d", &n);
    //Vérifie si le nombre est premier et affiche le résultat
    if(estPremier(n)){
        printf("%d est un nombre premier.\n", n);
    } 
    else{
        printf("%d n'est pas un nombre premier.\n", n);
    }
        return 0;
}
    