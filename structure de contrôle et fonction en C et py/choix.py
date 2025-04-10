import math

def surface_carre(cote):
    return cote ** 2

def perimetre_carre(cote):
    return 4 * cote

def surface_rectangle(longueur, largeur):
    return longueur * largeur

def perimetre_rectangle(longueur, largeur):
    return 2 * (longueur + largeur)

def surface_cercle(rayon):
    return math.pi * rayon ** 2

def perimetre_cercle(rayon):
    return 2 * math.pi * rayon

def surface_sphere(rayon):
    return 4 * math.pi * rayon ** 2

def main():
    while True:
        print("\nEntrez 1 pour calculer la surface d'un carré")
        print("Entrez 2 pour calculer le périmètre d'un carré")
        print("Entrez 3 pour calculer la surface d'un rectangle")
        print("Entrez 4 pour calculer le périmètre d'un rectangle")
        print("Entrez 5 pour calculer la surface d'un cercle")
        print("Entrez 6 pour calculer le périmètre d'un cercle")
        print("Entrez 7 pour calculer le périmètre d'une sphère")
        print("Entrez 8 pour calculer la surface d'une sphère")
        print("Entrez 0 pour quitter le programme")

        choix = input("Entrez votre choix (0-8): ")

        if choix == '0':
            print("Au revoir!")
            break

        elif choix == '1':
            cote = float(input("Entrez la longueur du côté du carré: "))
            print(f"La surface du carré est: {surface_carre(cote)}","m²")

        elif choix == '2':
            cote = float(input("Entrez la longueur du côté du carré: "))
            print(f"Le périmètre du carré est: {perimetre_carre(cote)}","m")

        elif choix == '3':
            longueur = float(input("Entrez la longueur du rectangle: "))
            largeur = float(input("Entrez la largeur du rectangle: "))
            print(f"La surface du rectangle est: {surface_rectangle(longueur, largeur)}","m²")

        elif choix == '4':
            longueur = float(input("Entrez la longueur du rectangle: "))
            largeur = float(input("Entrez la largeur du rectangle: "))
            print(f"Le périmètre du rectangle est: {perimetre_rectangle(longueur, largeur)}","m")

        elif choix == '5':
            rayon = float(input("Entrez le rayon du cercle: "))
            print(f"La surface du cercle est: {surface_cercle(rayon)}","m²")

        elif choix == '6':
            rayon = float(input("Entrez le rayon du cercle: "))
            print(f"Le périmètre du cercle est: {perimetre_cercle(rayon)}","m")

        elif choix == '7':
            rayon = float(input("Entrez le rayon de la sphère: "))
            print(f"Le périmètre (circonférence) de la sphère est: {perimetre_cercle(rayon)}","m²")

        elif choix == '8':
            rayon = float(input("Entrez le rayon de la sphère: "))
            print(f"La surface de la sphère est: {surface_sphere(rayon)}","m³")

        else:
            print("Choix invalide, essayez à nouveau.")

if __name__ == "__main__":
    main()
