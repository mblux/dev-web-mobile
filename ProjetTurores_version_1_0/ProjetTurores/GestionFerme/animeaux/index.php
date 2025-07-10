<?php
require "../config/function.php";
$query = "SELECT animeaux.*, especes.nom AS espece, betails.nom AS betail FROM animeaux 
    LEFT JOIN especes ON especes.id=animeaux.idEspece
    LEFT JOIN betails ON betails.id=animeaux.idBetail";
if (isset($_GET["question"])) {
    $question = "%" . $_GET["question"] . "%";
    $query .= " WHERE animeaux.nom LIKE ? OR especes.nom LIKE ? OR betails.nom LIKE ?";
    $lsAnimeaux = select($query, [$question, $question, $question]);
    header("Content-type: Application/json");
    echo json_encode($lsAnimeaux);
    exit();
}

$lsAnimeaux = select($query);
$lsEspece = select("SELECT * FROM especes");
$lsBetail = select("SELECT * FROM betails");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animaux - Gestion de Ferme</title>
    <link rel="stylesheet" href="animeaux.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <?php require "../partial/sidebare.php" ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php
        $title = "Gestion des Animaux";
        require "../partial/header.php";
        ?>
        <!-- Action Bar -->
        <div class="action-bar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input id="searchField" type="text" placeholder="Rechercher un animal...">
            </div>
            <button class="btn btn-primary" id="addAnimalBtn">
                <i class="fas fa-plus"></i> Ajouter un animal
            </button>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-group">
                <label for="filterEspece">Filtrer par espèce</label>
                <select id="filterEspece">
                    <option value="">Toutes les espèces</option>
                    <?php foreach ($lsEspece as $espece) { ?>
                        <option value="<?= $espece->id ?>"><?= $espece->nom ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="filter-group">
                <label for="filterBetail">Filtrer par bétail</label>
                <select id="filterBetail">
                    <option value="">Tous les types</option>
                    <?php foreach ($lsBetail as $betail) { ?>
                        <option value="<?= $betail->id ?>"><?= $betail->nom ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="filter-group">
                <label for="filterAge">Filtrer par âge</label>
                <select id="filterAge">
                    <option value="">Tous les âges</option>
                    <option value="1">Moins de 1 an</option>
                    <option value="2">1-3 ans</option>
                    <option value="3">3-5 ans</option>
                    <option value="4">Plus de 5 ans</option>
                </select>
            </div>
            <div class="filter-group">
                <button class="btn btn-warning" style="margin-top: 1.4rem;">
                    <i class="fas fa-filter"></i> Appliquer
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Nom</th>
                        <th>Espèce</th>
                        <th>Bétail</th>
                        <th>Date Naissance</th>
                        <th>Âge</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="animeaux-tbody">

                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Animal Modal -->
    <div class="modal" id="addAnimalModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Ajouter un nouvel animal</div>
                <button class="close-btn">&times;</button>
            </div>
            <form id="animalForm">
                <div class="form-row">
                    <div class="form-group photo-upload">
                        <img src="https://via.placeholder.com/100?text=Photo" class="photo-preview"
                            id="animalPhotoPreview" alt="Preview">
                        <input name="image" type="file" id="animalPhoto" accept="image/*" style="display: none;">
                        <button type="button" class="btn btn-sm btn-primary"
                            onclick="document.getElementById('animalPhoto').click()">
                            <i class="fas fa-upload"></i> Choisir une photo
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="animalNom">Nom</label>
                        <input name="nom" type="text" id="animalNom" placeholder="Ex: Bella, Moutonnet, etc." required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="animalEspece">Espèce</label>
                        <select name="idEspece" id="animalEspece" required>
                            <option value="">Sélectionner une espèce</option>
                            <option value="1">Vache</option>
                            <option value="2">Mouton</option>
                            <option value="3">Chèvre</option>
                            <option value="4">Poule</option>
                            <option value="5">Canard</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="animalBetail">Type de bétail</label>
                        <select name="idBetail" id="animalBetail" required>
                            <option value="">Sélectionner un type</option>
                            <option value="1">Bovin</option>
                            <option value="2">Ovin</option>
                            <option value="3">Caprin</option>
                            <option value="4">Volaille</option>
                            <option value="5">Porcin</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="animalNaissance">Date de naissance</label>
                        <input name="date_naissance" type="date" id="animalNaissance" required>
                    </div>
                    <div class="form-group">
                        <label for="animalSexe">Sexe</label>
                        <select name="sexe" id="animalSexe" required>
                            <option value="M">Mâle</option>
                            <option value="F">Femelle</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="animalNotes">Notes/Remarques</label>
                    <textarea name="description" id="animalNotes"
                        placeholder="Informations supplémentaires..."></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn close-btn">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal handling
        const addAnimalBtn = document.getElementById('addAnimalBtn');
        const addAnimalModal = document.getElementById('addAnimalModal');
        const closeBtns = document.querySelectorAll('.close-btn');
        const photoInput = document.getElementById('animalPhoto');
        const photoPreview = document.getElementById('animalPhotoPreview');

        addAnimalBtn.addEventListener('click', () => {
            addAnimalModal.style.display = 'flex';
        });

        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                addAnimalModal.style.display = 'none';
            });
        });

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === addAnimalModal) {
                addAnimalModal.style.display = 'none';
            }
        });

        // Photo preview
        photoInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    photoPreview.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Form submission
        document.getElementById('animalForm').addEventListener('submit', (e) => {
            e.preventDefault();
            // Here you would handle the form submission (AJAX call to backend)
            alert('Animal ajouté avec succès!');
            addAnimalModal.style.display = 'none';
            // Reset form
            e.target.reset();
            photoPreview.src = 'https://via.placeholder.com/100?text=Photo';
        });

        // Filter simulation
        document.querySelector('.btn-warning').addEventListener('click', () => {
            alert('Filtres appliqués! (simulation)');
        });

        let lsEspece = <?php echo json_encode($lsEspece); ?>;
        let lsBetail = <?php echo json_encode($lsBetail); ?>;
        let lsAnimeaux = <?php echo json_encode($lsAnimeaux); ?>;
        function loadData() {
            let tbody = document.getElementById("animeaux-tbody");
            tbody.innerHTML = ""
            lsAnimeaux.forEach(animal => {
                let tr = document.createElement("tr")
                tr.innerHTML = `
                    <td><img src="${animal.image}" class="animal-photo" alt="Image"></td>
                    <td>${animal.nom}</td>
                    <td><span class="badge badge-primary">${animal.espece}</span></td>
                    <td>${animal.betail}</td>
                    <td>${animal.date_naissance}</td>
                    <td>3 ans</td>
                    <td class="actions-cell">
                        <button class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href='delete.php?id=${animal.id}' class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                `
                tbody.append(tr)
            });
        }
        loadData()
        let searchField = document.getElementById("searchField");
        searchField.addEventListener("keyup", (event) => {
            event.preventDefault()
            let question = searchField.value
            fetch("/animeaux/index.php?question=" + question, {
                headers: {
                    "Accept": "Application/json"
                }
            }).then(async response => {
                if (response.status == 200) {
                    let jsonReponse = await response.json()
                    lsAnimeaux = jsonReponse;
                    loadData()
                }
            })
        })
    </script>
</body>

</html>