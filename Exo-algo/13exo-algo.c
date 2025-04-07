//Inversion d'une chaîne de caractères 

#include <stdio.h>
#include <string.h>

//Fonction pour invrser une chaîne
void inverserChaine(const char * chaine, char * chaine_inverse){
    int longueur = strlen(chaine); //Obteniir la longueur de la chaîne
    int j = 0; //Initialiser l'index pour la chaîne inversé
    //parcourir la chaîne de la fin verss le bébut
    for(int i = longueur - 1; i >= 0; i--){
        chaine_inverse[j++] = chaine[i]; //Ajouter le caractère inversé
    }
    chaine_inverse[j] = '\0'; //Terminer la chaîne inversée avec un caractère nul
}
int main(){
    char chaine[100]; //chaîne pour stocker la chaîne inversée
    char chaine_inverse[100]; //Chaîne pour stocker la chaîne inversée
    //Demander à l'utilisateur de saisir une chaîne
    printf("Entrez une chaîne: ");
    fgets(chaine, sizeof(chaine), stdin); //Saisir la chaîne
    //Appeler la fonction pour inverser la chaîne
    inverserChaine(chaine, chaine_inverse);
    //Afficher la chaîne inversée
    printf("Chaîne inversée: %s\n", chaine_inverse);

    return 0;
}
