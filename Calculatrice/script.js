const touches = [...document.querySelectorAll('.bouton')];
const listeKeycode = touches.map(touche => touche.dataset.key);
const ecran = document.querySelector('.ecran');

document.addEventListener('keydown', (e) => {
    const valeur = e.keyCode.toString(); 
    calculer(valeur)
})

document.addEventListener('click', (e) => {
    const valeur = e.target.dataset.key; 
    calculer(valeur)
})

const calculer = (valeur) => {
    if (listeKeycode.includes(valeur)) {
      switch (valeur) {
        case "13": // Entrée
          try {
            ecran.textContent = eval(ecran.textContent);
          } catch {
            ecran.value = "Erreur";
          }
          break;
        case "8": // Backspace
          ecran.textContent = ecran.textContent.slice(0, -1);
          break;
        case "46": // Suppr
          ecran.textContent = "";
          break;
        case "165":
            ecran.textContent = textContent / 100;
          break;
          default:
          const indexKeycode = listeKeycode.indexOf(valeur);
          const touche = touches[indexKeycode];
          ecran.textContent += touche.innerText;
      }
    }
  }
