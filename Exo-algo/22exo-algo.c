//Conversion d'un nombre décimal en binaire

#include <stdio.h> 
#include <string.h>

//Fonction pour convertir un entier en binaire
void convertir_en_binaire(int n, char * binaire){
    int reste;
    int index = 0; //Pour suivre la position dans la chaîne

    //Boucle tant que n est supérieur à 0
    while(n > 0){
        reste = n % 2; //Calculer le reste (0 ou 1)
        binaire[index++] = reste + '0'; //Convertir en caractère et ajouter à la chaîne
        n = n / 2; //Diviser n par 2
    }
    binaire[index] = '\0'; //Terminer la chaîne
    //Inverser la chaîne pour avoir le bon ordre
    int i, j;
    char temp;
    for(i = 0, j = index - 1; i < j; i++, j--){
        temp = binaire[i];
        binaire[i] = binaire[j];
        binaire[j] = temp;
    }
}
int main(){
    int n;
    char binaire[32]; //Assurons-nous d'avoir suffisamment d'espace pur stocker le binaire

    //Demander à l'utilisateur d'entrer un nombre
    printf("Entrez un entier positif: ");
    scanf("%d", &n);
    
    if(n < 0){
        printf("Veuillez entrer un entier positif.\n");
    } else{
        convertir_en_binaire(n, binaire);
        printf("La représentation binaire de %d et %s.\n", n, binaire);
    }
    return 0;
}