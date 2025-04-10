#include <stdio.h>
#include <math.h>
#include "fonction.h"
#define Pi 3.14159

int main(){
    int choix; 
    double cote, longueur, largeur, rayon;

    do{   
        printf("\nEntrez 1 pour calculer la surface d'un carré\n");
        printf("Entrez 2 pour calculer le périmètre d'un carré\n");
        printf("Entrez 3 pour calculer la surface d'un triangle\n");
        printf("Entrez 4 pour calculer le périmètre d'un triangle\n");
        printf("Entrez 5 pour calculer la surface d'un cercle\n");
        printf("Entrez 6 pour calculer le périmètre d'un cercle\n");
        printf("Entrez 7 pour calculer le périmètre d'une sphère\n");
        printf("Entrez 8 pour calculer la surface d'une sphère\n");
        printf("Entrez 0 pour quitter le programme\n");
        printf("Votre choix: ");
        scanf("%d", &choix);

        switch (choix)
        {
        case 1: //Surface d'un carré
            printf("Entrez la longueur du côté du carré: ");
            scanf("%lf", &cote);
            double surface = surface_carre(cote);
            printf("Surface du carré est: %.2fm²\n", surface);
            break;

        case 2: //Périmètre d'un carré
            printf("Entrez la longueur du coté du carré: ");
            scanf("%lf", &cote);
            printf("Périmètre du carré est: %.2fm\n", 4 * cote);
            break;

        case 3: //Surface d'un rectangle
            printf("Entrez la longueur du rectangle: ");
            scanf("%lf", &longueur);
            printf("Entrez la largeur du rectangle: ");
            scanf("%lf", &largeur);
            printf("Surface du rectangle est: %.2fm²\n", longueur * largeur);
            break;

        case 4: //Périmètre d'un rectangle
            printf("Entrez la longueur  du rectangle: ");
            scanf("%lf", &longueur);
            printf("Entrez la larguer du rectangle: ");
            scanf("%lf", &largeur);
            printf("Périmètre du rectangle est: %.2fm²\n", 2 * (longueur + largeur));
            break;

        case 5: //Surface d'un cercle
            printf("Entrez le rayon du cercle: ");
            scanf("%lf", &rayon);
            printf("Surface du cercle est: %.2fm²\n",rayon * rayon *  Pi);
            break;

        case 6: //Périmètre d'un cercle 
            printf("Entrez le rayon du cercle: ");
            scanf("%lf", &rayon);
            printf("Périmètre du cercle est: %.2fm\n",  rayon * 2 * Pi );
            break;

        case 7: //Surface d'une sphère
            printf("Entrez le rayon de la sphère: ");
            scanf("%lf", &rayon);
            printf("Périmètre du sphère est: %.2fm²\n", 4 * Pi * rayon * rayon);
            break;

        case 8: //Volume d'une sphère
            printf("Entrez le rayon du sphère: ");
            scanf("%lf", &rayon);
            printf("Surface de la sphère est: %.2fm³\n", (4.0 / 3.0) * Pi * rayon * rayon * rayon);
            break;

        case 0: //Quitter le programme
            printf("Au revoir!\n");
            break;
        
        default:
            printf("Choix invalide. Veuillez réessayer.\n");
            break;
        }
    }
    while (choix != 0);
    return 0;
}