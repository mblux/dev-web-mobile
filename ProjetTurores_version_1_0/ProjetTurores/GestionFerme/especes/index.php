<?php
require "../config/function.php";
$query = "SELECT especes.*, (SELECT COUNT(*) FROM animeaux WHERE animeaux.idEspece=especes.id) as nombreAnimeaux FROM especes";
if (isset($_GET["question"])) {
    $question = "%" . $_GET["question"] . "%";
    $query .= " WHERE especes.nom LIKE ?";
    $lsEspece = select($query, [$question]);
    header("Content-type: Application/json");
    echo json_encode($lsEspece);
    exit();
}

$lsEspece = select($query);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espèces - Gestion de Ferme</title>
    <link rel="stylesheet" href="especes.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <?php require "../partial/sidebare.php" ?>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php
        $title = "Gestion des Espèces";
        require "../partial/header.php";
        ?>
        <!-- Action Bar -->
        <div class="action-bar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input id="inputSearch" type="text" placeholder="Rechercher une espèce...">
            </div>
            <button class="btn btn-primary" id="addEspeceBtn">
                <i class="fas fa-plus"></i> Ajouter une espèce
            </button>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom de l'espèce</th>
                        <th>Nombre d'animeaux</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="espece-tbody">

                </tbody>
            </table>
        </div>
        <!-- Boite de dialoque d'ajout -->
        <div class="dialog" id="dialog-ajout">
            <div class="container">
                <form id="formAjout" action="post.php" method="post">
                    <h1>Ajouter une espèce</h1>
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom">
                    </div>
                    <div class="flex gap-1">
                        <input class="btn btn-primary" type="submit" value="Ajouter">
                        <input class="btn btn-primary" id="btnHidDialog" type="reset" value="Annuler">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let lsEspece = <?php echo json_encode($lsEspece); ?>;
        function loadData() {
            let tbody = document.getElementById("espece-tbody");
            tbody.innerHTML = ""
            lsEspece.forEach(espece => {
                let tr = document.createElement("tr")
                tr.innerHTML = `
                    <td>${espece.id}</td>
                    <td>${espece.nom}</td>
                    <td>${espece.nombreAnimeaux}</td>
                    <td class="actions-cell">
                        <button onclick="editer(${espece.id})" class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href='delete.php?id=${espece.id}' class="btn btn-danger btn-sm ${espece.nombreAnimeaux > 0 ? 'hidden' : ''}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                `
                tbody.append(tr)
            });
        }
        loadData()

        let inputSearch = document.getElementById("inputSearch")
        inputSearch.addEventListener("keyup", (event) => {
            let question = inputSearch.value
            fetch("/especes/index.php?question=" + question, {
                headers: {
                    "Accept": "Application/json"
                }
            }).then(async response => {
                if (response.status == 200) {
                    let jsonReponse = await response.json()
                    lsEspece = jsonReponse;
                    loadData()
                }
            })
        })

        document.getElementById("addEspeceBtn").addEventListener("click", () => {
            document.getElementById("dialog-ajout").style.display = "block"
            document.getElementById("formAjout").setAttribute("action", "post.php");
        })
        document.getElementById("btnHidDialog").addEventListener("click", () => {
            document.getElementById("dialog-ajout").style.display = "none"
        })

        function editer(id) {
            let espece = lsEspece.find(espece => espece.id == id)
            if (!espece) {
                return
            }
            let lsInput = document.querySelectorAll("#formAjout input")
            for (let i = 0; i < lsInput.length; i++) {
                const input = lsInput[i];
                let name = input.getAttribute("name")
                if (name) {
                    input.value = espece[name]
                }
            }
            document.getElementById("formAjout").setAttribute("action", "update.php");
            document.getElementById("dialog-ajout").style.display = "block"
        }
    </script>

</body>

</html>