import math  # Pour utiliser la constante math.pi

# Fonction pour calculer la surface d'un carré
def surface_carre(cote):
    return cote ** 2  # La surface d'un carré est cote * cote

# Fonction pour calculer le périmètre d'un carré
def perimetre_carre(cote):
    return 4 * cote  # Le périmètre d'un carré est 4 fois la longueur du côté


# Fonction pour calculer la surface d'un rectangle
def surface_rectangle(longueur, largeur):
    return longueur * largeur  # La surface d'un rectangle est longueur * largeur

# Fonction pour calculer le périmètre d'un rectangle
def perimetre_rectangle(longueur, largeur):
    return 2 * (longueur + largeur)  # Le périmètre d'un rectangle est 2 * (longueur + largeur)

# Fonction pour calculer la surface d'un cercle
def surface_cercle(rayon):
    return math.pi * rayon ** 2  # La surface d'un cercle est pi * rayon^2

# Fonction pour calculer le périmètre (circonférence) d'un cercle
def perimetre_cercle(rayon):
    return 2 * math.pi * rayon  # Le périmètre d'un cercle est 2 * pi * rayon

# Fonction pour calculer le volume d'une sphère
def volume_sphere(rayon):
    return (4/3) * math.pi * rayon**3  # Volume de la sphère : (4/3) * pi * rayon^3

# Fonction pour calculer la surface d'une sphère
def surface_sphere(rayon):
    return (4/3) * math.pi * rayon**3  # Surface de la sphère : (4/3) * pi * rayon^3
